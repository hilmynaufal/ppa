# 06 — Arsitektur Target (Next.js)

Rancangan acuan. Jika pemilik produk memutuskan lain, perbarui file ini **lebih dulu** sebelum menulis kode.

## 1. Stack

| Kebutuhan | Pilihan | Alasan |
|---|---|---|
| Framework | **Next.js 15 (App Router)** + React 19, TypeScript strict | SSR, Server Actions, route handlers |
| Styling | **Tailwind CSS v4** + **shadcn/ui** (Radix) | komponen aksesibel, tema baru cepat |
| Ikon | `lucide-react` | pengganti FontAwesome |
| Form | **react-hook-form** + **zod** (`@hookform/resolvers`) | validasi client+server 1 schema |
| Tabel | **@tanstack/react-table** (mode server-side) | pengganti DataTables |
| ORM | **Prisma** + MySQL | migrasi bertahap, bisa satu DB dengan tabel baru |
| Auth | **Auth.js (NextAuth v5)** Credentials + JWT | lihat `03-auth-dan-rbac.md` |
| Upload/Storage | filesystem lokal `/uploads` (dev) → S3-compatible (prod) via adapter | setara `upload_foto/` lama |
| Excel | **exceljs** | `.xlsx` streaming |
| PDF/Cetak | halaman print CSS + `window.print()`; opsional `@react-pdf/renderer` | setara `report` lama |
| Tabel data besar | server pagination wajib | data wilayah 83k baris |
| Notifikasi | `sonner` (toast) | pengganti `flashdata` |
| Test | Vitest (unit) + Playwright (e2e alur inti) | |
| Lint/format | ESLint (next) + Prettier | |
| Package manager | `pnpm` | |

## 2. Struktur folder

```
ppa-next/
  prisma/
    schema.prisma
    seed.ts
  scripts/etl/                 # migrasi data dari db_ppa (lihat 02 §5 & 07)
  src/
    app/
      (auth)/
        login/page.tsx
      (dashboard)/
        layout.tsx             # sidebar + header (pengganti views/template.php)
        page.tsx               # dashboard (pengganti Welcome)
        berita-acara/
          page.tsx             # list
          baru/page.tsx
          [id]/page.tsx        # detail
          [id]/edit/page.tsx
          [id]/cetak/page.tsx  # print
          [kode]/resume/page.tsx  # resume pendampingan (atau di /pendampingan)
        pendampingan/
          page.tsx
          baru/page.tsx
          [id]/page.tsx
          [id]/edit/page.tsx
        pelapor/page.tsx        # data pelapor/korban (tbl_user)
        403/page.tsx
      api/
        berita-acara/route.ts        # GET list (TanStack server-side)
        berita-acara/export/route.ts # GET xlsx
        pendampingan/route.ts
        pendampingan/export/route.ts
        pelapor/route.ts
        regions/route.ts             # cascading wilayah
        upload/route.ts              # POST multipart
        auth/[...nextauth]/route.ts
    actions/
      berita-acara.ts          # 'use server' — create/update/delete + auditLog
      pendampingan.ts
    lib/
      db.ts                    # prisma client singleton
      auth.ts                  # authOptions / helpers session
      auth/scope.ts            # beritaAcaraScope(session), pendampinganScope(session)
      auth/assert.ts           # assertAccess(menuKey)
      nav.ts                   # definisi menu + ikon
      format.ts                # formatTanggalID, hitungUmur, rupiah, statusLabel
      validation/
        berita-acara.ts        # zod schema
        pendampingan.ts
      excel/                   # builder xlsx per modul
      audit.ts                 # writeAudit({entity, entityId, action, before, after, userId})
    components/
      ui/                      # shadcn
      data-table/              # wrapper TanStack + toolbar + pagination
      form/                    # RHFInput, RHFSelect, RHFDatePicker, RHFFileUpload, RegionCascade
      layout/                  # Sidebar, Header, UserMenu
    types/
    middleware.ts              # guard auth + cek menu akses
```

## 3. Pola implementasi

