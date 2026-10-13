# 08 — Konvensi untuk AI Coding Assistant

Aturan wajib saat menulis kode di `ppa-next`. Tujuan: hasil konsisten, aman, dan setara perilaku sistem lama.

## 1. Sebelum mulai tiap tugas

1. Baca `00-glosarium.md` (istilah + map nama). Jangan menebak arti kolom.
2. Buka file modul terkait (`04` / `05` / ...). Pakai bagian **"Perilaku lama"** sebagai spesifikasi, **"Rancangan baru"** sebagai target.
3. Jika perlu data nyata, jalankan query read-only ke `db_ppa` (perintah ada di `02-database.md` §6). **Jangan** menulis/ubah `db_ppa`.
4. Jika spesifikasi ambigu atau bertentangan dengan pemilik produk → tulis `TODO(pemilik-produk): <pertanyaan>` di kode dan lanjut dengan asumsi paling aman, sebutkan asumsinya di ringkasan.

## 2. Bahasa & penamaan

- **Kode, nama variabel/fungsi/tabel, komentar → Bahasa Inggris.** camelCase (TS), PascalCase (komponen & model Prisma).
- **Semua teks yang dilihat user → Bahasa Indonesia** (label, tombol, judul, pesan error, toast, header kolom, header Excel).
- Pakai map di `00-glosarium.md` §7 — jangan pernah menulis `creat_at`, `ligitasi`, `berita_acara_hari`, `pelapor_idusers` di kode baru.
- Nama file: `kebab-case.ts` untuk util/route, `PascalCase.tsx` untuk komponen.
- Route URL: kebab-case (`/berita-acara`, `/pendampingan`).

## 3. Data & keamanan (tidak bisa ditawar)

- **Setiap** query list/detail/report/export/mutasi **wajib** menerapkan `scope(session)` + `deletedAt: null`.
  Data korban kekerasan itu sensitif — kebocoran antar-user = insiden.
- **Setiap** Server Action & route handler: `requireSession()` + `assertAccess('<menuKey>')` di baris pertama. Jangan hanya mengandalkan `middleware.ts`.
- Validasi input di server dengan **zod `.parse()`** — jangan percaya payload klien meski sudah divalidasi di form.
- File upload: cek `mime` + ukuran + ekstensi. Foto/berkas korban **tidak** di `public/`; serve lewat route handler ber-auth.
- Jangan menaruh data pribadi (NIK, nama korban) di query string yang bisa ter-log. Pakai POST/body.
- Hard delete dilarang untuk entitas inti. Selalu soft delete (`deletedAt`).
- Password: verifikasi bcrypt lama dengan `bcryptjs`. Jangan pernah log password/hash.

## 4. Kesetaraan perilaku (parity)

- Kalau kode lama punya aturan bisnis (mis. `status=1` saat create, `usia` dari tanggal lahir, list default `status IN (1,2)`, pelapor lihat data sendiri) → **pertahankan**, kecuali file modul menandainya sebagai `Catatan bug lama` yang harus diperbaiki.
- Bug lama yang **wajib diperbaiki** (sudah didaftar di tiap modul): cek `isActive` saat login; scope pendampingan; `usia` dihitung ulang saat edit; multi-select jenis kekerasan konsisten; soft delete beneran; `updatedAt` otomatis.
- Kalau menemukan perilaku aneh yang tak terdokumentasi → tambahkan ke bagian "Catatan bug lama" di file modul, jangan diam-diam mengubah artinya.

## 5. Pola kode

### Server Action (template)
```ts
'use server'
import { revalidatePath } from 'next/cache'
import { requireSession } from '@/lib/auth'
import { assertAccess } from '@/lib/auth/assert'
import { prisma } from '@/lib/db'
import { writeAudit } from '@/lib/audit'
import { beritaAcaraSchema } from '@/lib/validation/berita-acara'

export async function updateBeritaAcara(id: string, input: unknown) {
  const session = await requireSession()
  assertAccess('berita-acara')
  const data = beritaAcaraSchema.parse(input)

  const before = await prisma.beritaAcara.findFirst({ where: { id, ...beritaAcaraScope(session), deletedAt: null } })
  if (!before) throw new Error('Data tidak ditemukan atau tidak boleh diakses')

  const after = await prisma.beritaAcara.update({
    where: { id },
    data: { ...mapForm(data), korbanUsia: hitungUmur(data.korban.tanggalLahir) }, // kode TIDAK diubah
  })
  await writeAudit({ entity: 'BeritaAcara', entityId: id, action: 'UPDATE', before, after, userId: session.userId })
  revalidatePath('/berita-acara')
  revalidatePath(`/berita-acara/${id}`)
  return { ok: true }
}
```

