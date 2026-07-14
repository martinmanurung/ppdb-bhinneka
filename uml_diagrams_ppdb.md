# 📐 Diagram UML — Sistem PPDB Online Sekolah Bhinneka

---

## 1. Use Case Diagram

Menggambarkan interaksi antara aktor sistem dengan fungsi-fungsi yang tersedia.

```mermaid
graph LR
    subgraph SISTEM["🖥️  SISTEM PPDB ONLINE"]
        subgraph PUBLIK["Fitur Publik"]
            UC1(["Registrasi Akun"])
            UC2(["Login"])
        end
        subgraph ORTU["Fitur Orang Tua / Wali"]
            UC3(["Isi Biodata Calon Siswa"])
            UC4(["Isi Biodata Ayah"])
            UC5(["Isi Biodata Ibu"])
            UC6(["Isi Biodata Wali ‹opsional›"])
            UC7(["Submit Formulir Online"])
            UC8(["Pantau Status Pendaftaran"])
        end
        subgraph ADMIN["Fitur Admin / Verifikator"]
            UC9(["Dashboard Daftar Pendaftar"])
            UC10(["Cetak Formulir Pendaftaran"])
            UC11(["Ubah Status Pendaftaran"])
            UC12(["Export Data CSV"])
        end
    end

    OT["👤 Orang Tua / Wali"]
    AD["👤 Admin / Verifikator"]

    OT --- UC1
    OT --- UC2
    OT --- UC3
    OT --- UC4
    OT --- UC5
    OT --- UC6
    OT --- UC7
    OT --- UC8

    AD --- UC2
    AD --- UC9
    AD --- UC10
    AD --- UC11
    AD --- UC12

    style OT fill:#4f46e5,color:#fff,stroke:#3730a3
    style AD fill:#0891b2,color:#fff,stroke:#0e7490
    style SISTEM fill:#f8fafc,stroke:#cbd5e1
    style PUBLIK fill:#f1f5f9,stroke:#94a3b8
    style ORTU fill:#eff6ff,stroke:#93c5fd
    style ADMIN fill:#ecfdf5,stroke:#6ee7b7
```

---

### Tabel Use Case Lengkap

| UC ID | Nama Use Case | Aktor | Deskripsi |
|-------|--------------|-------|-----------|
| UC-01 | Registrasi Akun | Orang Tua/Wali | Membuat akun baru dengan email, WhatsApp, dan password |
| UC-02 | Login | Orang Tua/Wali, Admin | Masuk ke sistem menggunakan email/WhatsApp + password |
| UC-03 | Isi Biodata Siswa | Orang Tua/Wali | Mengisi data lengkap calon siswa (nama, NISN, TTL, dll.) |
| UC-04 | Isi Biodata Ayah | Orang Tua/Wali | Mengisi data ayah kandung (NIK, pekerjaan, penghasilan, HP) |
| UC-05 | Isi Biodata Ibu | Orang Tua/Wali | Mengisi data ibu kandung (NIK, pekerjaan, penghasilan, HP) |
| UC-06 | Isi Biodata Wali | Orang Tua/Wali | Mengisi data wali (opsional, jika bukan orang tua kandung) |
| UC-07 | Submit Formulir | Orang Tua/Wali | Mengirimkan formulir online; status berubah otomatis |
| UC-08 | Pantau Status | Orang Tua/Wali | Melihat status pendaftaran secara real-time |
| UC-09 | Dashboard Pendaftar | Admin | Melihat daftar semua pendaftar beserta statusnya |
| UC-10 | Cetak Formulir | Admin | Mencetak formulir yang sudah diisi untuk dicocokkan berkas fisik |
| UC-11 | Ubah Status | Admin | Mengubah status: Terverifikasi / Ditolak (dengan alasan) |
| UC-12 | Export CSV | Admin | Mengunduh rekap data pendaftar dalam format CSV |

---

## 2. Activity Diagram

Menggambarkan alur aktivitas lengkap proses PPDB dari awal hingga selesai.

