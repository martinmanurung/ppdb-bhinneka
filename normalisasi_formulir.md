# Normalisasi Database Sistem PPDB

## 3.x Normalisasi Database

Normalisasi adalah proses pengelompokan atribut data ke dalam tabel-tabel relasional yang terstruktur dengan tujuan menghilangkan redundansi data dan mencegah anomali pada operasi *insert*, *update*, dan *delete*. Proses normalisasi dilakukan secara bertahap mulai dari Unnormalized Form (UNF), First Normal Form (1NF), Second Normal Form (2NF), hingga Third Normal Form (3NF).

Data yang menjadi sumber normalisasi adalah **Formulir Pendaftaran Peserta Didik Baru Sekolah Bhinneka** yang terdiri dari dua bagian: **Bagian I — Data Calon Siswa** dan **Bagian II — Data Orang Tua** (Ayah Kandung/Bapak Wali dan Ibu Kandung/Ibu Wali).

---

### 3.x.1 Unnormalized Form (UNF)

Pada tahap ini, seluruh atribut yang terdapat pada formulir pendaftaran dikumpulkan ke dalam satu tabel tunggal tanpa aturan tertentu. Tabel UNF mencerminkan kondisi data apa adanya seperti yang tertulis pada formulir fisik, termasuk kelompok atribut yang berulang.

**Tabel UNF — Formulir Pendaftaran**

| Atribut | Sumber |
|---------|--------|
| no_pendaftaran | Bagian I |
| nama_lengkap | Bagian I |
| nama_panggilan | Bagian I |
| jenis_kelamin | Bagian I |
| tempat_lahir | Bagian I |
| tanggal_lahir | Bagian I |
| alamat_jalan | Bagian I |
| kota_kabupaten | Bagian I |
| provinsi | Bagian I |
| agama | Bagian I |
| kewarganegaraan | Bagian I |
| anak_ke | Bagian I |
| jumlah_saudara_kandung | Bagian I |
| **nama_ayah** | **Bagian II — Ayah** |
| **tempat_lahir_ayah** | **Bagian II — Ayah** |
| **tanggal_lahir_ayah** | **Bagian II — Ayah** |
| **agama_ayah** | **Bagian II — Ayah** |
| **kewarganegaraan_ayah** | **Bagian II — Ayah** |
| **pendidikan_ayah** | **Bagian II — Ayah** |
| **pekerjaan_ayah** | **Bagian II — Ayah** |
| **alamat_ayah** | **Bagian II — Ayah** |
| **no_telp_ayah** | **Bagian II — Ayah** |
| *nama_ibu* | *Bagian II — Ibu* |
| *tempat_lahir_ibu* | *Bagian II — Ibu* |
| *tanggal_lahir_ibu* | *Bagian II — Ibu* |
| *agama_ibu* | *Bagian II — Ibu* |
| *kewarganegaraan_ibu* | *Bagian II — Ibu* |
| *pendidikan_ibu* | *Bagian II — Ibu* |
| *pekerjaan_ibu* | *Bagian II — Ibu* |
| *alamat_ibu* | *Bagian II — Ibu* |
| *no_telp_ibu* | *Bagian II — Ibu* |

**Contoh baris data UNF:**

| no_pendaftaran | nama_lengkap | ... | nama_ayah | pekerjaan_ayah | no_telp_ayah | nama_ibu | pekerjaan_ibu | no_telp_ibu |
|:---:|---|---|---|---|---|---|---|---|
| PPDB-2026-00001 | Ahmad Fauzi | ... | Budi Santoso | Wiraswasta | 08123456789 | Siti Rahayu | IRT | 08198765432 |

**Permasalahan yang ditemukan pada UNF:**
- Terdapat ***repeating group*** — Bagian II formulir memuat dua kelompok atribut yang memiliki struktur sama, yaitu data Ayah dan data Ibu, yang keduanya berada dalam satu baris
- Tabel menjadi sangat lebar (30+ kolom) dan sulit dikelola
- Tabel rentan terhadap anomali data pada operasi *insert*, *update*, dan *delete*

---

### 3.x.2 First Normal Form (1NF)

**Syarat 1NF:** Setiap kolom bersifat atomik (memiliki satu nilai), tidak terdapat *repeating group*, dan setiap baris bersifat unik dengan *primary key*.

**Masalah yang ditemukan:** Data orang tua (Ayah dan Ibu) pada formulir merupakan *repeating group* — keduanya memiliki kumpulan atribut yang identik (nama, tempat lahir, tanggal lahir, agama, kewarganegaraan, pendidikan, pekerjaan, alamat, no. telp) yang muncul berulang dalam satu baris.

**Solusi:** Kelompok data orang tua dipisahkan ke tabel tersendiri. Karena sistem juga mengakomodasi data Wali, maka dibuat tiga tabel terpisah: `ayah`, `ibu`, dan `wali`. Sementara data siswa ditempatkan pada tabel `students`, dan proses pendaftarannya dicatat pada tabel `pendaftaran`.

---

**Tabel 1NF — `students`** *(data calon siswa)*

| **id** *(PK)* | no_pendaftaran | nama_lengkap | nama_panggilan | nisn | tempat_lahir | tanggal_lahir | jenis_kelamin | agama | alamat_jalan | kota_kabupaten | provinsi | asal_sekolah | jenjang | kewarganegaraan | anak_ke | jumlah_saudara_kandung |
|:---:|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|
| 1 | PPDB-2026-00001 | Ahmad Fauzi | Fauzi | 1234567890 | Jakarta | 2018-05-10 | Laki-laki | Islam | Jl. Mawar No.5 | Tangerang | Banten | SDN 01 | SD | Indonesia | 2 | 1 |

