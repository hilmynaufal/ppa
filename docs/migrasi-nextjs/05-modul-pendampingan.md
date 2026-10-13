# 05 — Modul Pendampingan (PRIORITAS)

> Rangkaian sesi layanan tindak lanjut untuk korban dari sebuah Berita Acara: kunjungan,
> konseling psikologis, pendampingan hukum, dsb. **Satu Berita Acara → banyak baris Pendampingan.**
>
> Sumber kode lama:
> - Controller: `application/controllers/Kelola_pendampingan.php`
> - Model: `application/models/Model_pendampingan.php` (+ `Model_berita_acara` untuk modal cari korban)
> - Views: `application/views/kelola_pendampingan/` (`_list`, `_form`, `_read`, `_report`)
> - Tabel: `tbl_ppa_pendampingan` (map kolom di `00-glosarium.md` §5)

## 1. Relasi kunci

```
BeritaAcara.kode  ◄────────  Pendampingan.beritaAcaraKode
   (UNIQUE)                     (kode_beritaacara)   -- FK LOGIS lewat KODE, bukan id

Pendampingan.jenisPendampingId  ────►  JenisPendamping.id   (ref_progres: 1 Satgas, 2 Peksos, 3 Psikolog, 4 Hukum)
   (kolom lama: layanan_progress menyimpan progres_id)
```

⚠️ **Jangan** menautkan lewat `berita_acara_id`. Kode lama & data lama menautkan lewat **kode**.
Di Prisma, buat relasi eksplisit:
```prisma
model Pendampingan {
  id                String    @id
  beritaAcaraKode   String
  beritaAcara       BeritaAcara? @relation(fields: [beritaAcaraKode], references: [kode])
  ...
}
```

## 2. Rute & aksi (lama → baru)

| Aksi lama (`/kelola_pendampingan/...`) | Fungsi | Rute baru (usul) | Tipe |
|---|---|---|---|
| `index` | List semua pendampingan (DataTables + row-group per kode) | `GET /pendampingan` | page |
| `json` (POST) | Feed DataTables (join berita acara + ref_progres) | `GET /api/pendampingan` | route handler |
| `create` | Form tambah (modal cari korban → set `kode_beritaacara`) | `GET /pendampingan/baru` | page |
| `create_action` (POST) | Simpan baru | Server Action `createPendampingan` | action |
| `update/{id}` | Form edit | `GET /pendampingan/{id}/edit` | page |
| `update_action` (POST) | Simpan perubahan | Server Action `updatePendampingan` | action |
| `read/{id}` | Detail satu sesi (join berita acara) | `GET /pendampingan/{id}` | page |
| `delete/{id}` | Hapus | Server Action `deletePendampingan` (soft delete) | action |
| `report/{id}` | **Resume Pendampingan**: cetak SEMUA sesi untuk berita acara terkait | `GET /berita-acara/{kode}/resume` atau `GET /pendampingan/{id}/resume` | page (print) |
| `excel` | Export `.xls` semua pendampingan | `GET /pendampingan/export` | route handler |

## 3. Halaman List (`index`)

### Perilaku lama (`tbl_ppa_pendampingan_list.php`)
- DataTables server-side, `ajax POST kelola_pendampingan/json`.
- Kolom: `No | Kode Registrasi | Layanan Tgl | Layanan Jenis | Jenis Pendampingan | Layanan Keterangan | Nama Korban | NIK Korban | Action`.
  (Header view menyebut "Layanan Keterangan" tapi kolom data yang dikirim adalah `tindak_lanjut1` — lihat catatan.)
- **Row grouping** by kolom index 1 (`kode_beritaacara`): setiap grup kode menyisipkan baris `<tr class="group">`. Klik header grup → toggle sort asc/desc (kode lama agak buggy, `table` undefined).
- `Action`: **Lihat** (`read`), **Edit** (`update`), **Hapus** (`delete`, confirm), **Cetak** (`report`, `_blank`).
- Tombol atas: **Tambah Data**, **Export Ms Excel**.

### Query `json()` lama
```sql
SELECT p.layanan_id, ba.korban_nama, ba.korban_nik, ba.korban_kec,
       p.kode_beritaacara, p.layanan_tgl, p.layanan_jenis, p.tindak_lanjut1,
       ba.korban_telepon, rp.progres_nama
FROM tbl_ppa_pendampingan p
LEFT JOIN tbl_ppa_berita_acara ba ON ba.berita_acara_kode = p.kode_beritaacara
LEFT JOIN ref_progres rp          ON rp.progres_id        = p.layanan_progress
GROUP BY p.layanan_id
ORDER BY p.layanan_id DESC
```
- Kolom `action` = 4 tombol, param `layanan_id`.
- **Tidak** ada filter kepemilikan level 3 di modul ini (berbeda dari berita acara) — ⚠️ artinya pelapor bisa melihat semua pendampingan. Di sistem baru: **terapkan scope** (pelapor hanya sesi untuk berita acara miliknya).