```mermaid
flowchart TD
    START([🟢 Mulai]) --> A

    subgraph ONLINE["🌐 PROSES ONLINE"]
        A["Orang Tua membuka website PPDB"] --> B{Sudah punya akun?}
        B -->|Belum| C["Registrasi Akun\n(Email, WhatsApp, Password)"]
        C --> D["Login ke Sistem"]
        B -->|Sudah| D

        D --> E["Mengisi Biodata Calon Siswa\n(Nama, NISN, TTL, Jenis Kelamin, dll.)"]
        E --> F["Mengisi Biodata Ayah\n(NIK, Pekerjaan, Penghasilan, No. HP)"]
        F --> G["Mengisi Biodata Ibu\n(NIK, Pekerjaan, Penghasilan, No. HP)"]
        G --> H{Perlu data wali?}
        H -->|Ya| I["Mengisi Biodata Wali\n(NIK, Pekerjaan, Hubungan, No. HP)"]
        I --> J
        H -->|Tidak| J

        J["Submit Formulir Online"] --> K["Status: ⏳ Menunggu Penyerahan Berkas\nNomor Pendaftaran diterbitkan otomatis"]
    end

    subgraph OFFLINE["🏫 PROSES OFFLINE DI SEKOLAH"]
        K --> L["Orang Tua datang ke Sekolah\nmembawa berkas fisik"]
        L --> M["Admin mencetak formulir online\nuntuk dicocokkan"]
        M --> N{Data & berkas sesuai?}
        N -->|Tidak Sesuai| O["Admin menolak pendaftaran\n(dengan alasan)"]
        O --> P["Status: ❌ Ditolak"]
        N -->|Sesuai| Q["Pembayaran administrasi di sekolah"]
        Q --> R["Admin mengubah status di sistem"]
        R --> S["Status: ✅ Terverifikasi"]
    end

    subgraph REKAP["📊 REKAP DATA"]
        S --> T["Admin mengekspor data CSV"]
        T --> U["Data siap digunakan untuk pelaporan"]
    end

    P --> END
    U --> END([🔴 Selesai])

    style START fill:#22c55e,color:#fff,stroke:#16a34a
    style END fill:#ef4444,color:#fff,stroke:#dc2626
    style ONLINE fill:#eff6ff,stroke:#93c5fd
    style OFFLINE fill:#fefce8,stroke:#fde047
    style REKAP fill:#f0fdf4,stroke:#86efac
    style P fill:#fee2e2,stroke:#fca5a5
    style S fill:#dcfce7,stroke:#86efac
    style K fill:#fef9c3,stroke:#fde047
```

---

## 3. Sequence Diagram — Proses Submit Formulir

Menggambarkan urutan interaksi antar komponen saat orang tua submit formulir.

```mermaid
sequenceDiagram
    actor OT as 👤 Orang Tua/Wali
    participant BR as 🌐 Browser
    participant SV as ⚙️ Web Server
    participant DB as 🗃️ Database

    Note over OT,DB: Fase 1 — Membuka Halaman Formulir
    OT->>BR: Klik menu "Formulir Pendaftaran"
    BR->>SV: GET /pendaftaran/formulir
    SV->>DB: SELECT draft pendaftaran WHERE user_id = ?
    DB-->>SV: Return data draft (jika ada)
    SV-->>BR: Render halaman formulir + data yang sudah terisi
    BR-->>OT: Tampilkan formulir pendaftaran

    Note over OT,DB: Fase 2 — Mengisi & Menyimpan Data
    OT->>BR: Isi biodata siswa, ayah, ibu, wali
    BR->>SV: POST /pendaftaran/simpan (data formulir)
    SV->>SV: Validasi input data
    SV->>DB: INSERT/UPDATE data ke tabel students, ayah, ibu, wali
    DB-->>SV: Sukses
    SV-->>BR: Response: data tersimpan
    BR-->>OT: Notifikasi: "Data berhasil disimpan"

    Note over OT,DB: Fase 3 — Submit Formulir Final
    OT->>BR: Klik tombol "Submit Formulir"
    BR->>SV: POST /pendaftaran/submit
    SV->>DB: Validasi kelengkapan semua data
    DB-->>SV: Data lengkap ✓

    SV->>DB: UPDATE pendaftaran SET status = 'Menunggu Penyerahan Berkas'
    DB-->>SV: Sukses
    SV->>DB: Generate nomor_pendaftaran (PPDB-2026-00001)
    DB-->>SV: Nomor pendaftaran dibuat
    SV-->>BR: Response: sukses + nomor pendaftaran
    BR-->>OT: Tampilkan halaman konfirmasi + Nomor Pendaftaran
```

---

## 4. Sequence Diagram — Proses Verifikasi oleh Admin

