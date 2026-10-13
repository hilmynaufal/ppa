# 00 — Glosarium Domain & Peta Penamaan

Dokumen ini wajib dibaca AI sebelum menyentuh kode. Aplikasi menangani **layanan perlindungan
perempuan dan anak (PPA)**: penerimaan laporan kekerasan, pembuatan berita acara, dan
pendampingan korban oleh petugas (satgas / pekerja sosial / psikolog / hukum).

## 1. Istilah domain (Indonesia → makna)

| Istilah | Makna dalam sistem |
|---|---|
| **PPA** | Perempuan dan Perlindungan Anak. UPTD PPA = unit pelaksana teknis daerah. |
| **DP2KBP3A** | Dinas induk (Pengendalian Penduduk, KB, Pemberdayaan Perempuan & Perlindungan Anak) Kab. Bandung. |
| **Pelapor** | Orang yang melaporkan kejadian kekerasan. Disimpan di `tbl_user` (role level 3) dan direferensikan di berita acara sebagai `pelapor_*`. |
| **Korban** | Pihak yang mengalami kekerasan. Data `korban_*` di `tbl_ppa_berita_acara`. |
| **Pelaku** | Terduga pelaku kekerasan. Data `pelaku_*` di `tbl_ppa_berita_acara`. |
| **Berita Acara** | Dokumen resmi hasil penerimaan & klarifikasi laporan. Entitas inti: `tbl_ppa_berita_acara`. Punya kode unik (`berita_acara_kode`). |
| **Kronologi** | Uraian urutan kejadian pada berita acara (`berita_acara_kronologi`). |
| **Pendampingan** | Rangkaian layanan tindak lanjut untuk korban (kunjungan, konseling, pendampingan hukum, dll). Tabel `tbl_ppa_pendampingan`. Banyak baris pendampingan per satu berita acara. |
| **Tindak lanjut** | Rencana/aksi lanjutan pada tiap sesi pendampingan (`tindak_lanjut1..3`). |
| **RTL** | Rencana Tindak Lanjut (`layanan_rtl`). |
| **Layanan** | Satu sesi/entri pendampingan (prefiks kolom `layanan_*`). |
| **Jenis pendamping / progres** | Peran petugas yang menangani sesi: Satgas, Peksos (pekerja sosial), Psikolog, Hukum. Tabel `ref_progres`. Kolom `layanan_progress` menyimpan `progres_id` (bukan teks). |
| **Jenis kekerasan** | Kategori kasus: KDRT, Pelecehan Seksual, Pencabulan, Trafficking, Bullying, Penelantaran Anak, ABH, KBGO, Fisik, Psikis, Cybercrime, Hak Asuh Anak. Tabel `ref_kekerasan`. |
| **ABH** | Anak Berhadapan dengan Hukum. |
| **KBGO** | Kekerasan Berbasis Gender Online. |
| **Relaas** | Surat pemberitahuan/panggilan resmi (modul `Kelola_relaas`). |
| **AJB / Pertanahan** | Akta Jual Beli — modul bantuan hukum pertanahan (`Kelola_ajb`), kemungkinan di luar cakupan PPA inti. |
| **Litigasi / Ligitasi** | Bantuan hukum berperkara. `ligitasi` = salah eja dari `litigasi`; ada 2 controller/tabel duplikat. |
| **SKPD / OPD** | Satuan/Organisasi Perangkat Daerah (instansi pemerintah). `id_skpd`, `ref_department`. |
| **Disposisi** | Instruksi tindak lanjut atas laporan (`lapor_disposisi`). |
| **Klarifikasi** | Proses verifikasi laporan (`lapor_klarifikasi`). |
| **Berita acara dihentikan** | Alasan kasus dihentikan (`berita_acara_dihentikan`). |
| **Kepala UPTD** | Penandatangan dokumen (`berita_acara_kepala_uptd`). |
| **Penerima laporan** | Petugas yang menerima laporan (`berita_acara_penerima_laporan`). |
| **Tahun Anggaran** | Filter periode aktif (`tbl_tahun`, satu baris `status=1`). |

## 2. Wilayah administratif (penting — ada dua sistem paralel)

