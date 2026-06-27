# 🎬 Konten Slide & Narasi Detail — Video PPDB Sekolah Bhinneka

> Dokumen ini berisi konten siap pakai untuk slide presentasi dan skrip voiceover per segmen.
> Format: **[SLIDE]** = konten yang ditampilkan di layar | **[NARASI]** = yang dibacakan

---

## SEGMEN 1 — INTRO & IDENTITAS PROYEK
**Durasi:** ~1 menit | **Musik:** Instrumental ringan, fade in

---

### Slide 1.1 — Opening Title

**[SLIDE]**
```
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    [Logo Sekolah]  [Logo Kampus]
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

  PERANCANGAN DAN IMPLEMENTASI
  SISTEM PENERIMAAN PESERTA DIDIK
       BARU (PPDB) ONLINE
        BERBASIS WEB

  Menggunakan Metode Waterfall
  pada Sekolah Bhinneka

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
         Kerja Praktik
```

**[NARASI]**
> *"Selamat datang. Video ini merupakan presentasi dari proyek Kerja Praktik kami — sebuah sistem digital yang kami rancang dan implementasikan untuk menjawab tantangan nyata yang kami temukan di lapangan.*
>
> *Judul proyek kami adalah: Perancangan dan Implementasi Sistem Penerimaan Peserta Didik Baru — atau PPDB — Online Berbasis Web, menggunakan Metode Waterfall, pada Sekolah Bhinneka."*

---

### Slide 1.2 — Tim & Mitra

**[SLIDE]**
```
👥  TIM PENGEMBANG
    [FERDIAN SYAHPUTRA]  —  [231011400267]
    [MARTIN RIVALDO MANURUNG]  —  [231011400295]
    [WILLY KONSTANTINOVEL]  —  [231011403296]

🏫  MITRA KERJA PRAKTIK
    Sekolah Bhinneka

🎓  DOSEN PEMBIMBING
    [Maulana Ardhiansyah, S.Kom, M.Kom]
```

**[NARASI]**
> *"Proyek ini dikerjakan oleh tim kami yang beranggotakan [sebutkan nama], di bawah bimbingan [nama dosen pembimbing], dengan Sekolah Bhinneka sebagai mitra kerja praktik kami."*

---

---

## SEGMEN 2 — LATAR BELAKANG & STUDI KASUS
**Durasi:** ~2 menit | **Visual:** Ilustrasi formulir kertas, animasi error

---

### Slide 2.1 — Kondisi Sebelumnya

**[SLIDE]**
```
📋  KONDISI AWAL SEKOLAH BHINNEKA

  ✍️  Formulir Pendaftaran → Ditulis Manual
         ↓
  👤  Staf Admin → Input Ulang ke Excel
         ↓
  ⚠️  Risiko Kesalahan & Data Tidak Lengkap

  Sumber: Wawancara & Observasi Langsung
```

**[NARASI]**
> *"Melalui proses wawancara dan observasi langsung di Sekolah Bhinneka, kami menemukan sebuah tantangan nyata.*
>
> *Selama ini, proses Penerimaan Peserta Didik Baru dilakukan sepenuhnya secara manual. Orang tua mengisi formulir fisik menggunakan tulisan tangan, dan staf administrasi sekolah kemudian harus menginput kembali seluruh data tersebut satu per satu ke dalam Microsoft Excel.*
>
> *Proses double-entry seperti ini — di mana data diinput dua kali — membuka celah yang cukup besar bagi terjadinya kesalahan."*

---

### Slide 2.2 — Identifikasi Masalah

**[SLIDE]**
```
❗  MASALAH YANG DITEMUKAN

  1. ✏️  Rentan typo — kesalahan penulisan saat input ulang
  2. 📄  Data tertinggal — ada field yang tidak terinput
  3. 🕐  Proses lambat — antrian input data membutuhkan waktu
  4. 📊  Rekap sulit — tidak ada sistem terintegrasi
  5. 🗂️  Arsip manual — sulit dicari kembali di kemudian hari
```