### Rancangan baru
- `GET /api/pendampingan?page=&pageSize=&sort=&order=&q=&beritaAcaraKode=&jenisPendampingId=`
  - join relasi `beritaAcara` (korbanNama, korbanNik, korbanKec, korbanTelepon) + `jenisPendamping` (nama).
  - `q` cari di `beritaAcaraKode, beritaAcara.korbanNama, beritaAcara.korbanNik`.
  - filter `beritaAcaraKode` (untuk tampilan "pendampingan milik 1 berita acara").
  - scope: PELAPOR → `where beritaAcara.createdById = me`.
- Tabel TanStack dengan **row grouping** by `beritaAcaraKode` (fitur `getGroupedRowModel`), atau tampilkan sebagai daftar ber-header per kode. Header grup bisa diklik untuk buka Resume.
- Kolom "Jenis Layanan": nilai `jenisLayanan` bisa berupa CSV (`"KDRT,Fisik"`) → render sebagai badge list (`split(',')`).

## 4. Form Create / Update (`tbl_ppa_pendampingan_form.php`)

Judul form: **"TINDAK LANJUT PENDAMPINGAN KORBAN"**. Field:

| Field | Create (`button_aktif == 1`) | Update |
|---|---|---|
| **Cari Nama Korban** | `readonly` input `korban_nama` + hidden `kode_beritaacara`; tombol buka modal "cari Nama Korban" | readonly, tanpa tombol modal |
| **Layanan Tgl** (`tanggal`) | `<input type=date>` (wajib) | sama |
| **Jenis Kekerasan** (`jenisLayanan`) | `select2_dinamis('layanan_jenis[]', 'ref_kekerasan', 'jenis_kekerasan')` — **multi-select**, opsi `value = teks`. Disimpan `implode(',', $_POST['layanan_jenis'])` (wajib) | **input teks bebas** `layanan_jenis` (single) |
| **Jenis Pendamping** (`jenisPendampingId`) | `cmb_dinamis('layanan_progress','ref_progres','progres_nama','progres_id')` — value = `progres_id` (wajib) | sama |
| **Foto Pendukung 1/2/3** (`foto1..3`) | `<input type=file>` (jpg/pdf); hidden `layanan_foto11/22/33` menyimpan nama lama; tombol "Lihat Foto" (modal `<embed>` PDF) | sama |
| **Keterangan Pendampingan** (`tindakLanjut1`) | `<textarea>` (wajib) | sama |
| `tindak_lanjut2`, `tindak_lanjut3` | tidak ada di create | ada di update (textarea) |
| hidden `layanan_id` | kosong | id sesi |

### Aturan validasi lama (`_rules()`), wajib:
```
kode_beritaacara, layanan_tgl, layanan_jenis[], layanan_progress, tindak_lanjut1
```

### Logika `create_action` lama
1. `$tes = implode(',', $_POST['layanan_jenis'])` → nilai `layanan_jenis`.
2. Upload 3 file (`allowed_types jpg,pdf`, `encrypt_name`), lalu `move_uploaded_file()` manual ke
   `./upload_layanan/{time}-file{n}.{ext}` (ext dari nama asli). Bila kosong → pakai hidden `layanan_fotoNN`.
3. `data` = `{ kode_beritaacara, layanan_tgl, layanan_jenis: $tes, layanan_keterangan, layanan_rtl,
   layanan_progress, foto1..3, tindak_lanjut1, creat_at = now(), update_at = now(), id_users = session }`.
   (`layanan_keterangan` & `layanan_rtl` ada di array tapi form create tidak menampilkannya → biasanya null.)
4. `INSERT` dengan `layanan_id = UUID()`.
5. flashdata → redirect list.

### Logika `update_action` lama
- `layanan_jenis` diambil apa adanya (`$this->input->post('layanan_jenis')`, single).
- `tindak_lanjut2`, `tindak_lanjut3` ikut tersimpan.
- `update_at` di-set dari input (bukan `now()` — ⚠️ minor bug; sistem baru pakai `updatedAt` otomatis).
- `creat_at`, `id_users` tidak diubah.

### Rancangan baru
- Satu form (`react-hook-form` + `zod`), field: `beritaAcaraKode` (dipilih via modal), `tanggal`,
  `jenisLayanan` (**multi-select** dari `JenisKekerasan`; simpan array), `jenisPendampingId`
  (select `JenisPendamping`), `keterangan`, `rtl`, `tindakLanjut1..3`, `foto1..3`.
- **Samakan create & update**: multi-select untuk `jenisLayanan` di keduanya. Simpan sebagai
  relasi many-to-many (`PendampinganJenisKekerasan`) **dan/atau** kolom cache CSV untuk kompatibilitas.
  Rekomendasi: relasi m2m sebagai sumber kebenaran, `jenisLayananText` (CSV) sebagai turunan.
- Modal "Cari Korban": `<Dialog>` + tabel berita acara (`GET /api/berita-acara?q=`), pilih →
  set `beritaAcaraKode` + tampilkan `korbanNama` readonly. (Prefer: kalau user masuk dari
  `/berita-acara/{id}` lalu klik "Tambah Pendampingan", `beritaAcaraKode` sudah terisi, modal disembunyikan.)