Sistem lama memakai **dua set tabel wilayah** yang tidak konsisten:

| Set | Tabel | Dipakai di | Kunci |
|---|---|---|---|
| **`reg_*`** (nasional, gaya Laravel `nusantara`) | `reg_provinces`, `reg_regencies`, `reg_districts`, `reg_villages` | `tbl_ppa_berita_acara` (`*_kab`,`*_kec`,`*_desa` menyimpan `id`), `tbl_user` (`province_id`,`regency_id`,`district_id`,`village_id`) | `id` numerik string berjenjang (prov 2, kab 5, kec 8/7, desa 13/10 digit) |
| **`ref_*`** (lokal/legacy) | `ref_prop`, `ref_kab`, `ref_kec`, `ref_desa` | modul lama lain, dropdown tertentu | `kd_*` / `id_*` pendek |

- Untuk **berita acara & pendampingan**, gunakan **hanya `reg_*`**.
- Resolusi nama wilayah di kode lama: `SELECT name FROM reg_regencies WHERE id = ?` (lihat `get_region_name()` di controller).
- Kab. Bandung: `regency_id = '3204'` (dipakai hardcoded di beberapa dropdown lama).
- Di sistem baru: sediakan tabel `region_*` hasil impor `reg_*`, plus endpoint cascading (provinsi → kab/kota → kecamatan → desa/kelurahan).

## 3. Peta penamaan: tabel lama → model baru (usulan Prisma)

| Tabel lama | Model baru | Catatan |
|---|---|---|
| `tbl_ppa_berita_acara` | `BeritaAcara` | Lihat §4 untuk map kolom |
| `tbl_ppa_berita_acara_log` | `BeritaAcaraLog` | Diisi oleh trigger MySQL saat UPDATE/DELETE. Di sistem baru: pakai tabel audit / `updatedAt` history. |
| `tbl_ppa_pendampingan` | `Pendampingan` | 1 berita acara → banyak pendampingan, relasi lewat **kode** (bukan id) |
| `tbl_user` | `User` | Menyimpan admin, petugas, DAN pelapor (dibedakan `id_user_level`) |
| `tbl_user_level` | `Role` | 1=Super Admin, 2=Operator (peksos/satgas/psikolog), 3=Pelapor |
| `tbl_menu` | `Menu` | Menu dinamis; di sistem baru bisa jadi statis + flag |
| `tbl_hak_akses` | `RoleMenu` | Junction role↔menu |
| `tbl_setting` | `Setting` | key/value. Baris: `Tampil Menu = ya` |
| `tbl_tahun` | `Periode` | Tahun anggaran aktif |
| `ref_kekerasan` | `JenisKekerasan` | seed data |
| `ref_progres` | `JenisPendamping` | seed data (Satgas/Peksos/Psikolog/Hukum) |
| `ref_perkara`, `ref_status_berkas`, dll | `Ref*` | seed data modul hukum |
| `reg_provinces/regencies/districts/villages` | `RegionProvince/Regency/District/Village` | impor apa adanya |
| `tbl_relaas`, `tbl_ajb`, `tbl_litigasi`, `tbl_pelayanan`, `tb_kak`, `tb_tor`, `rencana_aksi` | (fase lanjut) | konfirmasi cakupan |

## 4. Peta kolom: `tbl_ppa_berita_acara` → `BeritaAcara`

> Prinsip: buang prefiks redundan, perbaiki ejaan, kelompokkan jadi sub-objek (pelapor/korban/pelaku/laporan).
> **Simpan `berita_acara_kode` (map ke `kode`) — dipakai sebagai foreign key logis oleh pendampingan.**