**[NARASI]**
> *"Kami mengidentifikasi setidaknya lima masalah utama dari kondisi ini.*
>
> *Pertama, risiko typo atau kesalahan penulisan yang tinggi saat proses input ulang. Kedua, ada kemungkinan data tertinggal — field tertentu yang tidak terinput karena kelalaian. Ketiga, proses menjadi lambat karena staf harus mengerjakan dua tahap: menerima formulir dan menginput data. Keempat, tidak ada sistem rekap yang cepat dan terintegrasi. Dan kelima, data yang tersimpan di Excel sulit ditelusuri kembali jika sewaktu-waktu dibutuhkan.*
>
> *Inilah yang mendorong kami untuk merancang sebuah solusi yang lebih efisien dan handal."*

---

### Slide 2.3 — Solusi yang Diusulkan

**[SLIDE]**
```
💡  SOLUSI: SISTEM PPDB ONLINE BERBASIS WEB

  ✅  Orang tua mendaftar langsung via website
  ✅  Data masuk otomatis ke database
  ✅  Admin kelola semua data dalam satu platform
  ✅  Rekap & export data dalam hitungan detik
  ✅  Status pendaftaran dapat dipantau real-time
```

**[NARASI]**
> *"Solusi yang kami usulkan adalah Sistem PPDB Online berbasis web — sebuah platform digital yang memungkinkan orang tua untuk mengisi dan mengirimkan formulir pendaftaran secara langsung melalui internet, tanpa perlu menulis manual.*
>
> *Data yang diinput oleh orang tua akan tersimpan langsung ke dalam database sistem, sehingga staf administrasi tidak perlu lagi melakukan input ulang. Admin sekolah dapat memantau seluruh pendaftar, mencetak formulir, dan mengekspor data rekap hanya dengan beberapa klik."*

---

---

## SEGMEN 3 — SDLC: METODE WATERFALL
**Durasi:** ~2 menit | **Visual:** Diagram Waterfall bertahap, animasi mengalir

---

### Slide 3.1 — Apa itu SDLC?

**[SLIDE]**
```
🔄  SOFTWARE DEVELOPMENT LIFE CYCLE (SDLC)

  Kerangka kerja terstruktur yang menggambarkan
  proses perencanaan, pembuatan, pengujian,
  dan pengiriman sistem perangkat lunak.

  Tujuan:
  → Menghasilkan perangkat lunak berkualitas tinggi
  → Tepat waktu dan sesuai anggaran
  → Memenuhi kebutuhan pengguna
```

**[NARASI]**
> *"Sebelum membahas metode yang kami gunakan, perlu dipahami terlebih dahulu apa itu SDLC — atau Software Development Life Cycle.*
>
> *SDLC adalah sebuah kerangka kerja terstruktur yang menggambarkan proses lengkap pengembangan perangkat lunak: mulai dari perencanaan, analisis, perancangan, pengkodean, pengujian, hingga pemeliharaan.*
>
> *Tujuan utama SDLC adalah memastikan sistem yang dihasilkan memiliki kualitas tinggi, diselesaikan tepat waktu, dan benar-benar menjawab kebutuhan pengguna."*

---

### Slide 3.2 — Model Waterfall

**[SLIDE]**
```
💧  MODEL WATERFALL

  ┌───────────────────────────┐
  │  1. Requirements Analysis │  ← Analisis Kebutuhan
  ├───────────────────────────┤
  │  2. System Design         │  ← Perancangan Sistem
  ├───────────────────────────┤
  │  3. Implementation        │  ← Pengkodean
  ├───────────────────────────┤
  │  4. Testing               │  ← Pengujian
  ├───────────────────────────┤
  │  5. Deployment            │  ← Penerapan
  ├───────────────────────────┤
  │  6. Maintenance           │  ← Pemeliharaan
  └───────────────────────────┘

  Bersifat LINIER & SEKUENSIAL
```

**[NARASI]**
> *"Dari berbagai model SDLC yang ada, kami memilih **Model Waterfall** — atau model air terjun.*
>
> *Waterfall adalah model pengembangan yang bersifat **linier dan sekuensial**, artinya setiap tahap dikerjakan secara berurutan dan harus diselesaikan sepenuhnya sebelum dapat lanjut ke tahap berikutnya — seperti air yang mengalir ke bawah dan tidak bisa kembali ke atas.*
>
> *Model ini memiliki enam tahap utama: Analisis Kebutuhan, Perancangan Sistem, Implementasi atau pengkodean, Pengujian, Penerapan, dan Pemeliharaan."*

