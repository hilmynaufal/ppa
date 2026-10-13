# 04 — Modul Berita Acara (PRIORITAS)

> Modul paling sering dipakai. Entitas: laporan resmi penerimaan kasus kekerasan terhadap
> perempuan/anak, berisi data pelapor, korban, pelaku, kronologi, dan status penanganan.
>
> Sumber kode lama:
> - Controller: `application/controllers/Kelola_berita_acara.php`
> - Model: `application/models/Model_berita_acara.php`
> - Model pendukung (data korban/pelapor untuk modal pencarian): `application/models/Model_pendaftaran.php`
> - Views: `application/views/kelola_berita_acara/` (`_list`, `_form`, `_read`, `_report`)
> - Tabel: `tbl_ppa_berita_acara` (skema di `02-database.md`, map kolom di `00-glosarium.md` §4)

## 1. Rute & aksi (lama → baru)

| Aksi lama (`/kelola_berita_acara/...`) | Fungsi | Rute baru (usul) | Tipe |
|---|---|---|---|
| `index` | Halaman list + 3 kartu statistik | `GET /berita-acara` | page |
| `json` (POST) | Feed DataTables server-side | `GET /api/berita-acara` | route handler |
| `create` | Form tambah (dengan modal "cari korban/pelapor") | `GET /berita-acara/baru` | page |
| `create_action` (POST) | Simpan baru | Server Action `createBeritaAcara` | action |
| `update/{id}` | Form edit | `GET /berita-acara/{id}/edit` | page |
| `update_action` (POST) | Simpan perubahan | Server Action `updateBeritaAcara` | action |
| `read/{id}` | Halaman detail (read-only, nama wilayah diresolusi) | `GET /berita-acara/{id}` | page |
| `delete/{id}` | Hapus (hard delete di lama) | Server Action `deleteBeritaAcara` (soft delete) | action |
| `report/{id}` | Cetak berita acara (HTML → `window.print()`) | `GET /berita-acara/{id}/cetak` | page (print CSS) |
| `excel` | Export `.xls` semua data (dengan filter tahun/bulan/tanggal via query string) | `GET /berita-acara/export?tahun=&bulan=&tanggal=` | route handler (stream xlsx) |

## 2. Halaman List (`index`)

### Perilaku lama
- Memuat 3 kartu statistik dari `Model_berita_acara->get_berita_acara_stats()`:
  | Kartu | Query |
  |---|---|
  | **Total Berita Acara** | `COUNT(*)` (di-scope pelapor bila level 3) |
  | **Berita Acara Bulan Ini** | `COUNT(*) WHERE MONTH(berita_acara_tgl)=bulan_ini AND YEAR(...)=tahun_ini` |
  | **Berita Acara Pending** | `COUNT(*) WHERE berita_acara_status = 1` |
- Tabel `#mytable` = **DataTables server-side**, `ajax POST kelola_berita_acara/json`.
- Kolom tampil: `No | Action | Berita Acara Kode | Status | Tanggal | Pelapor Nama | Pelapor NIK | Korban NIK | Korban Nama`.
  - `No` = nomor urut hasil paginasi (dihitung di `rowCallback`).
  - `Status` di-render: `1→"Pengajuan Laporan"`, `2→"Sedang proses"`, `3→"Selesai"`, else `"Ditolak"`.
  - `Action` = tombol: **Lihat** (`read`), **Edit** (`update`), **Hapus** (`delete`, confirm), **Cetak PDF** (`report`, target `_blank`).
    Untuk level 3 (pelapor): tombol Hapus **tidak** ditampilkan.
- Filter di toolbar (client-side, mengubah `search` DataTables): dropdown **Tahun** (2020..tahun+2), **Bulan** (01..12), input **Tanggal**. Logika gabungan:
  - ada tanggal → cari string `YYYY-MM-DD`
  - ada tahun+bulan → cari `YYYY-MM`
  - ada tahun → cari `YYYY`
  - ada bulan → cari `-MM-`
  - filter juga meng-update `href` tombol Export Excel dengan query `?tahun=&bulan=&tanggal=`.