| Kolom lama | Field baru | Tipe | Catatan |
|---|---|---|---|
| `berita_acara_id` (varchar36, `UUID()`) | `id` | String cuid/uuid | PK. Lama: composite PK `(berita_acara_id, berita_acara_kode)` |
| `berita_acara_kode` (varchar40) | `kode` | String unik | Format lama: `{unixtime}-{korban_nik}`. Pertahankan nilai lama saat migrasi. |
| `berita_acara_status` (varchar20) | `status` | enum `PENGAJUAN\|PROSES\|SELESAI\|DITOLAK` | Lama: `1`=Pengajuan, `2`=Sedang proses, `3`=Selesai, `4`=Ditolak (disimpan sebagai string angka) |
| `berita_acara_dihentikan` (text) | `alasanDihentikan` | String? | |
| `berita_acara_tgl` (date) | `tanggal` | Date | tanggal berita acara |
| `berita_acara_hari` (varchar30) | `hari` | String? | nama hari (redundan dgn `tanggal`) |
| `berita_acara_kronologi` (text) | `kronologi` | String? | |
| `berita_acara_penerima_laporan` | `penerimaLaporan` | String? | |
| `berita_acara_kepala_uptd` | `kepalaUptd` | String? | |
| `berita_acara_keterangan` | `keterangan` | String? | |
| `berita_acara_harapan` | `harapan` | String? | harapan pelapor/korban |
| `pelapor_nama` | `pelapor.nama` | String? | |
| `pelapor_tgl` (date) | `pelapor.tanggalLapor` | Date? | tanggal laporan |
| `pelapor_tempat` | `pelapor.tempat` | String? | |
| `pelapor_idusers` (int) | `pelapor.userId` | String? | id pelapor di `tbl_user` (⚠️ tipe int di kolom, tapi `tbl_user.id_users` varchar36 — lihat `02-database.md`) |
| `pelapor_nik` | `pelapor.nik` | String? | |
| `pelapor_pekerjaan` | `pelapor.pekerjaan` | String? | |
| `pelapor_telepon` | `pelapor.telepon` | String? | |
| `pelapor_kab` / `pelapor_kec` / `pelapor_desa` | `pelapor.regencyId/districtId/villageId` | String? | id `reg_*` |
| `korban_nik` | `korban.nik` | String? | |
| `korban_nama` | `korban.nama` | String? | |
| `korban_jeniskelamin` | `korban.jenisKelamin` | String? | "Laki-laki"/"Perempuan" |
| `korban_agama` | `korban.agama` | String? | |
| `korban_tempat` | `korban.tempatLahir` | String? | |
| `korban_alamat` | `korban.alamat` | String? | |
| `korban_tgl_lahir` (date) | `korban.tanggalLahir` | Date? | |
| `korban_usia` (int) | `korban.usia` | Int? | Dihitung dari `korban_tgl_lahir` via `hitungUmur()` saat simpan (selisih tahun). |
| `korban_prop` / `korban_kab` / `korban_kec` / `korban_desa` | `korban.provinceId/regencyId/districtId/villageId` | String? | id `reg_*` |
| `korban_foto1` / `korban_foto2` | `korban.foto1 / foto2` | String? | nama file di `/upload_foto/`. Pola nama: `{kode}-file1.jpg` |
| `korban_email` | `korban.email` | String? | |
| `korban_telepon` | `korban.telepon` | String? | |
| `korban_tglkejadian` (date) | `korban.tanggalKejadian` | Date? | |
| `pelaku_nama` | `pelaku.nama` | String? | |
| `pelaku_jenis_kelamin` | `pelaku.jenisKelamin` | String? | |
| `pelaku_usia` (varchar) | `pelaku.usia` | String? | (string di lama) |
| `pelaku_hubungan` | `pelaku.hubungan` | String? | hubungan dgn korban |
| `pelaku_pendidikan` | `pelaku.pendidikan` | String? | |
| `pelaku_alamat` | `pelaku.alamat` | String? | |
| `pelaku_prop/kab/kec/desa` | `pelaku.*Id` | String? | id `reg_*` |
| `pelaku_nik` | `pelaku.nik` | String? | |
| `lapor_anonim` | `laporan.anonim` | Bool | lama: "ya"/kosong |
| `lapor_rahasia` | `laporan.rahasia` | Bool | lama: "ya"/kosong |
| `lapor_status` | `laporan.status` | String? | mis. "valid" |
| `lapor_kategori` | `laporan.kategori` | String? | mis. "aduan". **Di report pendampingan dipakai sbagai "Jenis Kekerasan".** |
| `lapor_disposisi` | `laporan.disposisi` | String? | |
| `lapor_klarifikasi` | `laporan.klarifikasi` | String? | |
| `create_at` (datetime) | `createdAt` | DateTime | |
| `update_at` (datetime) | `updatedAt` | DateTime | |
| `delete_at` (datetime) | `deletedAt` | DateTime? | **soft delete tidak dipakai di kode lama** (DELETE = hard delete). Di sistem baru: aktifkan soft delete. |
| `user_id` (varchar36) | `createdById` | String? | id user pembuat (petugas) |

