# 01 — Arsitektur Sistem Lama (CodeIgniter 3)

Tujuan file ini: memberi AI gambaran cukup untuk **membaca** kode lama dengan benar dan
mengekstrak logika bisnis, tanpa perlu belajar CI3 secara mendalam.

## 1. Layout direktori (root: `C:\laragon\www\ppa_2025\ppa`)

```
application/
  config/
    routes.php        # default routing saja: default_controller = 'home'
    autoload.php       # library: Template, database, session | helper: url, form, racode, security
    database.php       # koneksi: localhost / root / (kosong) / db_ppa / mysqli
    config.php         # base_url, index_page = 'index.php', sess_driver = files, sess_expiration 7200
  controllers/         # ~40 file. Satu class per file, PascalCase = nama file.
  models/              # ~35 file. Pola Harviacode (json/get_all/get_by_id/total_rows/get_limit_data/insert/update/delete)
  views/               # PHP templates. Subfolder per modul.
  helpers/
    racode_helper.php  # HELPER KUSTOM PALING PENTING — lihat §4
    exportexcel_helper.php  # xlsBOF/xlsWriteLabel/... untuk export .xls (format Excel XML lama)
  libraries/
    Template.php       # layout loader minimalis — lihat §3
    Datatables.php      # server-side DataTables builder (Ignited Datatables)
    Pdf.php             # wrapper FPDF
    Encrypt.php
  third_party/fpdf/
system/                # core CI 3.1.13 — JANGAN diubah, JANGAN dimigrasi
assets/                # AdminLTE, bootstrap, datatables, jquery, select2, summernote, dll
upload_foto/           # foto korban (berita acara)
upload_layanan/        # foto/pdf pendampingan
upload_akta/ upload_relaas/ upload_layanan/  # modul lain
index.php              # front controller CI
ppa.zip               # (100 MB) arsip lama — abaikan
```

## 2. Request lifecycle CI3 (yang perlu diketahui)

1. Semua request masuk lewat `index.php`. URL: `.../index.php/<controller>/<method>/<param1>/<param2>`.
   (Di produksi `index.php` sering disembunyikan via `.htaccess`.)
2. Router memetakan segmen 1 → class controller, segmen 2 → method (default `index`), sisanya → argumen method.
3. Controller meng-`extends CI_Controller`. `__construct()` biasanya memanggil:
   - `is_login();` — guard auth + cek hak akses (lihat `03-auth-dan-rbac.md`).
   - `$this->load->model('Model_xxx');`
   - `$this->load->library('form_validation'|'datatables'|'upload'|'pagination');`
4. Akses DB via **Query Builder**: `$this->db->where(...)->get('tabel')->result()`.
5. Render: `$this->template->load('template', 'folder/view_file', $data);`
   → membungkus view dalam layout `views/template.php`.
6. Response mutasi data selalu **redirect** + `flashdata('message', ...)` (pola PRG).

### Pemetaan ke Next.js
| CI3 | Next.js (App Router) |
|---|---|
| Controller method yang me-render view | `page.tsx` (Server Component) + `loader`/fetch di server |
| Controller `*_action` (POST handler) | **Server Action** atau `route.ts` (Route Handler) |
| Method `json()` (feed DataTables) | Route Handler `GET /api/<modul>` dengan paginasi/sort/search server-side |
| `Model_xxx` | fungsi di `lib/db/<modul>.ts` memakai Prisma |
| `views/template.php` | `app/(dashboard)/layout.tsx` |
| `flashdata` | toast (mis. `sonner`) setelah Server Action |
| `form_validation` rules | schema **Zod** dipakai di client + server |

## 3. Library `Template` (layout)

`application/libraries/Template.php` — sangat sederhana:

```php
function load($template, $view, $view_data = array()) {
    $this->set('contents', $this->CI->load->view($view, $view_data, TRUE)); // render view ke string
    return $this->CI->load->view($template, $this->template_data);          // render layout, echo $contents
}
```

`views/template.php` = HTML lengkap AdminLTE: `<head>` (CSS AdminLTE/Bootstrap3/FontAwesome/Select2/DataTables),
header navbar (nama user + foto dari session + link Profile/Logout), sidebar (`views/template/sidebar.php`),
lalu `echo $contents;`, lalu blok `<script>` (jQuery 1.9.1, jQuery UI, Bootstrap 3, DataTables, SlimScroll, AdminLTE, Select2).

> **Catatan:** tiap view modul sering **memuat ulang** jQuery + DataTables sendiri via `<script src=...>`
> (kadang dari CDN, kadang lokal, versi campur 1.9/1.11/3.5). Di sistem baru cukup satu sumber.

## 4. `racode_helper.php` — helper kustom (WAJIB dipahami)