- Upload: `POST /api/upload` → `/uploads/pendampingan/`. Terima `image/jpeg` & `application/pdf`.
  Preview: gambar → `<img>`, pdf → `<embed>`/link.
- Tulis AuditLog.
- Scope: hanya boleh create/edit pendampingan untuk berita acara yang boleh diakses user.

## 5. Detail (`read/{id}`)

View `tbl_ppa_pendampingan_read.php` (kecil). Controller `get_by_id($id)` melakukan
`INNER JOIN tbl_ppa_berita_acara ON berita_acara_kode = kode_beritaacara` → menampilkan data sesi + identitas korban.

Baru: `GET /pendampingan/{id}` — query `Pendampingan` `include: { beritaAcara, jenisPendamping }`.
Tampilkan: tanggal, jenis layanan (badge), jenis pendamping, keterangan, RTL, tindak lanjut 1–3,
foto/berkas, + ringkas identitas korban dengan link ke `/berita-acara/{id}`.

## 6. Cetak "Resume Pendampingan" (`report/{id}`)

**Ini fitur penting.** View `tbl_ppa_pendampingan_report.php`. Alur controller:
1. `row = get_by_id($id)` (sesi + berita acara).
2. Ambil **semua** sesi untuk berita acara tsb:
   `SELECT * FROM tbl_ppa_pendampingan WHERE kode_beritaacara = :kode ORDER BY layanan_tgl ASC`.
3. Resolusi wilayah korban (`reg_villages/districts/regencies` → `name`).
4. Render dokumen "RESUME PENDAMPINGAN":
   - Header: No Registrasi (`kode`), Nama Korban, Usia, Tgl Lahir, Alamat (`desa, kec, kab`), **Jenis Kekerasan = `lapor_kategori`** (⚠️ di data nyata `lapor_kategori` sering NULL — pertimbangkan pakai gabungan `jenisLayanan` semua sesi).
   - Tabel: `No | Tanggal (d-m-Y) | Uraian Keterangan (Jenis Layanan + Keterangan + Tindak Lanjut) | Paraf`.
   - `window.print()` otomatis.

Baru: `GET /berita-acara/{kode}/resume` (lebih natural karena resume = per berita acara).
Halaman print-friendly: header identitas korban + tabel kronologis semua sesi pendampingan.
Sediakan juga tombol "Cetak Resume" di halaman detail berita acara & di list pendampingan (per grup kode).

## 7. Export Excel (`excel`)

Lama: 17 kolom (`No, Kode Beritaacara, Layanan Tgl, Layanan Jenis, Layanan Keterangan, Layanan Rtl,
Layanan Progress, Foto1..3, Tindak Lanjut1..3, Creat At, Update At, Delete At, Id Users`) dari `get_all()`.

Baru: `GET /pendampingan/export` → `.xlsx` via `exceljs`. Resolusi `jenisPendampingId` → nama,
`jenisLayanan` → teks. Terapkan scope. Dukung filter `?beritaAcaraKode=` & rentang tanggal.

## 8. Definition of Done modul ini

- [ ] List: server-side pagination/sort/search, grouping per kode berita acara, filter jenis pendamping.
- [ ] Scope role diterapkan (pelapor hanya lihat sesi untuk berita acaranya) — **perbaikan dari sistem lama**.
- [ ] Create & Update konsisten: `jenisLayanan` multi-select di keduanya.
- [ ] Relasi ke berita acara lewat `kode` (unik), bukan id.
- [ ] `jenisPendampingId` tersimpan sebagai id ref, ditampilkan sebagai nama.
- [ ] Upload foto/pdf jalan; preview benar.
- [ ] **Resume Pendampingan**: mengumpulkan semua sesi untuk satu kode, urut tanggal, print-friendly.
- [ ] Export `.xlsx`.
- [ ] AuditLog untuk create/update/delete.
- [ ] Soft delete.
- [ ] Data hasil ETL: 121 baris tampil benar; sesi yatim (kode tak ada di berita acara) tertangani (impor dengan `beritaAcara = null` + dilaporkan).

## 9. Catatan bug lama (jangan diwariskan)

1. Tidak ada scope kepemilikan → pelapor bisa lihat semua. **Perbaiki.**
2. `jenisLayanan` multi-select saat create tapi teks bebas saat edit → **konsistенkan multi-select**.
3. Resume memakai `lapor_kategori` (sering NULL) sebagai "Jenis Kekerasan" → **pakai `jenisLayanan` gabungan**.
4. `update_at` di-set dari input form, bukan waktu server → **pakai `updatedAt` otomatis**.
5. Kolom salah eja `creat_at` → `createdAt`.
6. `layanan_keterangan` & `layanan_rtl` tidak muncul di form create → sediakan di form baru bila memang dibutuhkan (konfirmasi pemilik produk).
7. Row-group toggle JS lama merujuk variabel `table` yang tak terdefinisi → jangan tiru.