- Tombol atas: **Tambah Data** (`create`), **Export Ms Excel** (`excel`).

### Query `json()` lama (yang harus direplikasi endpoint baru)
- `SELECT` ~50 kolom dari `tbl_ppa_berita_acara`.
- `JOIN tbl_user ON tbl_ppa_berita_acara.user_id = tbl_user.id_users` (⚠️ hasil join tidak dipakai di kolom tampil; aman diabaikan, tapi hati-hati: INNER join ini **menyembunyikan** baris yang `user_id`-nya tak match user manapun).
- `WHERE user_id = :me` bila level 3.
- Tanpa filter default status (list `index` menampilkan semua status via `json`). Bandingkan: `Model_berita_acara->get_limit_data()` (dipakai di modal & dashboard) memfilter `berita_acara_status IN (1,2)`.

### Rancangan baru
- `GET /api/berita-acara?page=&pageSize=&sort=&order=&q=&tahun=&bulan=&tanggal=&status=`
  - Server-side: pagination (`skip/take`), sorting whitelist kolom, search `q` di `kode, pelaporNama, pelaporNik, korbanNik, korbanNama` (jangan `OR LIKE` ke semua kolom seperti lama — lambat).
  - Filter tanggal: `tanggal` exact → `where tanggal = ...`; `tahun`+`bulan` → range bulan; `tahun` → range tahun.
  - Terapkan `beritaAcaraScope(session)`.
  - Response: `{ rows: [...], total, page, pageSize }`. Kolom `no` dihitung di client.
- Tabel pakai **TanStack Table** + fetch ke endpoint di atas (server-side mode).
- Statistik: satu query group-by di server (`getBeritaAcaraStats`), tampilkan 3 kartu.
- Ganti "cetak PDF" jadi buka `/berita-acara/{id}/cetak` di tab baru (halaman print-friendly).

## 3. Form Create / Update (`create` / `update`)

View lama: `tbl_ppa_berita_acara_form.php` (~61 KB, satu form panjang bergaya wizard/section).
Ada juga `_form_1.php`, `_form_2.php` (varian lama, **abaikan**).

### Bagian form (kelompok field)
1. **Pilih Pelapor/Korban** — tombol buka **modal** berisi tabel data dari `tbl_user` (via `Model_pendaftaran->get_limit_data`, paginasi). Pilih baris → mengisi field pelapor & sebagian identitas korban ke form. (Di sistem lama `pelapor_idusers` yang seharusnya terisi tapi bertipe int → tidak reliabel; andalkan `pelapor_nik`.)
2. **Data Berita Acara**: `tanggal` (wajib), `hari`, `kronologi` (wajib), `harapan`, `penerima_laporan`, `kepala_uptd`, `keterangan`, `dihentikan`, `status` (di update saja).
3. **Data Pelapor**: `nama`, `tanggalLapor`, `tempat`, `nik`, `pekerjaan`, `telepon`, wilayah `kab/kec/desa` (cascading `reg_*`).
4. **Data Korban**: `nik`, `nama` (wajib), `jenisKelamin` (wajib; nilai: "Perempuan"/"Laki-Laki"), `agama` (wajib), `tempatLahir` (wajib), `alamat`, `tanggalLahir` (wajib), wilayah `prop/kab/kec/desa` (cascading; `prop`,`kab`,`kec` wajib), `email`, `telepon`, `tanggalKejadian`, `foto1`, `foto2` (upload jpg).
5. **Data Pelaku**: `nama`, `jenisKelamin`, `usia`, `hubungan` (dengan korban), `pendidikan`, `alamat`, wilayah, `nik`. (Semua opsional.)
6. **Data Laporan**: `anonim` (ya/tidak), `rahasia` (ya/tidak), `status` (mis. "valid"), `kategori`, `disposisi`, `klarifikasi`. (Semua opsional.)