---

### Slide 3.3 — Alasan Pemilihan Waterfall

**[SLIDE]**
```
✅  MENGAPA WATERFALL?

  1. 📌  Kebutuhan sudah jelas sejak awal
         (hasil observasi & wawancara di sekolah)

  2. 📏  Scope proyek tetap dan terukur
         (fitur sudah terdefinisi, tidak berubah)

  3. 📝  Dokumentasi terstruktur & menyeluruh
         (penting untuk laporan kerja praktik)

  4. ⏱️  Timeline pengerjaan yang dapat diprediksi
         (sesuai jadwal kerja praktik)
```

**[NARASI]**
> *"Ada beberapa alasan mengapa kami memilih Waterfall untuk proyek ini.*
>
> *Pertama, kebutuhan sistem sudah kami kenali dengan baik sejak awal melalui observasi dan wawancara — tidak ada ambiguitas besar yang perlu diselesaikan di tengah jalan. Kedua, scope proyek bersifat tetap — fitur-fitur yang dibutuhkan sudah terdefinisi dengan jelas. Ketiga, Waterfall menghasilkan dokumentasi yang terstruktur dan menyeluruh di setiap tahapnya, yang sangat penting untuk laporan kerja praktik. Dan keempat, model ini memberikan timeline pengerjaan yang dapat diprediksi, sesuai dengan batasan waktu kerja praktik kami."*

---

---

## SEGMEN 4 — ANALISIS KEBUTUHAN
**Durasi:** ~2,5 menit | **Visual:** Tabel kebutuhan, diagram aktor

---

### Slide 4.1 — Aktor Sistem

**[SLIDE]**
```
👥  AKTOR DALAM SISTEM PPDB

  ┌─────────────────────────────────────────┐
  │                                         │
  │   👨‍👩‍👦  Orang Tua / Wali                   │
  │   Mendaftar, mengisi formulir,           │
  │   memantau status pendaftaran           │
  │                                         │
  │   👩‍💼  Admin / Tim Verifikator             │
  │   Mengelola data, memverifikasi,         │
  │   mengubah status, export data          │
  │                                         │
  └─────────────────────────────────────────┘
```

**[NARASI]**
> *"Dalam tahap Analisis Kebutuhan, langkah pertama adalah mengidentifikasi siapa saja yang akan berinteraksi dengan sistem — yang dalam UML disebut sebagai **aktor**.*
>
> *Sistem PPDB ini memiliki dua aktor utama.*
>
> *Pertama, **Orang Tua atau Wali** — mereka adalah pengguna yang melakukan pendaftaran secara online, mengisi formulir digital, dan memantau perkembangan status pendaftaran anaknya.*
>
> *Kedua, **Admin atau Tim Verifikator Sekolah** — mereka adalah staf internal sekolah yang bertugas mengelola data pendaftar, melakukan verifikasi, mengubah status, dan mengekspor rekap data."*

---

### Slide 4.2 — Kebutuhan Fungsional: Orang Tua

**[SLIDE]**
```
📋  KEBUTUHAN FUNGSIONAL — ORANG TUA / WALI

  KF-01  Registrasi akun (email, WhatsApp, password)
  KF-02  Login dengan email atau nomor WhatsApp
  KF-03  Mengisi biodata calon siswa
           → Nama, NISN, TTL, jenis kelamin, agama,
             alamat, asal sekolah, jenjang
  KF-04  Mengisi biodata ayah kandung
           → NIK, pekerjaan, penghasilan, no. HP
  KF-05  Mengisi biodata ibu kandung
  KF-06  Mengisi biodata wali (opsional)
  KF-07  Submit formulir pendaftaran online
  KF-08  Memantau status pendaftaran secara real-time
```

