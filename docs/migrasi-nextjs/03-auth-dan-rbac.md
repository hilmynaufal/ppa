# 03 — Autentikasi & RBAC (Hak Akses)

## 1. Cara kerja di sistem lama

### Login (`application/controllers/Auth.php`)
- `GET /auth` → render `views/auth/login.php` (form: `username`, `password`; action `auth/cheklogin`).
  Field username menerima **username ATAU no HP** (placeholder "username/no HP") — tapi kode hanya query `WHERE username = ?`.
- `POST /auth/cheklogin`:
  1. `SELECT * FROM tbl_user WHERE username = :username`.
  2. `password_verify(:password, row.password)` (hash bcrypt).
  3. Jika cocok: **seluruh row user dimasukkan ke session** (`$this->session->set_userdata($user)`), lalu query tahun aktif (`tbl_tahun WHERE status = 1`) → simpan `Tahun_Anggaran` ke session. Redirect `/welcome`.
  4. Jika password salah: redirect `/auth` (tanpa pesan).
  5. Jika username tak ada: `flashdata('status_login', 'username atau password ... salah')` → redirect `/auth`.
- `GET /auth/logout` → `sess_destroy()` + flashdata → redirect `/Home`.

⚠️ **Catatan bug lama**: tidak ada cek `is_aktif = 'y'` saat login. Sistem baru **harus** menolak user non-aktif.

### Guard tiap request (`is_login()` di `racode_helper.php`, dipanggil di `__construct` controller admin)
```
1. Tidak ada session 'id_users'          → redirect /auth
2. modul = segmen URI ke-1 (nama controller, lowercase)
3. menu  = SELECT * FROM tbl_menu WHERE url = :modul   → ambil id_menu
4. akses = SELECT * FROM tbl_hak_akses
           WHERE id_menu = :id_menu AND id_user_level = session.id_user_level
5. akses kosong                          → redirect /blokir
```
Jadi otorisasi = **(role, menu) ada barisnya di `tbl_hak_akses`**. Granularitas hanya per-modul
(bukan per-aksi). Semua method dalam satu controller punya izin yang sama.

### Filter data per-role (di dalam model `json()` / `get_limit_data()`)
- `id_user_level == 3` (Pelapor): hanya baris miliknya
  - berita acara: `WHERE user_id = session.id_users`
  - pendaftaran: `WHERE id_users = session.id_users`
- `id_user_level == 2` (Operator): beberapa modul difilter per wilayah (`district_id`) atau SKPD.
- `id_user_level <= 2`: tombol aksi lengkap (termasuk hapus). Level 3: tanpa tombol hapus di sebagian modul.

### Menu dinamis (`views/template/sidebar.php`)
- Jika `tbl_setting['Tampil Menu'] == 'ya'`:
  `SELECT * FROM tbl_menu WHERE id_menu IN (SELECT id_menu FROM tbl_hak_akses WHERE id_user_level = :lvl) AND is_main_menu = 0 AND is_aktif = 'y'`
- Submenu: `WHERE is_main_menu = <id_menu induk> AND is_aktif = 'y'`.
- `is_main_menu`: `0` = item top-level; selain 0 = id menu induk (parent). Contoh: menu id 31–34 punya `is_main_menu = 30` (anak dari "Laporan").

### Data akses saat audit
```
Role 1 (Super Admin) : menu 1,2,3,14,21,23,25,27,28,29,30,31,32,34,35
Role 2 (Operator)    : menu 14,23,25,28,29,30
Role 3 (Pelapor)     : menu 14,25,28
  14=DASHBOARD  25=Kelola Pelapor  28=Kelola Berita Acara
  29=Pendampingan  30=Laporan(+31..34)  23=Profil user  35=Data Recycle
```

## 2. Rancangan untuk Next.js

### Stack
- **Auth.js (NextAuth v5)** dengan **Credentials provider** (username/HP + password).
- Session strategy: **JWT** (stateless) atau database session (Prisma adapter). JWT cukup untuk aplikasi internal ini.
- Hash: verifikasi bcrypt hash lama pakai `bcryptjs`. Saat user berhasil login dengan hash lama, boleh rehash ke argon2 (opsional).

### Model
```prisma
model User {
  id           String   @id            // = id_users lama (uuid)
  legacyUserId Int?     @unique        // = user_id lama (autoincrement), untuk referensi
  fullName     String
  username     String?  @unique
  phone        String?  @unique
  email        String?
  passwordHash String?
  isActive     Boolean  @default(true) // dari is_aktif 'y'/'n'
  roleId       Int
  role         Role     @relation(fields: [roleId], references: [id])
  // wilayah domisili (untuk filter operator)
  provinceId   String?
  regencyId    String?
  districtId   String?
  villageId    String?
  nik          String?
  // ... field pelapor lainnya
  createdAt    DateTime @default(now())
  updatedAt    DateTime @updatedAt
}

model Role {
  id    Int    @id            // 1 SUPER_ADMIN | 2 OPERATOR | 3 PELAPOR
  name  String                 // "Super Admin", dst
  menus RoleMenu[]
  users User[]
}

model Menu {
  key      String  @id         // "berita-acara", "pendampingan", "laporan", ...
  title    String
  icon     String?
  parent   String?             // key induk untuk submenu
  order    Int     @default(0)
  isActive Boolean @default(true)
  roles    RoleMenu[]
}

model RoleMenu {
  roleId  Int
  menuKey String
  role    Role  @relation(fields: [roleId], references: [id])
  menu    Menu  @relation(fields: [menuKey], references: [key])
  @@id([roleId, menuKey])
}
```

### Otorisasi
1. **`middleware.ts`**: cek session ada → kalau tidak, redirect `/login`. Cocokkan segmen path pertama (`/berita-acara/...` → `berita-acara`) dengan daftar menu yang diizinkan role. Kalau tidak → `/403`.
2. **Helper server** `assertAccess(menuKey)` dipanggil di tiap `page.tsx` & Server Action sebagai defense-in-depth (jangan hanya andalkan middleware).
3. **Scoping data** (ganti filter `id_user_level` lama):
   ```ts
   // lib/auth/scope.ts
   export function beritaAcaraScope(session): Prisma.BeritaAcaraWhereInput {
     if (session.role === 'PELAPOR') return { createdById: session.userId }
     if (session.role === 'OPERATOR') return {} // atau { korban: { regencyId: session.regencyId } } bila diinginkan
     return {} // SUPER_ADMIN
   }
   ```
   Terapkan scope ini di **setiap** query list/detail/report/export dan di mutasi (update/delete) untuk mencegah IDOR.
4. **Tombol aksi**: tampilkan tombol Hapus hanya untuk role != PELAPOR (sama seperti lama).

### Menu sidebar
- Simpan definisi menu **statis** di kode (`lib/nav.ts`) + tabel `RoleMenu` untuk on/off per role (seed dari `tbl_hak_akses`).
- Render sidebar dari `nav.ts` difilter oleh menu yang diizinkan role user.

### Kesetaraan perilaku (checklist)
- [ ] Login pakai username atau no HP.
- [ ] Tolak user `isActive = false`.
- [ ] Pesan error generik ("username atau password salah") — jangan bocorkan mana yang salah.
- [ ] Setelah login → dashboard `/`.
- [ ] Simpan periode aktif (tahun anggaran) ke session/context.
- [ ] Logout → hapus session → `/login`.
- [ ] Halaman 403 untuk akses modul tanpa izin.
- [ ] Pelapor hanya melihat datanya sendiri di semua modul.