### Aturan validasi lama (`_rules()`), field **wajib**:
```
berita_acara_tgl, berita_acara_kronologi,
korban_nama, korban_jeniskelamin, korban_agama, korban_tempat, korban_tgl_lahir,
korban_prop, korban_kab, korban_kec
```
Semua rule lain di-comment (tidak aktif). Delimiter error: `<span class="text-danger">`.

### Logika `create_action` lama (penting)
1. `new_name = time()` (unix timestamp).
2. `kode_layanan = "{time}-{korban_nik}"` → jadi `berita_acara_kode`.
3. Upload `korban_foto1`, `korban_foto2` (`allowed_types jpg,pdf`, `encrypt_name`), lalu **override** dengan `move_uploaded_file()` manual ke `./upload_foto/{kode}-file1.jpg` (paksa `.jpg`). Bila tak ada file baru → pakai nilai hidden `korban_foto11`/`korban_foto22` (nama file lama).
4. `berita_acara_status = 1` (selalu Pengajuan saat create).
5. `korban_usia = hitungUmur(korban_tgl_lahir)` (selisih tahun).
6. `create_at = update_at = now()`, `user_id = session.id_users`.
7. `INSERT` dengan `berita_acara_id = UUID()` (di-set MySQL).
8. flashdata sukses → redirect ke list.

### Logika `update_action` lama
- `_rules()` sama.
- `berita_acara_kode` **tidak diubah** (di-comment).
- `allowed_types` upload = `jpg` saja.
- `berita_acara_status` **diambil dari input** (bisa diubah operator: 1→2→3/4).
- `korban_usia` **tidak dihitung ulang** (⚠️ bug lama — di sistem baru: hitung ulang bila `tanggalLahir` berubah).
- `update_at = now()`. `create_at`, `user_id` tidak diubah.

### Rancangan baru
- Satu form React (`react-hook-form` + `zod`), dipecah jadi section/`<Tabs>` atau accordion (Berita Acara / Pelapor / Korban / Pelaku / Laporan / Berkas).
- Schema Zod `beritaAcaraSchema` — field wajib = daftar di atas. Pakai di client & server.
- **Modal "Cari Korban/Pelapor"**: `<Dialog>` + tabel (TanStack) fetch `GET /api/pelapor?q=` (dari `User`). Pilih → `form.setValue(...)` untuk field pelapor + prefil identitas korban bila tersedia.
- Cascading wilayah: 4 `<Select>` (Provinsi→Kab/Kota→Kecamatan→Desa) fetch `GET /api/regions?level=&parentId=`. Simpan **id** `reg_*`.
- Upload: komponen upload → `POST /api/upload` (multipart) → simpan file ke `/uploads/berita-acara/`, kembalikan nama file; simpan nama di field `korban.foto1/foto2`. Validasi mime (`image/jpeg`, `application/pdf`), maks mis. 5 MB. Pertahankan skema penamaan `{kode}-file1.jpg` bila ingin kompatibel dengan file lama; kalau tidak, pakai nama acak + simpan `originalName`.
- `kode`: pertahankan format `{unixSeconds}-{korbanNik}` **atau** ganti ke format lebih baik (mis. `BA/{YYYY}/{MM}/{seq}`) — **keputusan pemilik produk**. Apa pun pilihannya, `kode` wajib `UNIQUE` dan immutable setelah dibuat (pendampingan bergantung padanya).
- `status` create selalu `PENGAJUAN`. Update boleh mengubah status; transisi yang diizinkan: `PENGAJUAN→PROSES→SELESAI`, dan `→DITOLAK` dari PENGAJUAN/PROSES. Bila `SELESAI`/`DITOLAK`, wajib isi alasan (`alasanDihentikan`) untuk DITOLAK.
- `korban.usia` selalu di-derive dari `korban.tanggalLahir` saat simpan (create & update).
- Tulis **AuditLog** setiap create/update/delete (ganti trigger MySQL lama).

## 4. Halaman Detail (`read/{id}`)

