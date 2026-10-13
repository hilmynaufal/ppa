# _dump — Skema DB Lama (referensi)

- `schema_core.sql` — DDL tabel inti yang relevan untuk migrasi (berita acara, pendampingan, user, role, menu, ref, region). Termasuk definisi trigger `tbl_ppa_berita_acara`.
- `full_schema.sql` — DDL seluruh `db_ppa` (`mysqldump --no-data`).

Keduanya **tanpa data**. Untuk data nyata, query langsung (read-only) — lihat `../02-database.md` §6.

Regenerate:
```bash
MYSQLDUMP="/c/laragon/bin/mysql/mysql-8.4.3-winx64/bin/mysqldump.exe"
"$MYSQLDUMP" -u root -h 127.0.0.1 --no-data db_ppa > full_schema.sql
```