### 3.1 List modul (server-side table)
- `page.tsx` (Server Component) render `<DataTable>` klien yang fetch `GET /api/<modul>?page&pageSize&sort&order&q&<filter>`.
- Route handler: validasi query (zod) → build `where` (termasuk `scope(session)` + soft-delete `deletedAt: null`) → `prisma.$transaction([findMany, count])` → `{ rows, total, page, pageSize }`.
- Kolom `no` dihitung di client dari `page*pageSize+idx+1`.
- Kolom "aksi" dibangun di client (tombol Link), bukan HTML dari server.

### 3.2 Form + mutasi
- Schema zod dipakai di `useForm({ resolver: zodResolver(schema) })` dan **di-parse ulang di Server Action**.
- Server Action:
  ```ts
  'use server'
  export async function createBeritaAcara(input: unknown) {
    const session = await requireSession()
    assertAccess('berita-acara')
    const data = beritaAcaraSchema.parse(input)
    // aturan bisnis: status=PENGAJUAN, usia=hitungUmur(tglLahir), kode unik immutable
    const row = await prisma.beritaAcara.create({ data: { ...map(data), createdById: session.userId, status: 'PENGAJUAN' } })
    await writeAudit({ entity: 'BeritaAcara', entityId: row.id, action: 'CREATE', after: row, userId: session.userId })
    revalidatePath('/berita-acara')
    return { ok: true, id: row.id }
  }
  ```
- Setelah sukses: `router.push` + `toast.success`. Error validasi server → map ke field via `setError`.

### 3.3 Upload
- `POST /api/upload` (multipart): auth wajib, cek mime (`image/jpeg`, `application/pdf`), maks 5 MB,
  simpan ke `/uploads/<modul>/<uuid>.<ext>`, return `{ fileName, url }`. Simpan `fileName` di field.
- Serve file lewat route handler `/uploads/[...path]` dengan cek akses bila perlu (data sensitif korban!).
  Jangan taruh foto korban di `public/`.

### 3.4 Cascading wilayah
- `GET /api/regions?level=province` | `?level=regency&parentId=` | `district` | `village`.
- Komponen `<RegionCascade value={{provinceId,regencyId,districtId,villageId}} onChange />`.
- Simpan **id `reg_*`** persis seperti lama supaya kompatibel data.

### 3.5 Audit (pengganti trigger MySQL)
```prisma
model AuditLog {
  id        String   @id @default(cuid())
  entity    String
  entityId  String
  action    String   // CREATE | UPDATE | DELETE
  before    Json?
  after     Json?
  userId    String?
  createdAt DateTime @default(now())
  @@index([entity, entityId])
}
```

## 4. Prisma schema — kerangka entitas inti

> Detail field lihat `00-glosarium.md` §4–§5. Sub-objek pelapor/korban/pelaku boleh
> di-**embed sebagai kolom ber-prefix** (paling dekat dgn skema lama, 1 tabel) atau
> di-**pisah ke tabel** (`Korban`, `Pelaku`) bila diinginkan. Rekomendasi awal: tetap 1 tabel
> `BeritaAcara` dengan kolom ber-prefix `pelapor*/korban*/pelaku*/lapor*` untuk mempermudah ETL,
> lalu refactor belakangan.

