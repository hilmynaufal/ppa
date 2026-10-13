# 02 — Database: Skema, ERD, Migrasi Data

DB lama: MySQL, nama `db_ppa` (Laragon / `localhost` / user `root` / password kosong).
Charset dominan `latin1`. Tidak ada foreign key kecuali di tabel `reg_*`.

Skema mentah tabel inti tersimpan di `docs/migrasi-nextjs/_dump/schema_core.sql` (hasil `mysqldump --no-data`).
Regenerate:

```bash
"/c/laragon/bin/mysql/mysql-8.4.3-winx64/bin/mysqldump.exe" -u root -h 127.0.0.1 --no-data db_ppa > docs/migrasi-nextjs/_dump/full_schema.sql
```

## 1. ERD logis (entitas inti PPA)

```
                 ┌────────────────────────┐
                 │  BeritaAcara           │
                 │  id (uuid, PK)         │
                 │  kode (UNIQUE) ◄───────┼──────┐  relasi lewat KODE
                 │  status 1|2|3|4        │      │  (bukan id)
                 │  tanggal               │      │
                 │  korban_* / pelapor_*  │      │
                 │  pelaku_* / lapor_*    │      │
                 │  createdById ──────────┼───┐  │
                 └────────────────────────┘   │  │
                                              │  │
                 ┌────────────────────────┐   │  │
                 │  Pendampingan          │   │  │
                 │  id (uuid, PK)         │   │  │
                 │  beritaAcaraKode ──────┼───┼──┘
                 │  tanggal               │   │
                 │  jenisLayanan (csv)    │   │
                 │  jenisPendampingId ────┼───┼──► JenisPendamping (ref_progres)
                 │  foto1..3 / tindak_*   │   │
                 │  createdById ──────────┼───┤
                 └────────────────────────┘   │
                                              ▼
                 ┌────────────────────────┐
                 │  User (tbl_user)       │  id_users (uuid) + user_id (autoinc)
                 │  id_user_level ────────┼──► Role (tbl_user_level) 1|2|3
                 │  province/regency/     │
                 │  district/village_id ──┼──► Region* (reg_*)
                 └────────────────────────┘

  Menu ──< RoleMenu >── Role       (tbl_menu / tbl_hak_akses)
  Region: Province 1─* Regency 1─* District 1─* Village   (reg_*, ada FK asli)
  Ref: JenisKekerasan (ref_kekerasan), Periode (tbl_tahun), Setting (tbl_setting)
```

## 2. Tabel yang RELEVAN untuk fase prioritas

| Tabel | Baris (audit) | Peran | Migrasi |
|---|---:|---|---|
| `tbl_ppa_berita_acara` | ~474 | entitas inti | **wajib** |
| `tbl_ppa_pendampingan` | ~121 | tindak lanjut | **wajib** |
| `tbl_ppa_berita_acara_log` | — | audit (trigger) | opsional → audit app |
| `tbl_user` | ~325 | admin+petugas+pelapor | **wajib** |
| `tbl_user_level` | 3 | role | **wajib** (seed) |
| `tbl_menu` | ~28 | menu dinamis | jadi konfig |
| `tbl_hak_akses` | ~40 | role↔menu | jadi konfig/seed |
| `tbl_setting` | 1 | `Tampil Menu=ya` | seed |
| `tbl_tahun` | 5 | periode; `id=5` tahun 2022 `status=1` | seed |
| `ref_kekerasan` | 13 | jenis kekerasan | seed |
| `ref_progres` | 4 | jenis pendamping | seed |
| `reg_provinces` | ~38 | wilayah | impor |
| `reg_regencies` | ~514 | wilayah | impor |
| `reg_districts` | ~7.2k | wilayah | impor |
| `reg_villages` | ~83.4k | wilayah | impor |

Tabel `ref_prop/ref_kab/ref_kec/ref_desa`, `reg_districts_copy1`, `tbl_ppa_berita_acara_copy1`,
`tbl_user_bak/_copy1`, `user`, `visitor` → **abaikan** (legacy/duplikat/kosong).

## 3. Skema kolom (ringkas — detail map di `00-glosarium.md` §4–§5)

### `tbl_ppa_berita_acara`
- PK: `(berita_acara_id, berita_acara_kode)` — keduanya varchar, `berita_acara_id` = `UUID()`.
- Index: `berita_acara_id`, `pelapor_nik`.
- ~60 kolom, semua nullable kecuali `berita_acara_id`, `berita_acara_kode`.
- Grup kolom: `berita_acara_*` (10), `pelapor_*` (12), `korban_*` (20), `pelaku_*` (11), `lapor_*` (6), audit (4).
- Kolom komentar berguna dari DDL:
  - `berita_acara_status`: `'1 pengajuan 2 sdg proses 3 selasai 4 tolak'`
  - `pelapor_idusers`: `'ID PELAPOR DARI TBL_USER'` (tapi tipe `int` — tidak reliabel)
  - `lapor_anonim/rahasia`: `'ya'`; `lapor_status`: `'valid'`; `lapor_kategori`: `'aduan'`

### `tbl_ppa_pendampingan`
- PK: `layanan_id` (varchar30, `UUID()`).
- Tidak ada index lain, tidak ada FK.
- `kode_beritaacara` → cocok ke `tbl_ppa_berita_acara.berita_acara_kode`.
- `layanan_progress` → `ref_progres.progres_id`.
- Catatan salah eja kolom: `creat_at` (bukan `create_at`).

