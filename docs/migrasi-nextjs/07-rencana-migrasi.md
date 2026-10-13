# 07 — Rencana Migrasi Bertahap

Target: aplikasi Next.js baru berjalan penuh untuk **Berita Acara** & **Pendampingan** lebih dulu
(dipakai harian), modul lain menyusul. Sistem lama tetap hidup sampai paritas tercapai.

## Fase 0 — Fondasi proyek (½–1 minggu)

- [ ] Buat repo `ppa-next` (Next.js 15, TS strict, Tailwind v4, shadcn/ui, ESLint/Prettier, Vitest, Playwright).
- [ ] Prisma + `DATABASE_URL` ke DB baru kosong (`ppa_next`). Skema awal dari `06-target-nextjs.md` §4.
- [ ] Auth.js Credentials + halaman `/login` + `middleware.ts` + `/403`. Lihat `03-auth-dan-rbac.md`.
- [ ] Layout dashboard: sidebar (`lib/nav.ts`), header, menu user, toast.
- [ ] Komponen bersama: `<DataTable>` (TanStack server-side), `form/*` (RHF wrappers), `<RegionCascade>`, `<FileUpload>`.
- [ ] `lib/format.ts` (`formatTanggalID`, `hitungUmur`, `statusLabel`, `rupiah`), `lib/audit.ts`, `lib/auth/scope.ts`.
- **Exit:** bisa login sebagai tiap role, sidebar terfilter role, halaman kosong per modul ter-guard.

## Fase 1 — Data & referensi (½–1 minggu)

- [ ] Impor `reg_*` → `Region*` (script `scripts/etl/02-regions.ts`). Verifikasi jumlah baris.
- [ ] Seed: `Role` (1/2/3), `Setting`, `Periode` (`tbl_tahun`), `JenisKekerasan` (`ref_kekerasan`), `JenisPendamping` (`ref_progres` id 1..4), `Menu` + `RoleMenu` (dari `tbl_hak_akses`).
- [ ] Impor `tbl_user` → `User` (`scripts/etl/03-users.ts`): map level→roleId, `is_aktif`→bool, pertahankan `id_users` sebagai `id`, `user_id`→`legacyUserId`. Konversi charset latin1→utf8.
- [ ] Endpoint `GET /api/regions` (cascading) + `GET /api/pelapor` (list `User`).
- **Exit:** dropdown wilayah jalan; data user tampil di `/pelapor`; bisa login pakai hash lama.

## Fase 2 — Modul Berita Acara (1–2 minggu) — lihat `04-modul-berita-acara.md`

- [ ] ETL `tbl_ppa_berita_acara` → `BeritaAcara` (`scripts/etl/04-berita-acara.ts`): pertahankan `id` & `kode`, map `status` "1..4"→enum, `lapor_anonim/rahasia` "ya"→bool, tanggal invalid→null, hitung ulang `korbanUsia`.
- [ ] Salin file `upload_foto/` → `/uploads/berita-acara/`; catat file hilang.
- [ ] `GET /api/berita-acara` (list server-side + scope + filter tahun/bulan/tanggal).
- [ ] Halaman list + 3 kartu statistik + toolbar filter + export link.
- [ ] Form baru/edit (RHF+zod, section, modal cari korban, region cascade, upload).
- [ ] Server Actions create/update/delete (+ AuditLog, soft delete, aturan status & usia).
- [ ] Halaman detail (`/berita-acara/{id}`) dengan resolusi nama wilayah.
- [ ] Halaman cetak (`/berita-acara/{id}/cetak`).
- [ ] Export `.xlsx` (`/berita-acara/export`).
- [ ] Verifikasi ETL: 474 baris, sampel 10 record cocok field-by-field; jumlah per status cocok (247/227/0/0 saat audit).
- [ ] E2E Playwright: buat → muncul di list → edit status → cetak → export.
- **Exit:** operator bisa mengelola berita acara sepenuhnya di sistem baru.

## Fase 3 — Modul Pendampingan (1–2 minggu) — lihat `05-modul-pendampingan.md`

- [ ] ETL `tbl_ppa_pendampingan` → `Pendampingan` (`scripts/etl/05-pendampingan.ts`): pertahankan `layanan_id`→`id`, tautkan ke `BeritaAcara` via `kode`; `layanan_jenis` CSV → `jenisLayananText` + isi pivot `PendampinganJenisKekerasan` (match nama ke `JenisKekerasan`, yang tak match → buat/log); `layanan_progress`→`jenisPendampingId`. Sesi yatim → `beritaAcaraKode` disimpan, relasi null, dicatat.
- [ ] Salin `upload_layanan/` → `/uploads/pendampingan/`.
- [ ] `GET /api/pendampingan` (list + grouping per kode + scope).
- [ ] Halaman list (grup per berita acara) + form baru/edit (multi-select jenis di keduanya).
- [ ] Server Actions + AuditLog + soft delete.
- [ ] Halaman detail + **Resume Pendampingan** (`/berita-acara/{kode}/resume`, kumpulkan semua sesi urut tanggal).
- [ ] Export `.xlsx`.
- [ ] Tautkan dari `/berita-acara/{id}`: daftar pendampingan + tombol "Tambah Pendampingan" (prefil kode) + "Cetak Resume".
- [ ] Verifikasi ETL: 121 baris; resume salah satu kode cocok dengan sistem lama.
- **Exit:** alur berita acara → pendampingan → resume lengkap di sistem baru.

## Fase 4 — Dashboard & paritas pendukung (1 minggu)

- [ ] Dashboard (`/`): statistik berita acara (total, pengajuan, proses, jumlah yang punya pendampingan) — lihat `Model_berita_acara->get_statistics()`.
- [ ] `/pelapor` (CRUD `tbl_user` untuk pelapor/korban) — minimal read + create/edit dasar.
- [ ] `/data-terhapus` (soft-deleted berita acara & pendampingan, aksi restore) — pengganti `Kelola_sampah`.
- [ ] Halaman Profil user + ganti password.

## Fase 5 — Cutover

- [ ] ETL final (freeze sistem lama sesaat, jalankan ulang semua script, verifikasi).
- [ ] UAT dengan operator (skenario harian nyata).
- [ ] Pindahkan domain / reverse proxy ke app baru. Sistem lama read-only sebagai arsip.
- [ ] Monitoring error (mis. Sentry) + backup DB baru terjadwal.

## Fase 6 — Modul lanjutan (backlog, prioritas oleh pemilik produk)

Laporan (rekap/grafik/GIS), Relaas, Pertanahan/AJB, Litigasi, Pengaturan (menu/role/master),
PPRG/Rencana Aksi (konfirmasi apakah masih dipakai — lihat `01-arsitektur-lama.md` §6).

---

## Strategi migrasi data — ringkas (detail di `02-database.md` §5)

| Aturan | Nilai |
|---|---|
| Arah | `db_ppa` (readonly) → `ppa_next` |
| Identitas | pertahankan `id` lama semua entitas inti |
| Charset | baca latin1 → tulis utf8mb4, perbaiki mojibake |
| Idempoten | script bisa dijalankan ulang (`upsert` by id) |
| Laporan | tiap script hasilkan `etl_report/<entity>.csv` (baris gagal/yatim/file hilang) |
| Verifikasi | `scripts/etl/99-verify.ts` bandingkan COUNT + sampel acak field-by-field |

## Perkiraan waktu total (indikatif)

Fase 0–4: **6–9 minggu** untuk 1 dev fokus. Cutover + hardening: +1–2 minggu.
Modul lanjutan di luar estimasi ini.