---

**Tabel 1NF — `ayah`** *(repeating group Bagian II — Ayah dipindahkan)*

| **id** *(PK)* | no_pendaftaran *(FK)* | nama_lengkap | tempat_lahir | tanggal_lahir | agama | kewarganegaraan | pendidikan | pekerjaan | alamat | no_telp |
|:---:|---|---|---|---|---|---|---|---|---|---|
| 1 | PPDB-2026-00001 | Budi Santoso | Bandung | 1985-03-12 | Islam | Indonesia | S1 | Wiraswasta | Jl. Mawar No.5 | 08123456789 |

---

**Tabel 1NF — `ibu`** *(repeating group Bagian II — Ibu dipindahkan)*

| **id** *(PK)* | no_pendaftaran *(FK)* | nama_lengkap | tempat_lahir | tanggal_lahir | agama | kewarganegaraan | pendidikan | pekerjaan | alamat | no_telp |
|:---:|---|---|---|---|---|---|---|---|---|---|
| 1 | PPDB-2026-00001 | Siti Rahayu | Surabaya | 1988-07-20 | Islam | Indonesia | SMA | IRT | Jl. Mawar No.5 | 08198765432 |

---

**Tabel 1NF — `wali`** *(opsional, jika bukan orang tua kandung)*

| **id** *(PK)* | no_pendaftaran *(FK)* | nama_lengkap | hubungan_kerabat | tempat_lahir | tanggal_lahir | agama | kewarganegaraan | pendidikan | pekerjaan | alamat | no_telp |
|:---:|---|---|---|---|---|---|---|---|---|---|---|
| *(dikosongkan jika tidak ada wali)* | | | | | | | | | | | |

Setelah 1NF, diperoleh **4 tabel** (`students`, `pendaftaran`, `ayah`, `ibu`, `wali`) dengan setiap kolom bersifat atomik dan tidak ada *repeating group*.

---

### 3.x.3 Second Normal Form (2NF)

**Syarat 2NF:** Memenuhi 1NF dan tidak terdapat *partial dependency*, yaitu setiap atribut non-key harus bergantung penuh pada seluruh *primary key*. Syarat ini hanya berlaku bila *primary key* bersifat komposit (lebih dari satu kolom).

**Analisis *partial dependency*:**

| Tabel | Primary Key | Jenis PK | Partial Dependency |
|-------|------------|:---:|--------------------|
| `students` | `id` | Tunggal | Tidak ada ✅ |
| `pendaftaran` | `id` | Tunggal | Tidak ada ✅ |
| `ayah` | `id` | Tunggal | Tidak ada ✅ |
| `ibu` | `id` | Tunggal | Tidak ada ✅ |
| `wali` | `id` | Tunggal | Tidak ada ✅ |

**Kesimpulan:** Seluruh tabel menggunakan *primary key* tunggal sehingga tidak ada *partial dependency*. Semua tabel telah memenuhi 2NF tanpa perubahan struktur.

---

### 3.x.4 Third Normal Form (3NF)

**Syarat 3NF:** Memenuhi 2NF dan tidak terdapat *transitive dependency*, yaitu atribut non-key tidak boleh bergantung pada atribut non-key lainnya.

**Analisis *transitive dependency* pada seluruh tabel:**

| Tabel | Analisis | Keterangan |
|-------|----------|------------|
| `students` | `id → nama_lengkap`, `id → agama`, dst. | Semua atribut bergantung langsung pada `id` ✅ |
| `pendaftaran` | `id → status`, `id → submitted_at`, dst. | Semua atribut bergantung langsung pada `id` ✅ |
| `ayah` | `id → nama_lengkap`, `id → pekerjaan`, dst. | Semua atribut bergantung langsung pada `id` ✅ |
| `ibu` | `id → nama_lengkap`, `id → pekerjaan`, dst. | Semua atribut bergantung langsung pada `id` ✅ |
| `wali` | `id → nama_lengkap`, `id → hubungan_kerabat`, dst. | Semua atribut bergantung langsung pada `id` ✅ |

**Kesimpulan:** Tidak ditemukan *transitive dependency* pada seluruh tabel. Semua tabel telah memenuhi 3NF.

---

### 3.x.5 Hasil Akhir Normalisasi

Berikut adalah rangkuman proses normalisasi yang telah dilakukan berdasarkan Formulir Pendaftaran Peserta Didik Baru Sekolah Bhinneka:

| Tahap | Tindakan | Hasil |
|-------|----------|:---:|
| **UNF** | Seluruh atribut formulir dalam 1 tabel; terdapat *repeating group* data orang tua (Ayah & Ibu) | 1 tabel |
| **1NF** | *Repeating group* dipecah: data siswa → `students`, proses PPDB → `pendaftaran`, data ayah → `ayah`, data ibu → `ibu`, data wali → `wali` | 5 tabel |
| **2NF** | Semua *primary key* tunggal, tidak ada *partial dependency* | 5 tabel |
| **3NF** | Tidak ada *transitive dependency* | 5 tabel |

**Struktur relasi antar tabel hasil normalisasi:**

```
students ──1:1──▶ pendaftaran ──1:1──▶ ayah
  (id)              (student_id)         (pendaftaran_id)
                        │
                        ├──────────────▶ ibu
                        │                (pendaftaran_id)
                        │
                        └──────────────▶ wali  *(opsional)*
                                         (pendaftaran_id)
```

Hasil normalisasi ini menjadi landasan perancangan database sistem PPDB Online Sekolah Bhinneka yang diimplementasikan menggunakan framework Laravel.