**[NARASI]**
> *"Berikut adalah Kebutuhan Fungsional sistem untuk aktor Orang Tua atau Wali.*
>
> *KF-01: Sistem harus menyediakan fitur registrasi akun menggunakan email aktif, nomor WhatsApp, dan password.*
>
> *KF-02: Pengguna dapat login menggunakan email atau nomor WhatsApp.*
>
> *KF-03 hingga KF-06 berkaitan dengan pengisian formulir — mencakup biodata lengkap calon siswa, data ayah kandung, ibu kandung, dan jika diperlukan, data wali.*
>
> *KF-07: Setelah semua data terisi, pengguna dapat mengirimkan formulir secara online. Sistem akan otomatis membuat nomor pendaftaran dan mengubah status menjadi 'Menunggu Penyerahan Berkas'.*
>
> *Dan KF-08: Orang tua dapat memantau perubahan status pendaftaran secara real-time melalui akun mereka."*

---

### Slide 4.3 — Kebutuhan Fungsional: Admin

**[SLIDE]**
```
📋  KEBUTUHAN FUNGSIONAL — ADMIN / VERIFIKATOR

  KF-09  Dashboard daftar semua pendaftar
  KF-10  Cetak formulir pendaftaran
           → Print-friendly, siap dicocokkan berkas fisik
  KF-11  Ubah status pendaftaran:
           ✅ Terverifikasi
           ❌ Ditolak (dengan alasan)
  KF-12  Export data ke format CSV
           → Rekap siap dibuka di Microsoft Excel
```

**[NARASI]**
> *"Untuk aktor Admin, sistem memerlukan empat kebutuhan fungsional tambahan.*
>
> *KF-09: Admin memiliki akses ke dashboard yang menampilkan seluruh daftar pendaftar beserta statusnya masing-masing.*
>
> *KF-10: Admin dapat mencetak formulir dalam format yang siap cetak, untuk kemudian dicocokkan dengan berkas fisik yang dibawa orang tua.*
>
> *KF-11: Setelah berkas sesuai dan pembayaran administrasi selesai, admin dapat mengubah status pendaftaran menjadi 'Terverifikasi'. Jika ada ketidaksesuaian, admin dapat menolak dengan menyertakan alasan penolakan.*
>
> *KF-12: Seluruh data pendaftar dapat diunduh dalam format CSV, yang langsung dapat dibuka dan diolah menggunakan Microsoft Excel untuk keperluan pelaporan sekolah."*

---

### Slide 4.4 — Kebutuhan Non-Fungsional

**[SLIDE]**
```
⚙️  KEBUTUHAN NON-FUNGSIONAL

  🔒  Keamanan       — Autentikasi berbasis sesi, 
                        password terenkripsi
  📱  Responsivitas  — Dapat diakses dari HP maupun laptop
  ⚡  Performa       — Halaman termuat dalam < 3 detik
  🧭  Kemudahan      — Antarmuka intuitif, mudah tanpa pelatihan
  🔄  Ketersediaan   — Sistem dapat diakses kapan saja
  📦  Skalabilitas   — Mampu menangani ratusan pendaftar
```

**[NARASI]**
> *"Selain kebutuhan fungsional, terdapat juga Kebutuhan Non-Fungsional — yaitu standar kualitas yang harus dipenuhi sistem, terlepas dari fitur-fiturnya.*
>
> *Dari sisi keamanan, sistem menggunakan autentikasi berbasis sesi dan enkripsi password. Dari sisi responsivitas, antarmuka harus dapat diakses dengan nyaman dari perangkat apapun — baik smartphone maupun laptop. Sistem juga harus memiliki performa yang baik, mudah digunakan tanpa pelatihan khusus, tersedia kapan saja dibutuhkan, dan mampu menangani volume pendaftar yang banyak dalam satu periode PPDB."*

---

### Slide 4.5 — Alur Status Pendaftaran

**[SLIDE]**
```
🔄  STATUS PENDAFTARAN

  📝 Belum Submit
      ↓ (setelah submit formulir online)
  ⏳ Menunggu Penyerahan Berkas
      ↓ (setelah verifikasi berkas & pembayaran)
  ✅ Terverifikasi          ❌ Ditolak
                                (+ alasan penolakan)
```