Fungsi global yang dipakai di banyak view/controller. Ekuivalen di sistem baru:

| Fungsi lama | Perilaku | Ekuivalen baru |
|---|---|---|
| `is_login()` | Redirect ke `/auth` bila tak ada session `id_users`. Lalu ambil `id_menu` dari `tbl_menu` berdasarkan nama controller (segmen URI 1), cek `tbl_hak_akses` untuk `id_user_level` — bila tak ada → redirect `/blokir`. | Middleware + cek `RoleMenu` |
| `hitungUmur($tgl_lahir)` | Selisih umur dalam **tahun** (`date_diff(...)->format('%y')`). | util `hitungUmur(date): number` |
| `tanggal_indonesia($tgl)` | `"2024-03-07"` → `"07 Maret 2024"`. | util `formatTanggalID()` |
| `cmb_dinamis($name,$table,$field,$pk,$selected,$order)` | Render `<select>` dari tabel DB. **Menghasilkan `value = $pk`, teks = UPPERCASE($field)**. Dipakai untuk `layanan_progress` (dari `ref_progres`). | `<Select>` + data dari API ref |
| `cmb_dinamis_*` (banyak varian: `_cetak`, `_layanan`, `_rencana_aksi`, `_propinsi`, `_kecamatan`, `_tahun`, `_biaya`) | Varian dengan filter/where berbeda (mis. filter SKPD, filter Kab. Bandung `regency_id='3204'`, filter tahun aktif). | komponen select khusus + query |
| `select2_dinamis($name,$table,$field,$placeholder)` | `<select multiple class="select2">` — **opsi `value = teks field`** (bukan id!). Dipakai untuk `layanan_jenis[]` dari `ref_kekerasan`. | multi-select; simpan array lalu `join(',')` bila ingin kompatibel |
| `datalist_dinamis(...)` | `<input list>` + `<datalist>` dari DB. | `<Combobox>` |
| `show_my_modal($content,$id,$data,$size)` | Bungkus view jadi Bootstrap modal. | komponen `<Dialog>` |
| `alert($class,$title,$desc)` | HTML alert box. | toast/alert |
| `checked_akses($id_user_level,$id_menu)` | `"checked"` bila baris hak akses ada. | checkbox controlled |
| `autocomplate_json($table,$field)` | Echo JSON hasil `LIKE %term%` untuk jQuery UI autocomplete. | Route Handler search |
| `rupiah($angka)` | Format `"Rp 1.000,00"`. | `Intl.NumberFormat('id-ID', {style:'currency',currency:'IDR'})` |
| `hash_password($p)` | `password_hash($p, PASSWORD_BCRYPT)`. | `bcrypt`/`argon2` |
| `rename_string_is_aktif($s)` | `'y'` → `"Aktif"`, else `"Tidak Aktif"`. | map |

## 5. Pola model Harviacode (semua model mirip)

Setiap `Model_xxx` punya properti `$table`, `$id`, `$order` dan method:

| Method | Fungsi | Catatan migrasi |
|---|---|---|
| `json()` | Bangun response DataTables server-side (select, join, `add_column('action', <html tombol>, <pk>)`), sering menambah filter berbasis `$_SESSION['id_user_level']`. | Ganti dengan endpoint list ber-paginasi; kolom "action" dibangun di frontend. |
| `get_all($filter...)` | Ambil semua baris (untuk export Excel). | `findMany` |
| `get_by_id($id)` | `where($this->id,$id)->get()->row()`. Kadang di-join. | `findUnique`/`findFirst` |
| `total_rows($q)` | Hitung baris dengan `like` di **semua kolom** (untuk paginasi manual). | `count` + `where` search |
| `get_limit_data($limit,$start,$q)` | Ambil halaman data; kadang `where berita_acara_status IN (1,2)`, kadang filter kepemilikan. | `findMany` + `skip/take` |
| `insert/update/delete($data)` | CRUD Query Builder. `insert` kadang didahului `$this->db->set('id','UUID()',FALSE)` agar PK di-generate MySQL. | Prisma; generate id via `cuid()`/`uuid()` di app. |

> **PK di-generate pakai `UUID()` MySQL** untuk `tbl_ppa_berita_acara`, `tbl_ppa_pendampingan`, `tbl_user`.
> Nilai lama adalah UUID v1 (36 char). Saat migrasi data, **pertahankan nilai id lama** supaya relasi tetap nyambung.

## 6. Inventaris modul (untuk keputusan cakupan)