### `tbl_user`
- PK: `(id_users, user_id)`. `id_users` varchar36 UUID; `user_id` int AUTO_INCREMENT (UNIQUE).
- `phone` UNIQUE. `email`, `username`, `password` (bcrypt).
- `id_user_level` int (1/2/3). `is_aktif` enum('y','n').
- Wilayah: `province_id` int, `regency_id` int, `district_id` varchar36 (⚠️ tipe beda), `village_id` varchar255.
- Kolom "pelapor": `nik`, `pekerjaan`, `penyandang_disabilitas`, `alamat_domisili`, `pihak_konfirmasi`, dll.
- `update_time` punya `ON UPDATE CURRENT_TIMESTAMP`.

### `reg_*` (punya FK asli, `ON DELETE/UPDATE RESTRICT`)
```
reg_provinces(id char2, name)
reg_regencies(id char5, province_id char2 → provinces, name)
reg_districts(id char8, regency_id char5 → regencies, name)
reg_villages(id char13, district_id char8 → districts, name)
```

## 4. Trigger MySQL (di DB lama)

Ada trigger pada `tbl_ppa_berita_acara`:
- `AFTER UPDATE` → `INSERT INTO tbl_ppa_berita_acara_log SELECT OLD.*`
- (kemungkinan juga `AFTER DELETE` serupa)

Cek & ekspor:
```bash
"/c/laragon/bin/mysql/mysql-8.4.3-winx64/bin/mysql.exe" -u root -h 127.0.0.1 db_ppa \
  -e "SHOW TRIGGERS;" 
```
Di sistem baru: **jangan** replikasi trigger. Ganti dengan audit log di layer aplikasi
(mis. tabel `AuditLog { entity, entityId, action, before Json, after Json, userId, createdAt }`)
yang ditulis di setiap Server Action mutasi.

## 5. Strategi migrasi data (lama → baru)

### Prinsip
- **Read-only** terhadap `db_ppa`. Semua transformasi di script ETL terpisah (`scripts/etl/`).
- **Pertahankan id lama** (`berita_acara_id`, `layanan_id`, `id_users`) sebagai PK di DB baru agar relasi & referensi eksternal tetap valid.
- Konversi charset: baca kolom sebagai `latin1`, tulis `utf8mb4`. Deteksi & perbaiki mojibake umum (`Ã©` dst.) bila ada.
- Normalisasi:
  - `status` `"1".."4"` → enum.
  - `lapor_anonim`/`lapor_rahasia`: `"ya"` → `true`, selain itu `false`.
  - tanggal `0000-00-00` / `""` → `null`.
  - `korban_usia` kosong → hitung ulang dari `korban_tgl_lahir`.
  - `layanan_jenis` biarkan string csv; sediakan juga tabel pivot `PendampinganJenisKekerasan` bila ingin relasional (opsional).
- Relasi pendampingan: join `kode_beritaacara` → `BeritaAcara.kode`. Baris pendampingan **yatim** (kode tak ketemu) → tetap impor, set `beritaAcaraId = null`, log ke `etl_report.csv`.
- File upload: salin isi `upload_foto/` & `upload_layanan/` ke storage baru (`/uploads/berita-acara/`, `/uploads/pendampingan/`). Simpan hanya nama/relative path di DB, seperti sistem lama. Catat file yang direferensikan tapi hilang.

### Urutan load
1. `Role`, `Setting`, `Periode`, `JenisKekerasan`, `JenisPendamping` (seed).
2. `Region*` (impor `reg_*` apa adanya).
3. `User` (map `id_user_level` → `roleId`; `is_aktif` → bool).
4. `BeritaAcara`.
5. `Pendampingan` (resolusi FK via kode).
6. Verifikasi: hitung baris per tabel, bandingkan dengan sumber; sample 10 record tiap entitas dibandingkan field-by-field.

### Kerangka script ETL (usulan, TypeScript)
```
scripts/etl/
  00-connect.ts        # mysql2 pool ke db_ppa (READONLY), prisma client ke DB baru
  01-seed-ref.ts
  02-regions.ts
  03-users.ts
  04-berita-acara.ts
  05-pendampingan.ts
  06-files.ts
  99-verify.ts
  lib/transform.ts     # helper: toBool(ya), toDateOrNull, fixMojibake, mapStatus, hitungUmur
```

## 6. Perintah audit cepat (untuk AI saat butuh data nyata)

```bash
MYSQL="/c/laragon/bin/mysql/mysql-8.4.3-winx64/bin/mysql.exe"
# distribusi status berita acara
"$MYSQL" -u root -h 127.0.0.1 db_ppa -e "SELECT berita_acara_status, COUNT(*) FROM tbl_ppa_berita_acara GROUP BY 1;"
# contoh 1 berita acara + pendampingannya
"$MYSQL" -u root -h 127.0.0.1 db_ppa -e "SELECT berita_acara_kode, korban_nama, berita_acara_status FROM tbl_ppa_berita_acara ORDER BY create_at DESC LIMIT 5;"
"$MYSQL" -u root -h 127.0.0.1 db_ppa -e "SELECT kode_beritaacara, layanan_tgl, layanan_jenis, layanan_progress FROM tbl_ppa_pendampingan ORDER BY creat_at DESC LIMIT 10;"
# nilai distinct yang sering jadi enum
"$MYSQL" -u root -h 127.0.0.1 db_ppa -e "SELECT DISTINCT korban_jeniskelamin FROM tbl_ppa_berita_acara;"
"$MYSQL" -u root -h 127.0.0.1 db_ppa -e "SELECT DISTINCT lapor_kategori FROM tbl_ppa_berita_acara;"
```