**[NARASI]**
> *"Sistem mendefinisikan empat kondisi status pendaftaran yang mencerminkan alur proses secara keseluruhan.*
>
> *Status dimulai dari 'Belum Submit' ketika orang tua sudah membuat akun dan mengisi formulir namun belum mengirimkannya. Setelah formulir disubmit, status berubah menjadi 'Menunggu Penyerahan Berkas' — yang berarti orang tua perlu datang ke sekolah membawa dokumen fisik. Setelah admin memverifikasi berkas dan pembayaran selesai, status berubah menjadi 'Terverifikasi'. Namun jika ada ketidaksesuaian, admin dapat mengubah status menjadi 'Ditolak' disertai dengan alasan yang jelas."*

---

---

## SEGMEN 5 — PERANCANGAN SISTEM
**Durasi:** ~2 menit | **Visual:** Diagram arsitektur, skema database

---

### Slide 5.1 — Arsitektur Sistem

**[SLIDE]**
```
🏗️  ARSITEKTUR SISTEM

  [Pengguna / Browser]
        ↕ HTTP/HTTPS
  [Web Server — Aplikasi PHP/Framework]
        ↕ Query SQL
  [Database Server — MySQL/MariaDB]

  🔐 Semua komunikasi diamankan oleh sesi autentikasi
```

**[NARASI]**
> *"Pada tahap Perancangan Sistem, kami menetapkan arsitektur teknologi yang akan digunakan.*
>
> *Sistem menggunakan arsitektur **client-server berbasis web**. Pengguna — baik orang tua maupun admin — mengakses sistem melalui browser di perangkat masing-masing. Request dikirimkan melalui protokol HTTP atau HTTPS ke web server yang menjalankan logika aplikasi. Web server kemudian berkomunikasi dengan database server untuk menyimpan dan mengambil data.*
>
> *Setiap permintaan yang membutuhkan akses data dilindungi oleh mekanisme autentikasi sesi, memastikan hanya pengguna yang sudah login yang dapat mengakses fitur-fitur sistem."*

---

### Slide 5.2 — Struktur Database

**[SLIDE]**
```
🗃️  STRUKTUR DATABASE

  ┌──────────────┐     ┌──────────────────┐
  │    USERS     │────▶│    STUDENTS      │
  │  (akun login)│     │  (biodata siswa) │
  └──────────────┘     └────────┬─────────┘
                                │
                       ┌────────▼─────────┐
                       │   PENDAFTARAN    │
                       │  (proses PPDB)   │
                       │  nomor: PPDB-    │
                       │  2026-00001      │
                       └──┬───┬───┬───────┘
                          │   │   │
              ┌───────────┘   │   └──────────────┐
              ▼               ▼                  ▼
           ┌──────┐       ┌──────┐           ┌──────┐
           │ AYAH │       │  IBU │           │ WALI │
           └──────┘       └──────┘           └──────┘
                                          (opsional)
```

**[NARASI]**
> *"Untuk struktur database, kami merancang lima tabel utama yang saling berrelasi.*
>
> *Tabel **users** menyimpan kredensial login pengguna. Tabel **students** menyimpan biodata lengkap calon siswa. Tabel **pendaftaran** adalah tabel inti yang mencatat proses PPDB — termasuk nomor pendaftaran yang digenerate otomatis dengan format PPDB-tahun-urutan, status, dan timestamp penting. Dan tiga tabel terakhir — **ayah**, **ibu**, dan **wali** — masing-masing menyimpan biodata orang tua dan wali yang terhubung ke data pendaftaran.*
>
> *Relasi antar tabel dirancang menggunakan foreign key untuk menjaga integritas data dan memudahkan query lintas tabel."*

---

### Slide 5.3 — Rancangan Antarmuka (Overview)

**[SLIDE]**
```
🖥️  HALAMAN UTAMA SISTEM

  ORANG TUA / WALI          ADMIN
  ─────────────────         ──────────────────
  • Halaman Registrasi      • Dashboard Pendaftar
  • Halaman Login           • Detail & Cetak Formulir
  • Formulir Siswa          • Manajemen Status
  • Formulir Orang Tua      • Export CSV
  • Halaman Status          • Laporan Rekap
  • Konfirmasi Submit
```