| Controller | Perkiraan fungsi | Cakupan migrasi |
|---|---|---|
| `Home` | Landing publik + pendaftaran pelapor (link "Daftar") | Nanti (portal publik terpisah?) |
| `Auth` | login / cheklogin / logout | **Ya — fase 0** |
| `Blokir` | halaman "akses ditolak" | jadi halaman 403 |
| `Welcome` | Dashboard admin (statistik berita acara + list) | **Ya — fase 1** |
| `Kelola_berita_acara` | CRUD berita acara + report + excel | **Ya — prioritas (04)** |
| `Kelola_pendampingan` | CRUD pendampingan + report resume + excel | **Ya — prioritas (05)** |
| `Kelola_pendaftaran` | CRUD data pelapor/korban (`tbl_user`) — sumber modal "cari korban" | **Ya — pendukung** |
| `Kelola_laporan` | Rekap, grafik batang, GIS peta, cetak rekap | Fase 2 |
| `Kelola_relaas` / `Kelola_relaas_` | Surat relaas | Fase 2 |
| `Kelola_ajb` | Akta jual beli / pertanahan | Konfirmasi — mungkin di luar PPA |
| `Kelola_litigasi` / `Kelola_ligitasi` | Bantuan hukum berperkara (duplikat, salah eja) | Konfirmasi |
| `Kelola_sampah` | Recycle bin (data ber-`delete_at`) | Fase 2 (jadi filter soft-delete) |
| `Kelola_berita` | Versi lama modul berita acara (`Kelola_berita_acara` adalah penerus) | **Abaikan** |
| `Kelola_pprg`, `Kelola_pelayanan`, `Kelola_pelayanan_1`, `Kelola_rencana_aksi`, `Rencana_aksi`, `Data_kak`, `Tb_kak`, `Kelola_tor`, `Kelola_kak`, `Kelola_register`, `Kelola_pprg` | Sisa sistem perencanaan anggaran/PPRG (Perencanaan & Penganggaran Responsif Gender) — tampaknya aplikasi berbeda yang tergabung | **Kemungkinan besar di luar cakupan** — konfirmasi ke pemilik produk |
| `user`, `userlevel`, `kelolamenu`, `Tbl_*`, `Master_department`, `Ref_department`, `Ref_program`, `Profile_user`, `Poliklinik` | Master data & pengaturan | Fase 2 (`/pengaturan/*`) |

## 7. "Quirks" kode lama yang harus diwaspadai AI

1. **Composite primary key**: `tbl_ppa_berita_acara` PK = `(berita_acara_id, berita_acara_kode)`; `tbl_user` PK = `(id_users, user_id)`. Di sistem baru cukup satu PK; pastikan `kode` tetap `UNIQUE`.
2. **Relasi lewat kode, bukan id**: pendampingan → berita acara via `kode_beritaacara = berita_acara_kode`. Jangan pakai `berita_acara_id`.
3. **`layanan_progress` menyimpan angka id** (`ref_progres.progres_id`), bukan teks. `layanan_jenis` menyimpan **teks** comma-joined.
4. **Soft delete tidak jalan**: kolom `delete_at`/`delete_at` ada tapi `delete()` melakukan `DELETE` fisik. `Kelola_sampah` mengasumsikan soft delete — inkonsisten. **Sistem baru: pakai soft delete beneran.**
5. **Upload file**: kombinasi `CI upload library` + `move_uploaded_file()` manual. Nama file dipaksa pola `{kode}-file1.jpg` / `{time}-file1.{ext}`. `allowed_types` kadang `jpg,pdf` kadang `jpg` saja. Tidak ada validasi ukuran/mime yang ketat.
6. **`hitungUmur()` dipanggil hanya di create berita acara**, tidak di update → `korban_usia` bisa basi.
7. **`pelapor_idusers` bertipe `int`** padahal id user asli `varchar(36)` UUID → kolom ini praktis tidak terisi benar. Jangan diandalkan; pakai `pelapor_nik` untuk mencocokkan.
8. **Charset `latin1`** di hampir semua tabel → kemungkinan mojibake untuk karakter non-ASCII. Saat migrasi data, konversi ke UTF-8 (baca sebagai latin1, tulis utf8mb4).
9. **DataTables server-side lama mengirim seluruh baris** untuk beberapa modul (`per_page = 1000000`). Sistem baru harus paginasi beneran.
10. **Filter kepemilikan**: user level 3 (pelapor) hanya boleh melihat baris dengan `user_id = session id_users`. Level ≤ 2 lihat semua. Pertahankan aturan ini.
11. **Trigger MySQL**: ada `AFTER UPDATE`/`AFTER DELETE` di `tbl_ppa_berita_acara` yang menyalin OLD row ke `tbl_ppa_berita_acara_log`. Kalau migrasi DB baru tanpa trigger, ganti dengan audit log di aplikasi.
12. **Timezone**: sebagian controller memanggil `date_default_timezone_set('Asia/Jakarta')`. Simpan semua timestamp UTC di DB baru, tampilkan WIB.