```mermaid
sequenceDiagram
    actor AD as 👤 Admin
    participant BR as 🌐 Browser
    participant SV as ⚙️ Web Server
    participant DB as 🗃️ Database

    Note over AD,DB: Fase 1 — Melihat Daftar Pendaftar
    AD->>BR: Buka Dashboard Admin
    BR->>SV: GET /admin/dashboard
    SV->>DB: SELECT * FROM pendaftaran ORDER BY submitted_at
    DB-->>SV: Return daftar pendaftar
    SV-->>BR: Render dashboard
    BR-->>AD: Tampilkan daftar pendaftar + status masing-masing

    Note over AD,DB: Fase 2 — Cetak Formulir
    AD->>BR: Klik "Cetak Formulir" pada pendaftar tertentu
    BR->>SV: GET /admin/pendaftaran/{id}/cetak
    SV->>DB: SELECT data lengkap pendaftaran JOIN students, ayah, ibu, wali
    DB-->>SV: Return data lengkap
    SV-->>BR: Generate halaman cetak (print-friendly)
    BR-->>AD: Buka dialog cetak browser

    Note over AD,DB: Fase 3 — Verifikasi & Ubah Status
    AD->>BR: Klik "Terverifikasi" setelah cocok & pembayaran selesai
    BR->>SV: PUT /admin/pendaftaran/{id}/status {status: "Terverifikasi"}
    SV->>DB: UPDATE pendaftaran SET status='Terverifikasi', verified_at=NOW()
    DB-->>SV: Sukses
    SV-->>BR: Response: status berhasil diubah
    BR-->>AD: Dashboard diperbarui — status tampil "Terverifikasi"
```

---

## 5. Entity-Relationship Diagram (ERD)

Menggambarkan struktur database dan relasi antar tabel.

```mermaid
erDiagram
    USERS {
        int id PK
        string email UK
        string whatsapp UK
        string password
        enum role "orang_tua | admin"
        timestamp created_at
        timestamp updated_at
    }

    STUDENTS {
        int id PK
        int user_id FK
        string nama_lengkap
        string nisn UK
        string tempat_lahir
        date tanggal_lahir
        enum jenis_kelamin "L | P"
        string agama
        text alamat
        string asal_sekolah
        string jenjang "SD | SMP | SMA"
        timestamp created_at
    }

    PENDAFTARAN {
        int id PK
        int student_id FK
        string nomor_pendaftaran UK "PPDB-YYYY-NNNNN"
        enum status "Belum Submit | Menunggu Penyerahan Berkas | Terverifikasi | Ditolak"
        text alasan_penolakan
        timestamp submitted_at
        timestamp verified_at
        timestamp created_at
    }

    AYAH {
        int id PK
        int pendaftaran_id FK
        string nama
        string nik
        string pekerjaan
        string penghasilan
        string no_hp
    }

    IBU {
        int id PK
        int pendaftaran_id FK
        string nama
        string nik
        string pekerjaan
        string penghasilan
        string no_hp
    }

    WALI {
        int id PK
        int pendaftaran_id FK
        string nama
        string nik
        string hubungan
        string pekerjaan
        string penghasilan
        string no_hp
    }

    USERS ||--|| STUDENTS : "1 akun memiliki 1 data siswa"
    STUDENTS ||--|| PENDAFTARAN : "1 siswa memiliki 1 pendaftaran"
    PENDAFTARAN ||--|| AYAH : "memiliki data ayah"
    PENDAFTARAN ||--|| IBU : "memiliki data ibu"
    PENDAFTARAN ||--o| WALI : "opsional memiliki data wali"
```

---

## 6. Class Diagram (Ringkas)

```mermaid
classDiagram
    class User {
        +int id
        +string email
        +string whatsapp
        +string password
        +string role
        +login()
        +logout()
        +register()
    }

    class Student {
        +int id
        +string namaLengkap
        +string nisn
        +string tempatLahir
        +Date tanggalLahir
        +string jenisKelamin
        +string agama
        +string alamat
        +string asalSekolah
        +string jenjang
    }

    class Pendaftaran {
        +int id
        +string nomorPendaftaran
        +string status
        +string alasanPenolakan
        +DateTime submittedAt
        +DateTime verifiedAt
        +submit()
        +ubahStatus()
        +cetakFormulir()
        +exportCSV()
    }

    class OrangTua {
        +string nama
        +string nik
        +string pekerjaan
        +string penghasilan
        +string noHp
    }

    class Ayah {
        +isiData()
    }

    class Ibu {
        +isiData()
    }

    class Wali {
        +string hubungan
        +isiData()
    }

    User "1" --> "1" Student : memiliki
    Student "1" --> "1" Pendaftaran : terdaftar dalam
    Pendaftaran "1" --> "1" Ayah : memiliki
    Pendaftaran "1" --> "1" Ibu : memiliki
    Pendaftaran "1" --> "0..1" Wali : opsional

    OrangTua <|-- Ayah : extends
    OrangTua <|-- Ibu : extends
    OrangTua <|-- Wali : extends
```

---

*Diagram UML ini dibuat untuk keperluan Laporan Kerja Praktik — Sistem PPDB Sekolah Bhinneka*