**[NARASI]**
> *"Dari sisi antarmuka, kami merancang halaman-halaman yang terbagi berdasarkan peran pengguna.*
>
> *Untuk Orang Tua atau Wali, tersedia halaman registrasi, login, formulir pengisian data siswa dan orang tua yang multi-step, halaman pemantauan status, dan halaman konfirmasi setelah submit berhasil.*
>
> *Untuk Admin, tersedia dashboard yang menampilkan rekap pendaftar secara keseluruhan, halaman detail yang bisa langsung dicetak, fitur manajemen status pendaftaran, dan fitur export data ke CSV."*

---

---

## SEGMEN 6 — PEMODELAN UML
**Durasi:** ~2,5 menit | **Visual:** Tampilkan diagram satu per satu

---

### Slide 6.1 — Pengenalan UML

**[SLIDE]**
```
🔷  UML — UNIFIED MODELING LANGUAGE

  Bahasa pemodelan visual standar industri
  untuk mendokumentasikan sistem perangkat lunak.

  Diagram yang kami gunakan:
  1. 📌  Use Case Diagram
  2. 🔄  Activity Diagram
  3. ↔️  Sequence Diagram
  4. 🗃️  Entity-Relationship Diagram (ERD)
  5. 🏗️  Class Diagram
```

**[NARASI]**
> *"Untuk mendokumentasikan perancangan sistem secara formal dan dapat dipahami oleh semua pemangku kepentingan, kami menggunakan **UML — Unified Modeling Language** — sebuah standar pemodelan visual yang diakui secara internasional dalam industri rekayasa perangkat lunak.*
>
> *Kami menggunakan lima jenis diagram UML dalam proyek ini, masing-masing memiliki fungsi yang berbeda namun saling melengkapi satu sama lain."*

---

### Slide 6.2 — Use Case Diagram

**[SLIDE]**
```
📌  USE CASE DIAGRAM

  Menggambarkan:
  → Siapa yang menggunakan sistem (aktor)
  → Apa yang dapat dilakukan oleh setiap aktor
  → Batasan sistem (system boundary)

  [Tampilkan Use Case Diagram]
```

**[NARASI]**
> *"Diagram pertama adalah **Use Case Diagram**. Diagram ini menjawab pertanyaan mendasar: siapa yang menggunakan sistem, dan apa yang bisa mereka lakukan?*
>
> *Dari diagram ini, kita dapat melihat dengan jelas bahwa aktor Orang Tua atau Wali memiliki akses ke fungsi-fungsi pendaftaran — mulai dari registrasi, login, pengisian formulir, submit, hingga pemantauan status. Sedangkan aktor Admin memiliki akses ke fungsi pengelolaan data — dashboard, cetak formulir, ubah status, dan export CSV.*
>
> *Garis yang menghubungkan aktor dengan use case menunjukkan bahwa aktor tersebut memiliki kepentingan atau berinteraksi dengan fungsi tersebut."*

---

### Slide 6.3 — Activity Diagram

**[SLIDE]**
```
🔄  ACTIVITY DIAGRAM

  Menggambarkan:
  → Alur aktivitas dari awal hingga akhir proses
  → Titik-titik keputusan (decision point)
  → Aktivitas yang dilakukan online vs. offline

  [Tampilkan Activity Diagram]
```

**[NARASI]**
> *"Diagram kedua adalah **Activity Diagram** — yang menggambarkan alur aktivitas secara keseluruhan dalam proses PPDB.*
>
> *Diagram ini menampilkan perjalanan lengkap dari sisi pengguna: mulai dari orang tua membuka website, melakukan registrasi atau login, mengisi formulir secara bertahap, hingga submit. Kemudian alur berlanjut ke proses offline di sekolah — orang tua datang menyerahkan berkas, admin memverifikasi, dan status diperbarui.*
>
> *Diagram ini sangat berguna untuk memastikan bahwa tidak ada langkah yang terlewat dalam alur sistem, dan semua titik keputusan sudah dipertimbangkan dengan baik."*

---

### Slide 6.4 — Sequence Diagram