View: `tbl_ppa_berita_acara_read.php`. Menampilkan seluruh field read-only.
Controller me-resolusi id wilayah → nama via `get_region_name('reg_regencies'|'reg_districts'|'reg_villages', id)`
(`SELECT name FROM <tabel> WHERE id = ?`). `korban_prop`/`pelaku_prop` ditampilkan apa adanya (tidak diresolusi ke `reg_provinces` di kode lama).

Baru: `GET /berita-acara/{id}` Server Component. Query `BeritaAcara` + `include` relasi wilayah
(atau join manual ke `Region*`). Terapkan scope. Tampilkan foto korban dari `/uploads/...`.
Tombol: Edit, Cetak, Kembali. Untuk PELAPOR tanpa tombol Edit bila bukan miliknya (harusnya sudah kefilter scope).

## 5. Cetak (`report/{id}`)

View: `tbl_ppa_berita_acara_report.php` (~16 KB) — dokumen HTML kop surat + `window.print()` otomatis.
Data & resolusi wilayah sama seperti `read`, plus `berita_acara_harapan`, `korban_usia`.

Baru: `GET /berita-acara/{id}/cetak` — halaman khusus print (CSS `@media print`, tanpa layout dashboard).
Opsi: render server-side HTML lalu `window.print()` on load, ATAU generate PDF (mis. `@react-pdf/renderer` / Playwright) bila butuh arsip PDF. Default: HTML print (paling dekat perilaku lama).

## 6. Export Excel (`excel`)

Lama: `exportexcel_helper.php` menulis format Excel XML kuno (`.xls`), 55+ kolom, semua baris
dari `Model_berita_acara->get_all($tahun, $bulan, $tanggal)`:
- `tanggal` param → `WHERE DATE(berita_acara_tgl) = :tanggal`
- else `tahun` → `WHERE YEAR(...) = :tahun`; `bulan` → `WHERE MONTH(...) = :bulan`
- urut `berita_acara_id DESC`.

Baru: `GET /berita-acara/export?tahun=&bulan=&tanggal=` → stream `.xlsx` (lib `exceljs`).
Kolom = superset field (boleh dirapikan, header Bahasa Indonesia). Terapkan scope role. Batasi
jumlah baris (mis. streaming) supaya aman.

## 7. Definition of Done modul ini

- [ ] List: server-side pagination/sort/search + 3 kartu statistik + filter tahun/bulan/tanggal.
- [ ] Scope role diterapkan di list, detail, edit, delete, report, export.
- [ ] Create: semua field wajib tervalidasi (client+server), `status=PENGAJUAN`, `kode` unik & immutable, `usia` di-derive, upload foto jalan, AuditLog tertulis.
- [ ] Update: `kode` tak berubah, transisi status valid, `usia` dihitung ulang, AuditLog.
- [ ] Delete: soft delete (`deletedAt`), hilang dari list default, muncul di `/data-terhapus`.
- [ ] Detail & Cetak: nama wilayah teresolusi, foto tampil.
- [ ] Export `.xlsx` dengan filter.
- [ ] Pendampingan milik berita acara ini bisa diakses (lihat `05`).
- [ ] Data hasil ETL: 474 baris tampil benar, sampel 10 record cocok field-by-field dengan sumber.

## 8. Catatan bug lama (jangan diwariskan)

1. `korban_usia` tidak update saat edit → **selalu derive dari tanggal lahir**.
2. Tidak ada cek `is_aktif` di login → **cek di sistem baru**.
3. `pelapor_idusers` int vs id user uuid → **relasikan lewat NIK atau id string yang benar**.
4. Hard delete + `Kelola_sampah` yang mengasumsikan soft delete → **konsistенkan pakai soft delete**.
5. `json()` INNER JOIN `tbl_user` menyembunyikan baris tanpa user → **pakai LEFT JOIN / relasi opsional**.
6. `OR LIKE` ke semua kolom untuk search → **whitelist kolom search**.
7. Semua data existing berstatus 1/2 (belum ada 3/4) — pastikan UI menangani 3/4 dengan benar meski data contoh nihil.