### Route handler list (template)
```ts
export async function GET(req: Request) {
  const session = await requireSession()
  assertAccess('pendampingan')
  const q = listQuerySchema.parse(Object.fromEntries(new URL(req.url).searchParams))
  const where: Prisma.PendampinganWhereInput = {
    deletedAt: null,
    ...pendampinganScope(session),
    ...(q.beritaAcaraKode ? { beritaAcaraKode: q.beritaAcaraKode } : {}),
    ...(q.q ? { OR: [
      { beritaAcaraKode: { contains: q.q } },
      { beritaAcara: { korbanNama: { contains: q.q } } },
      { beritaAcara: { korbanNik:  { contains: q.q } } },
    ] } : {}),
  }
  const [rows, total] = await prisma.$transaction([
    prisma.pendampingan.findMany({
      where, include: { beritaAcara: true, jenisPendamping: true },
      orderBy: { [q.sort ?? 'tanggal']: q.order ?? 'desc' },
      skip: (q.page - 1) * q.pageSize, take: q.pageSize,
    }),
    prisma.pendampingan.count({ where }),
  ])
  return Response.json({ rows, total, page: q.page, pageSize: q.pageSize })
}
```

### Form
- `useForm({ resolver: zodResolver(schema), defaultValues })`.
- Kirim ke Server Action; tangani `{ ok, fieldErrors }`; `toast` + `router.push` saat sukses.
- Section panjang → `<Tabs>` atau `<Accordion>` (Berita Acara / Pelapor / Korban / Pelaku / Laporan / Berkas).

## 6. Definition of Done (semua modul)

- [ ] TypeScript tanpa `any` yang tidak perlu; `pnpm build` & `pnpm lint` bersih.
- [ ] Zod schema dipakai di client **dan** server.
- [ ] Scope role + soft-delete di semua akses data. Diuji: user PELAPOR tidak bisa lihat/edit data orang lain (test).
- [ ] `assertAccess` + `requireSession` di semua action/route.
- [ ] AuditLog tertulis untuk CREATE/UPDATE/DELETE.
- [ ] Aturan bisnis dari file modul terpenuhi (cek daftar "Definition of Done" di `04`/`05`).
- [ ] List: pagination/sort/search server-side (bukan ambil semua baris).
- [ ] Teks UI Bahasa Indonesia; tanggal `dd MMM yyyy` WIB; angka locale `id-ID`.
- [ ] Halaman cetak: tanpa layout dashboard, `@media print` rapi.
- [ ] Unit test util (`hitungUmur`, `statusLabel`, mapper form↔db, transform ETL).
- [ ] E2E happy-path modul (Playwright).
- [ ] Kalau menyentuh ETL: `99-verify.ts` lulus (COUNT + sampel field-by-field).

## 7. Yang TIDAK boleh dilakukan

- ❌ `prisma migrate` / `db push` / DDL apa pun terhadap `db_ppa`.
- ❌ Menyalin nama kolom salah eja / redundan ke skema baru.
- ❌ `SELECT ... OR LIKE` ke semua kolom untuk fitur search (lambat; whitelist kolom).
- ❌ Mengambil semua baris ke memori untuk list (`per_page = 1000000` gaya lama).
- ❌ Hard delete entitas inti.
- ❌ Menaруh foto/berkas korban di `public/` atau meng-embed data pribadi di URL.
- ❌ Menganggap `berita_acara_id` sebagai penghubung ke pendampingan (harus lewat `kode`).
- ❌ Menambah dependensi besar tanpa alasan (grafik, editor kaya, dsb.) sebelum dibutuhkan modulnya.
- ❌ Mengubah keputusan arsitektur di `06` tanpa memperbarui dokumennya lebih dulu.

## 8. Pola prompt yang disarankan (untuk manusia yang mengarahkan AI)

- "Implement **Fase 2 checklist item `GET /api/berita-acara`** sesuai `docs/migrasi-nextjs/04-modul-berita-acara.md` §2 dan pola di `08` §5. Terapkan `beritaAcaraScope`."
- "Buat **ETL `scripts/etl/05-pendampingan.ts`** sesuai `07` Fase 3 + `02` §5. Idempoten, hasilkan `etl_report/pendampingan.csv`."
- "Refactor form berita acara jadi `<Tabs>` per section di `00-glosarium.md` §4, tanpa mengubah field wajib di `04` §3."
- Selalu rujuk **file + bagian** dokumen, bukan "seperti sistem lama" saja.

## 9. Saat menemukan sesuatu di kode lama yang tak terdokumentasi

1. Konfirmasi dengan query ke `db_ppa` bila menyangkut data.
2. Tambахkan temuan ke file modul terkait (bagian "Perilaku lama" atau "Catatan bug lama").
3. Baru implementasikan. Dokumen ikut ter-update dalam PR yang sama.