**[SLIDE]**
```
↔️  SEQUENCE DIAGRAM

  Menggambarkan:
  → Urutan interaksi antar komponen sistem
  → Siapa yang mengirim pesan kepada siapa
  → Kapan dan dalam urutan apa interaksi terjadi

  Contoh: Proses Submit Formulir Online

  [Tampilkan Sequence Diagram]
```

**[NARASI]**
> *"Diagram ketiga adalah **Sequence Diagram** — yang fokus pada urutan interaksi antar komponen sistem dalam satu skenario tertentu.*
>
> *Sebagai contoh, kami memodelkan skenario proses submit formulir. Diagram menunjukkan bahwa ketika orang tua menekan tombol submit di browser, browser mengirimkan request ke web server. Web server memvalidasi data, kemudian menyimpan data ke database, menggenerate nomor pendaftaran, memperbarui status, dan mengembalikan konfirmasi ke browser yang kemudian ditampilkan kepada pengguna.*
>
> *Diagram ini sangat penting bagi pengembang karena mendefinisikan secara presisi bagaimana setiap komponen harus berinteraksi satu sama lain."*

---

### Slide 6.5 — ERD

**[SLIDE]**
```
🗃️  ENTITY-RELATIONSHIP DIAGRAM (ERD)

  Menggambarkan:
  → Entitas data dalam sistem
  → Atribut dari setiap entitas
  → Relasi dan kardinalitas antar entitas

  [Tampilkan ERD]
```

**[NARASI]**
> *"Diagram keempat adalah **Entity-Relationship Diagram atau ERD** — yang memodelkan struktur data dan hubungan antar entitas di dalam database.*
>
> *Dari ERD ini, kita dapat melihat bahwa satu akun pengguna memiliki tepat satu data siswa. Satu siswa memiliki satu data pendaftaran. Satu pendaftaran memiliki satu data ayah, satu data ibu, dan secara opsional satu data wali.*
>
> *Kardinalitas atau jenis relasi ini sangat penting dalam perancangan database, karena menentukan bagaimana tabel-tabel saling terhubung melalui foreign key, yang pada akhirnya menjamin integritas dan konsistensi data dalam sistem."*

---

---

## SEGMEN 7 — DEMO APLIKASI (OPSIONAL)
**Durasi:** ~2 menit | **Visual:** Screen recording

---

### Slide 7.1 — Intro Demo

**[SLIDE]**
```
🖥️  DEMO SISTEM PPDB ONLINE

  Alur yang akan ditunjukkan:

  SISI ORANG TUA:
  Registrasi → Login → Isi Formulir
  → Submit → Lihat Status

  SISI ADMIN:
  Dashboard → Detail Pendaftar
  → Cetak Formulir → Ubah Status → Export CSV
```

**[NARASI]**
> *"Berikut ini adalah demonstrasi langsung dari sistem PPDB Online yang telah kami bangun. Kita akan melihat sistem dari dua perspektif — sisi Orang Tua dan sisi Admin."*

---

### Slide 7.2 — Demo Sisi Orang Tua

**[SLIDE — Screen Recording]**
> Tampilkan: Halaman registrasi → login → form siswa → form ayah → form ibu → submit → halaman konfirmasi dengan nomor pendaftaran

**[NARASI]**
> *"Dari sisi Orang Tua, prosesnya dimulai dari halaman registrasi. Mereka mengisi email, nomor WhatsApp, dan membuat password. Setelah registrasi berhasil, mereka login dan diarahkan ke formulir pendaftaran.*
>
> *Formulir dibagi menjadi beberapa bagian — biodata calon siswa, data ayah, data ibu, dan opsional data wali. Setiap bagian harus diisi dengan lengkap sebelum dapat lanjut ke bagian berikutnya.*
>
> *Setelah semua data terisi, orang tua menekan tombol Submit. Sistem akan langsung menerbitkan nomor pendaftaran secara otomatis dengan format PPDB-2026-00001, dan status berubah menjadi 'Menunggu Penyerahan Berkas'. Orang tua kini perlu datang ke sekolah membawa berkas fisik yang dipersyaratkan."*

---

### Slide 7.3 — Demo Sisi Admin