## 5. Peta kolom: `tbl_ppa_pendampingan` → `Pendampingan`

| Kolom lama | Field baru | Tipe | Catatan |
|---|---|---|---|
| `layanan_id` (varchar30, `UUID()`) | `id` | String | PK |
| `kode_beritaacara` (varchar40) | `beritaAcaraKode` → relasi `beritaAcara` | String | **FK logis ke `BeritaAcara.kode`** (bukan id!) |
| `layanan_tgl` (date) | `tanggal` | Date | tanggal sesi layanan |
| `layanan_jenis` (varchar100) | `jenisLayanan` | String? | Saat create: multi-select `ref_kekerasan.jenis_kekerasan`, disimpan **comma-joined** (`implode(',', ...)`). Saat edit: jadi input teks bebas. |
| `layanan_keterangan` (varchar255) | `keterangan` | String? | |
| `layanan_rtl` (varchar100) | `rtl` | String? | Rencana Tindak Lanjut |
| `layanan_progress` (varchar255) | `jenisPendampingId` → relasi `jenisPendamping` | String? | menyimpan `ref_progres.progres_id` |
| `layanan_foto1..3` (varchar30) | `foto1 / foto2 / foto3` | String? | file di `/upload_layanan/`. Pola: `{unixtime}-file1.{ext}`, ext `jpg` atau `pdf` |
| `tindak_lanjut1` (text) | `tindakLanjut1` | String? | dipakai (wajib saat create) |
| `tindak_lanjut2` (text) | `tindakLanjut2` | String? | hanya di edit |
| `tindak_lanjut3` (text) | `tindakLanjut3` | String? | hanya di edit |
| `creat_at` (datetime, **salah eja**) | `createdAt` | DateTime | |
| `update_at` (datetime) | `updatedAt` | DateTime | |
| `delete_at` (datetime) | `deletedAt` | DateTime? | hard delete di lama |
| `id_users` (varchar36) | `createdById` | String? | petugas pembuat (`$_SESSION['id_users']`) |

## 6. Nilai enum & konstanta

```text
BeritaAcara.status (lama → baru)
  "1" → PENGAJUAN   ("Pengajuan Laporan")
  "2" → PROSES      ("Sedang proses")
  "3" → SELESAI     ("Selesai")
  "4" → DITOLAK     ("Ditolak")
  * List default hanya menampilkan status 1 & 2 (lihat 04).

Role (id_user_level)
  1 → SUPER_ADMIN   ("Super Admin")           akses penuh
  2 → OPERATOR      ("Operator peksos/ satgas /psiko")
  3 → PELAPOR       ("Pelapor Tindak Kekerasan")  hanya lihat data miliknya

JenisPendamping (ref_progres)
  1 Satgas | 2 Peksos | 3 Psikolog | 4 Hukum

JenisKekerasan (ref_kekerasan) — seed:
  ABH, Penelantaran Anak, Bullying, Hak Asuh Anak, KDRT, Pelecehan Seksual,
  Pencabulan, Trafficking, Cybercrime, KBGO, Fisik, Psikis
```

## 7. Nama yang JANGAN disalin ke sistem baru

| Salah di lama | Yang benar |
|---|---|
| `creat_at` | `createdAt` |
| `Kelola_ligitasi` / tabel `ligitasi` | `litigasi` |
| `berita_acara_hari` (redundan) | derive dari `tanggal` |
| `Kelola_pelayanan_1`, `Kelola_relaas_`, `Model_relaas__`, `tbl_user_copy1`, `*_bak` | abaikan — file duplikat/eksperimen |