```prisma
enum BeritaAcaraStatus { PENGAJUAN PROSES SELESAI DITOLAK }

model BeritaAcara {
  id                String   @id                 // = berita_acara_id lama
  kode              String   @unique             // = berita_acara_kode lama, immutable
  status            BeritaAcaraStatus @default(PENGAJUAN)
  alasanDihentikan  String?
  tanggal           DateTime
  hari              String?
  kronologi         String?  @db.Text
  harapan           String?
  penerimaLaporan   String?
  kepalaUptd        String?
  keterangan        String?

  pelaporNama       String?
  pelaporTanggalLapor DateTime?
  pelaporTempat     String?
  pelaporNik        String?
  pelaporPekerjaan  String?
  pelaporTelepon    String?
  pelaporRegencyId  String?
  pelaporDistrictId String?
  pelaporVillageId  String?

  korbanNik         String?
  korbanNama        String?
  korbanJenisKelamin String?
  korbanAgama       String?
  korbanTempatLahir String?
  korbanAlamat      String?
  korbanTanggalLahir DateTime?
  korbanUsia        Int?
  korbanProvinceId  String?
  korbanRegencyId   String?
  korbanDistrictId  String?
  korbanVillageId   String?
  korbanFoto1       String?
  korbanFoto2       String?
  korbanEmail       String?
  korbanTelepon     String?
  korbanTanggalKejadian DateTime?

  pelakuNama        String?
  pelakuJenisKelamin String?
  pelakuUsia        String?
  pelakuHubungan    String?
  pelakuPendidikan  String?
  pelakuAlamat      String?
  pelakuProvinceId  String?
  pelakuRegencyId   String?
  pelakuDistrictId  String?
  pelakuVillageId   String?
  pelakuNik         String?

  laporAnonim       Boolean  @default(false)
  laporRahasia      Boolean  @default(false)
  laporStatus       String?
  laporKategori     String?
  laporDisposisi    String?
  laporKlarifikasi  String?

  createdById       String?
  createdBy         User?    @relation(fields: [createdById], references: [id])
  createdAt         DateTime @default(now())
  updatedAt         DateTime @updatedAt
  deletedAt         DateTime?

  pendampingan      Pendampingan[]
  @@index([status])
  @@index([tanggal])
  @@index([korbanNik])
  @@index([pelaporNik])
}

model Pendampingan {
  id               String   @id                 // = layanan_id lama
  beritaAcaraKode  String
  beritaAcara      BeritaAcara? @relation(fields: [beritaAcaraKode], references: [kode])
  tanggal          DateTime
  jenisLayananText String?                       // CSV cache (kompat lama)
  keterangan       String?
  rtl              String?
  jenisPendampingId Int?
  jenisPendamping  JenisPendamping? @relation(fields: [jenisPendampingId], references: [id])
  foto1            String?
  foto2            String?
  foto3            String?
  tindakLanjut1    String?  @db.Text
  tindakLanjut2    String?  @db.Text
  tindakLanjut3    String?  @db.Text
  jenisKekerasan   PendampinganJenisKekerasan[]
  createdById      String?
  createdAt        DateTime @default(now())
  updatedAt        DateTime @updatedAt
  deletedAt        DateTime?
  @@index([beritaAcaraKode])
  @@index([tanggal])
}

model JenisKekerasan { id Int @id @default(autoincrement()) nama String  pendampingan PendampinganJenisKekerasan[] }
model JenisPendamping { id Int @id  nama String  pendampingan Pendampingan[] }  // seed id 1..4

model PendampinganJenisKekerasan {
  pendampinganId  String
  jenisKekerasanId Int
  pendampingan    Pendampingan   @relation(fields: [pendampinganId], references: [id])
  jenisKekerasan  JenisKekerasan @relation(fields: [jenisKekerasanId], references: [id])
  @@id([pendampinganId, jenisKekerasanId])
}

model RegionProvince { id String @id  name String  regencies RegionRegency[] }
model RegionRegency  { id String @id  name String  provinceId String  province RegionProvince @relation(fields:[provinceId],references:[id]) districts RegionDistrict[] }
model RegionDistrict { id String @id  name String  regencyId String  regency RegionRegency @relation(fields:[regencyId],references:[id]) villages RegionVillage[] }
model RegionVillage  { id String @id  name String  districtId String  district RegionDistrict @relation(fields:[districtId],references:[id]) }
```

## 5. Tema / UI baru

- Warna & tipografi baru — dokumen desain terpisah (belum ada). Sementara: shadcn default + 1 warna brand.
- Layout: sidebar kolaps (desktop) / drawer (mobile), header dengan menu user (Profil, Logout).
- Semua label & pesan Bahasa Indonesia. Format tanggal: `dd MMM yyyy` (WIB). Angka: locale `id-ID`.
- Aksesibilitas: form pakai `<label>` terkait, error `aria-describedby`, tabel punya header semantik.
- Halaman cetak: komponen terpisah tanpa layout dashboard, `@media print` bersih.

## 6. Konfigurasi & environment

```
DATABASE_URL="mysql://root:@localhost:3306/ppa_next"   # DB baru (boleh sama server, beda skema/nama)
LEGACY_DATABASE_URL="mysql://root:@localhost:3306/db_ppa"  # READONLY, hanya untuk scripts/etl
AUTH_SECRET="..."
UPLOAD_DIR="./uploads"
```

- DB baru **terpisah** dari `db_ppa`. ETL membaca `LEGACY_DATABASE_URL` (read-only), menulis `DATABASE_URL`.
- Jangan pernah `prisma migrate` terhadap `db_ppa`.