**[SLIDE — Screen Recording]**
> Tampilkan: Dashboard admin → detail pendaftar → cetak formulir → ubah status → export CSV

**[NARASI]**
> *"Beralih ke sisi Admin. Di dashboard, admin dapat melihat seluruh daftar pendaftar — siapa yang sudah submit, status masing-masing, dan tanggal pendaftaran.*
>
> *Admin dapat membuka detail pendaftar tertentu, lalu mencetak formulir dalam tampilan yang siap cetak untuk dicocokkan dengan berkas fisik yang dibawa orang tua.*
>
> *Setelah verifikasi berkas selesai dan pembayaran administrasi diterima, admin cukup klik 'Terverifikasi' — dan status di sistem langsung diperbarui, yang juga dapat dilihat oleh orang tua secara real-time.*
>
> *Terakhir, admin dapat mengunduh seluruh data pendaftar dalam format CSV dengan satu klik — siap dibuka dan diolah lebih lanjut di Microsoft Excel untuk keperluan pelaporan sekolah."*

---

---

## SEGMEN 8 — PENUTUP
**Durasi:** ~1 menit | **Musik:** Fade in instrumental, volume naik

---

### Slide 8.1 — Kesimpulan

**[SLIDE]**
```
✅  KESIMPULAN

  Sistem PPDB Online Berbasis Web berhasil:

  🎯  Mendigitalisasi proses pendaftaran siswa baru
  🎯  Menghilangkan proses input ulang dari formulir ke Excel
  🎯  Meminimalkan risiko kesalahan & data tertinggal
  🎯  Mempercepat rekap & pelaporan data
  🎯  Memberikan transparansi status bagi orang tua
```

**[NARASI]**
> *"Sebagai kesimpulan, melalui proyek kerja praktik ini kami telah berhasil merancang dan mengimplementasikan Sistem PPDB Online Berbasis Web yang secara langsung menjawab permasalahan yang kami temukan di Sekolah Bhinneka.*
>
> *Sistem ini mendigitalisasi seluruh proses pendaftaran siswa baru — menghilangkan kebutuhan input ulang dari formulir kertas ke Excel, yang selama ini menjadi sumber utama potensi kesalahan data. Proses rekap dan pelaporan yang sebelumnya memakan waktu kini dapat diselesaikan dalam hitungan detik. Dan orang tua dapat memantau status pendaftaran anaknya kapan saja dan dari mana saja."*

---

### Slide 8.2 — Ucapan Terima Kasih

**[SLIDE]**
```
🙏  TERIMA KASIH

  Kepada:
  🏫  Sekolah Bhinneka — Mitra Kerja Praktik
  🎓  [Nama Dosen] — Dosen Pembimbing
  👥  Seluruh Pihak yang Telah Mendukung

  ─────────────────────────────
  Kerja Praktik — [Nama Institusi]
  [Tahun Akademik]
```

**[NARASI]**
> *"Kami mengucapkan terima kasih yang sebesar-besarnya kepada Sekolah Bhinneka yang telah membuka pintu dan mempercayakan kami untuk berkontribusi dalam meningkatkan sistem administrasi mereka.*
>
> *Terima kasih kepada dosen pembimbing kami atas arahan dan bimbingan yang diberikan sepanjang proses kerja praktik ini. Dan terima kasih kepada semua pihak yang telah mendukung terwujudnya proyek ini.*
>
> *Kami berharap sistem ini dapat memberikan manfaat nyata dan berkelanjutan bagi Sekolah Bhinneka. Terima kasih telah menyaksikan presentasi ini."*

---

> [!TIP]
> **Tips Slide:** Gunakan transisi "Fade" antar slide agar terkesan profesional. Animasi bullet point bisa menggunakan "Appear" satu per satu agar narasi dan visual selaras.

> [!NOTE]
> **Tips Narasi:** Baca dengan tempo sedang — tidak terlalu cepat. Jeda sebentar setelah setiap poin penting untuk memberi penonton waktu memproses informasi.

---

*Dokumen ini dibuat untuk keperluan Laporan Kerja Praktik — Sistem PPDB Sekolah Bhinneka*
