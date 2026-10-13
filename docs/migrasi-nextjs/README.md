# Dokumentasi Migrasi: PPA (CodeIgniter 3) → Next.js

> Paket dokumentasi ini dibuat **khusus untuk dibaca AI coding assistant** (Claude Code, Cursor, Copilot, dsb).
> Tujuan: memigrasi aplikasi lama **SIPETIK / PPA** (UPTD PPA DP2KBP3A Kabupaten Bandung) dari
> CodeIgniter 3 + AdminLTE ke **Next.js (App Router)** dengan tampilan baru, tanpa kehilangan logika bisnis.

---

## 1. Cara memakai dokumen ini (untuk AI)

1. **Selalu baca `00-glosarium.md` lebih dulu.** Istilah domain berbahasa Indonesia (korban, pelapor, pelaku, berita acara, pendampingan, relaas, dst.) dipakai di seluruh kode dan nama kolom.
2. Untuk memahami sistem lama: `01-arsitektur-lama.md` + `02-database.md`.
3. Untuk mengerjakan fitur, buka file modul yang relevan. **Dua modul prioritas** (paling sering dipakai user):
   - `04-modul-berita-acara.md`
   - `05-modul-pendampingan.md`
4. Untuk menulis kode baru: ikuti `06-target-nextjs.md` (stack, struktur folder, pola) dan `08-konvensi-ai-coding.md` (aturan wajib, Definition of Done).
5. Urutan pengerjaan proyek: `07-rencana-migrasi.md`.

## 2. Aturan penting saat migrasi (ringkas — detail di `08`)

- **JANGAN mengubah database lama secara destruktif.** Migrasi data berjalan satu arah (lama → baru) lewat script terpisah.
- **Pertahankan perilaku bisnis** yang ada meskipun kode lama "berantakan". Kalau ada bug di kode lama, catat di file modul sebagai `⚠️ CATATAN BUG LAMA`, jangan diam-diam mengubah arti.
- **Nama tabel & kolom baru** memakai map di `00-glosarium.md` (mis. `berita_acara_tgl` → `tanggal`). Jangan menyalin nama lama yang salah eja (`creat_at`, `ligitasi`).
- Semua string UI berbahasa **Indonesia**. Kode, nama variabel, komentar berbahasa **Inggris**.
- Setiap modul harus punya: list (server-side table), form create/edit, halaman detail, cetak/report, export Excel — sama seperti sistem lama, kecuali dokumen modul menyatakan lain.

## 3. Peta dokumen

| File | Isi |
|---|---|
| `00-glosarium.md` | Kamus istilah domain + map nama lama → nama baru |
| `01-arsitektur-lama.md` | Struktur CI3, request lifecycle, library kustom, "quirks" yang harus diwaspadai |
| `02-database.md` | Skema tabel inti, ERD, keanehan skema, strategi migrasi data |
| `03-auth-dan-rbac.md` | Login, session, menu dinamis & hak akses → rancangan Auth.js |
| `04-modul-berita-acara.md` | **PRIORITAS** — spesifikasi lengkap modul Berita Acara |
| `05-modul-pendampingan.md` | **PRIORITAS** — spesifikasi lengkap modul Pendampingan |
| `06-target-nextjs.md` | Stack target, struktur folder, pola API/Server Action, Prisma, upload, UI kit |
| `07-rencana-migrasi.md` | Rencana bertahap + checklist + strategi migrasi data |
| `08-konvensi-ai-coding.md` | Konvensi kode, Definition of Done, pola prompt, guardrail |

## 4. Fakta cepat tentang sistem lama

| Hal | Nilai |
|---|---|
| Framework | CodeIgniter **3.1.13** (PHP), generator **Harviacode CRUD** |
| Template UI | AdminLTE 2 (Bootstrap 3.3.7), jQuery, DataTables server-side |
| Database | MySQL, nama DB `db_ppa`, charset campur `latin1` |
| Auth | Session file CI, `password_hash`/`password_verify` (bcrypt) |
| Judul internal | "SIPETIK" |
| URL produksi | `https://dp2kbp3a.bandungkab.go.id/ppa/` |
| Default controller | `Home` (publik), area admin mulai dari `Welcome` (dashboard) |
| Routing | Default CI (`/controller/method/param`), tidak ada custom route |
| Jumlah data (saat audit) | berita_acara ≈ 474, pendampingan ≈ 121, user ≈ 325 |

## 5. Nama modul lama → route baru (ringkas)

| Controller lama | URL lama | Route baru (usul) | Status |
|---|---|---|---|
| `Kelola_berita_acara` | `/kelola_berita_acara` | `/berita-acara` | **prioritas** |
| `Kelola_pendampingan` | `/kelola_pendampingan` | `/pendampingan` | **prioritas** |
| `Kelola_pendaftaran` | `/kelola_pendaftaran` | `/pelapor` | pendukung (sumber data korban/pelapor) |
| `Kelola_laporan` | `/kelola_laporan` | `/laporan` | fase berikutnya |
| `Kelola_relaas` | `/kelola_relaas` | `/relaas` | fase berikutnya |
| `Kelola_ajb` | `/kelola_ajb` | `/pertanahan` | fase berikutnya |
| `Kelola_sampah` | `/kelola_sampah` | `/data-terhapus` | fase berikutnya |
| `user`, `userlevel`, `kelolamenu` | idem | `/pengaturan/*` | fase berikutnya |

> Modul lain (`Kelola_pprg`, `Kelola_litigasi`, `Kelola_ligitasi`, `Rencana_aksi`, `Data_kak`, `Tb_kak`, dll.) kemungkinan sisa sistem lain yang digabung. Konfirmasi ke pemilik produk sebelum dimigrasi. Lihat `01-arsitektur-lama.md` §6.
