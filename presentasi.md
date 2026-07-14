# 🎬 Skema & Narasi Video: Sistem PPDB Online Sekolah Bhinneka

> **Judul Laporan:** Perancangan dan Implementasi Sistem Penerimaan Peserta Didik Baru (PPDB) Online Berbasis Web Menggunakan Metode Waterfall pada Sekolah Bhinneka

---

## 📋 GAMBARAN UMUM VIDEO

| Elemen | Detail |
|--------|--------|
| **Durasi Estimasi** | 10–15 menit |
| **Gaya Penyajian** | Presentasi naratif + visual diagram/demo |
| **Bahasa** | Indonesia |
| **Target Penonton** | Dosen penguji, sivitas akademik, mitra sekolah |

---

## 🗂️ STRUKTUR SEGMEN VIDEO

```
[INTRO] → [LATAR BELAKANG] → [SDLC WATERFALL] → [ANALISIS KEBUTUHAN]
       → [PERANCANGAN SISTEM] → [UML] → [DEMO APLIKASI] → [PENUTUP]
```

---

## 🎞️ SEGMEN 1 — INTRO & IDENTITAS PROYEK
**Durasi:** ~1 menit

### 🎨 Visual
- Animasi judul proyek muncul di layar
- Logo sekolah Bhinneka & logo institusi
- Nama anggota tim

### 🎙️ Narasi
> *"Selamat datang. Video ini menyajikan laporan kerja praktik kami dengan judul:*
>
> ***"Perancangan dan Implementasi Sistem Penerimaan Peserta Didik Baru (PPDB) Online Berbasis Web Menggunakan Metode Waterfall pada Sekolah Bhinneka."***
>
> *Proyek ini merupakan hasil kolaborasi kami bersama Sekolah Bhinneka sebagai mitra kerja praktik, dengan tujuan menghadirkan solusi digital nyata atas permasalahan yang kami temukan langsung di lapangan."*

---

## 🎞️ SEGMEN 2 — LATAR BELAKANG & STUDI KASUS
**Durasi:** ~2 menit

### 🎨 Visual
- Ilustrasi formulir kertas bertumpuk
- Animasi alur: Formulir → Input Manual → Excel
- Tanda bahaya/ikon error di proses manual
- Foto atau ilustrasi suasana sekolah

### 🎙️ Narasi
> *"Melalui proses wawancara dan observasi langsung di Sekolah Bhinneka, kami menemukan sebuah tantangan nyata dalam proses Penerimaan Peserta Didik Baru atau PPDB.*
>
> *Saat itu, seluruh proses pendaftaran masih dilakukan secara konvensional — orang tua mengisi formulir pendaftaran secara fisik, kemudian staf administrasi sekolah menginput ulang data tersebut satu per satu ke dalam Microsoft Excel.*
>
> *Proses ini menghadirkan beberapa risiko yang signifikan: kesalahan penulisan atau typo saat input ulang, data yang tertinggal atau tidak terekam, sulitnya melakukan rekap dan pelaporan yang cepat, serta beban kerja administratif yang meningkat setiap tahun ajaran baru.*
>
> *Dari permasalahan inilah lahir gagasan kami: membangun sebuah **Sistem PPDB Online berbasis Web** yang memungkinkan orang tua mendaftar secara digital, dan pihak sekolah mengelola seluruh data pendaftaran dalam satu platform terintegrasi."*

---

## 🎞️ SEGMEN 3 — SDLC: METODE WATERFALL
**Durasi:** ~2 menit

### 🎨 Visual
- Diagram Waterfall bertahap (bisa animasi mengalir ke bawah):
  ```
  ┌─────────────────────────┐
  │  1. Requirements        │ ← Analisis Kebutuhan
  ├─────────────────────────┤
  │  2. System Design       │ ← Perancangan Sistem
  ├─────────────────────────┤
  │  3. Implementation      │ ← Pengkodean
  ├─────────────────────────┤
  │  4. Testing             │ ← Pengujian
  ├─────────────────────────┤
  │  5. Deployment          │ ← Penerapan
  ├─────────────────────────┤
  │  6. Maintenance         │ ← Pemeliharaan
  └─────────────────────────┘
  ```
- Highlight setiap tahap yang sedang dibahas

### 🎙️ Narasi
> *"Dalam pengembangan sistem ini, kami menggunakan **Model Pengembangan Perangkat Lunak Waterfall** atau yang juga disebut model air terjun.*
>
> *Waterfall adalah metode SDLC — Software Development Life Cycle — yang bersifat **linier dan sekuensial**, artinya setiap tahap harus diselesaikan secara penuh sebelum dapat melanjutkan ke tahap berikutnya.*
>
> *Mengapa kami memilih Waterfall? Karena kebutuhan sistem PPDB ini sudah kami ketahui dengan jelas sejak awal melalui observasi dan wawancara. Scope proyek bersifat tetap dan terukur, sehingga metode ini sangat cocok untuk memastikan dokumentasi dan pengerjaan berjalan sistematis dan terstruktur.*
>
> *Terdapat enam tahap utama dalam metode Waterfall yang kami terapkan:*
> *Pertama, **Analisis Kebutuhan** — mendefinisikan seluruh kebutuhan sistem.*
> *Kedua, **Perancangan Sistem** — merancang arsitektur dan antarmuka.*
> *Ketiga, **Implementasi** — proses pengkodean aplikasi.*
> *Keempat, **Pengujian** — memastikan sistem berjalan sesuai kebutuhan.*
> *Kelima, **Penerapan** — men-deploy sistem ke lingkungan nyata.*
> *Dan keenam, **Pemeliharaan** — memantau dan memperbaiki sistem pasca-peluncuran."*

---

## 🎞️ SEGMEN 4 — ANALISIS KEBUTUHAN
**Durasi:** ~2,5 menit

### 🎨 Visual
- Tabel kebutuhan fungsional dan non-fungsional
- Diagram aktor sistem (Orang Tua/Wali ↔ Sistem ↔ Admin)
- Daftar fitur yang dipetakan ke aktor

### 🎙️ Narasi
> *"Tahap pertama dalam metode Waterfall adalah **Analisis Kebutuhan**. Pada tahap ini, kami mengidentifikasi seluruh kebutuhan sistem berdasarkan data yang kami kumpulkan melalui wawancara dan observasi di Sekolah Bhinneka.*
>
> *Sistem PPDB ini melibatkan dua aktor utama:*
> - ***Orang Tua / Wali***, sebagai pengguna yang mendaftar secara online.*
> - ***Admin / Tim Verifikator Sekolah***, yang mengelola dan memvalidasi data.*
>
> *Berikut adalah **Kebutuhan Fungsional** sistem:*
>
> *Untuk **Orang Tua/Wali**, sistem harus menyediakan:*
> - *Registrasi akun menggunakan email aktif, nomor WhatsApp, dan password.*
> - *Login menggunakan email atau nomor WhatsApp.*
> - *Pengisian biodata calon siswa secara lengkap.*
> - *Pengisian biodata orang tua — ayah, ibu, dan wali jika ada.*
> - *Fitur submit formulir pendaftaran online.*
> - *Pemantauan status pendaftaran secara real-time.*
>
> *Untuk **Admin Sekolah**, sistem harus menyediakan:*
> - *Dashboard untuk memantau daftar pendaftar.*
> - *Fitur cetak formulir pendaftaran.*
> - *Fitur mengubah status pendaftaran: mulai dari 'Menunggu Penyerahan Berkas', 'Terverifikasi', hingga 'Ditolak' beserta alasannya.*
> - *Fitur ekspor data ke format CSV yang dapat dibuka di Excel.*
>
> *Sedangkan **Kebutuhan Non-Fungsional** mencakup aspek seperti: keamanan autentikasi, kemudahan penggunaan antarmuka, kecepatan respon sistem, serta kompatibilitas di berbagai perangkat (responsif).*
>
> *Sistem juga mendukung **alur kerja** yang jelas: pendaftaran online → penyerahan berkas fisik di sekolah → verifikasi oleh admin → perubahan status oleh admin."*

---

## 🎞️ SEGMEN 5 — PERANCANGAN SISTEM
**Durasi:** ~2 menit

### 🎨 Visual
- Diagram arsitektur sistem (Client → Web Server → Database)
- Rancangan struktur database (tabel: students, pendaftaran, ayah, ibu, wali)
- Wireframe atau mockup antarmuka halaman utama

### 🎙️ Narasi
> *"Setelah kebutuhan terdefinisi, kami masuk ke tahap **Perancangan Sistem**. Tahap ini menghasilkan cetak biru (blueprint) dari sistem yang akan dibangun.*
>
> *Dari sisi **arsitektur**, sistem menggunakan model client-server berbasis web, di mana pengguna mengakses aplikasi melalui browser, request diproses oleh web server, dan data disimpan dalam database relasional.*
>
> *Dari sisi **database**, kami merancang struktur tabel yang mencerminkan kebutuhan data:*
> - *Tabel `students` — menyimpan biodata calon siswa.*
> - *Tabel `pendaftaran` — mencatat proses PPDB: nomor pendaftaran dengan format `PPDB-{tahun}-{urutan}`, status, dan informasi submit.*
> - *Tabel `ayah` — data ayah kandung (satu data per pendaftaran).*
> - *Tabel `ibu` — data ibu kandung (satu data per pendaftaran).*
> - *Tabel `wali` — data wali opsional, jika relevan.*
>
> *Dari sisi **antarmuka**, kami merancang tampilan yang intuitif dan mudah digunakan, baik untuk orang tua yang mengisi formulir, maupun admin yang mengelola data.*
>
> *Setiap keputusan desain didasarkan pada prinsip kemudahan penggunaan dan kesesuaian dengan alur kerja aktual di sekolah."*

---

## 🎞️ SEGMEN 6 — PEMODELAN UML
**Durasi:** ~2,5 menit

### 🎨 Visual
- **Use Case Diagram** — tampilkan hubungan aktor dan use case
- **Activity Diagram** — alur pendaftaran dari awal hingga selesai
- **Sequence Diagram** — interaksi submit formulir (opsional)
- **ERD / Class Diagram** — relasi antar tabel database

### 🎙️ Narasi
> *"Untuk mendokumentasikan perancangan sistem secara visual dan standar, kami menggunakan **UML — Unified Modeling Language**. UML adalah bahasa pemodelan standar industri yang membantu tim dan stakeholder memahami struktur dan perilaku sistem.*
>
> *Diagram pertama adalah **Use Case Diagram**. Diagram ini menggambarkan interaksi antara aktor — yaitu Orang Tua/Wali dan Admin — dengan fungsi-fungsi utama sistem. Dari diagram ini terlihat jelas siapa yang dapat melakukan apa di dalam sistem.*
>
> *Diagram kedua adalah **Activity Diagram**. Diagram ini menggambarkan alur aktivitas dalam proses pendaftaran, mulai dari orang tua membuat akun, mengisi formulir, melakukan submit, kemudian admin menerima data, melakukan verifikasi, hingga mengubah status pendaftaran.*
>
> *Diagram ketiga adalah **Sequence Diagram**, yang menunjukkan urutan interaksi antar komponen sistem saat sebuah proses berlangsung, misalnya proses submit formulir online.*
>
> *Dan terakhir, **Entity-Relationship Diagram atau ERD**, yang memodelkan struktur dan hubungan antar data dalam database — mulai dari relasi antara data pendaftar, data siswa, hingga data orang tua.*
>
> *Keempat diagram UML ini menjadi fondasi komunikasi teknis antara anggota tim pengembang dan juga dokumentasi resmi dalam laporan kerja praktik kami."*

---

## 🎞️ SEGMEN 7 — DEMO APLIKASI (OPSIONAL)
**Durasi:** ~2 menit

### 🎨 Visual
- Screen recording aplikasi PPDB
- Tunjukkan alur: Registrasi → Login → Isi Formulir → Submit → Pantau Status
- Tunjukkan sisi admin: Dashboard → Verifikasi → Ubah Status → Export CSV

### 🎙️ Narasi
> *"Berikut adalah tampilan dari sistem PPDB Online yang telah kami bangun.*
>
> *Sebagai **Orang Tua/Wali**, proses dimulai dari halaman registrasi di mana mereka membuat akun dengan email, nomor WhatsApp, dan password. Setelah login, mereka diarahkan untuk mengisi biodata calon siswa dan data orang tua secara lengkap. Setelah semua data terisi, formulir dapat disubmit — dan status pendaftaran langsung berubah menjadi **'Menunggu Penyerahan Berkas'**.*
>
> *Orang tua kemudian datang ke sekolah untuk menyerahkan berkas fisik seperti akta kelahiran, kartu keluarga, KTP, dan dokumen lainnya.*
>
> *Di sisi **Admin**, terdapat dashboard yang menampilkan seluruh daftar pendaftar. Admin dapat mencetak formulir untuk dicocokkan dengan berkas fisik yang dibawa. Setelah verifikasi selesai dan pembayaran administrasi dilakukan, admin mengubah status menjadi **'Terverifikasi'**. Seluruh data juga dapat diunduh dalam format CSV untuk keperluan rekap.*
>
> *Dengan sistem ini, risiko kesalahan input dan data yang tertinggal dapat diminimalkan secara signifikan."*

---

## 🎞️ SEGMEN 8 — PENUTUP
**Durasi:** ~1 menit

### 🎨 Visual
- Ringkasan poin-poin utama dalam slide
- Tampilan akhir: judul proyek + nama tim
- Ucapan terima kasih

### 🎙️ Narasi
> *"Sebagai kesimpulan, proyek kerja praktik ini telah menghasilkan sebuah **Sistem PPDB Online Berbasis Web** yang dirancang khusus untuk menjawab kebutuhan nyata Sekolah Bhinneka.*
>
> *Menggunakan **metode Waterfall** sebagai kerangka pengembangan, kami menjalani setiap tahap secara terstruktur — dari analisis kebutuhan, perancangan sistem dengan diagram UML, implementasi kode, hingga pengujian.*
>
> *Sistem ini diharapkan dapat:**
> - *Mengurangi beban administrasi tim sekolah.*
> - *Meminimalkan kesalahan input data.*
> - *Mempercepat proses rekap dan pelaporan data PPDB.*
>
> *Kami berterima kasih kepada Sekolah Bhinneka yang telah menjadi mitra dalam perjalanan kerja praktik ini, serta kepada dosen pembimbing dan semua pihak yang telah mendukung terwujudnya sistem ini.*
>
> *Terima kasih telah menyaksikan presentasi ini."*

---

## 🗓️ TIMELINE PRODUKSI VIDEO (SARAN)

| Hari | Aktivitas |
|------|-----------|
| Hari 1 | Buat slide/visual untuk setiap segmen (Canva, PowerPoint, atau After Effects) |
| Hari 2 | Rekam narasi (voiceover) sesuai skrip |
| Hari 3 | Rekam demo aplikasi (screen recording) |
| Hari 4 | Edit video: gabungkan visual + narasi + musik latar |
| Hari 5 | Review, revisi, dan finalisasi |

---

## 📌 TIPS PRODUKSI

> [!TIP]
> - Gunakan **musik latar instrumental** yang ringan dan profesional (royalty-free)
> - Animasikan diagram UML dan Waterfall agar lebih menarik (tidak statis)
> - Gunakan **transisi smooth** antar segmen
> - Pastikan narasi jelas, tempo tidak terlalu cepat
> - Tambahkan **lower-third** (teks kecil di bawah) untuk memperjelas poin penting

> [!NOTE]
> Segmen Demo Aplikasi (Segmen 7) bersifat opsional — bisa ditambahkan jika video ditujukan sebagai presentasi teknis lengkap, atau dilewati jika hanya untuk presentasi konseptual.

---

*Dokumen ini dibuat untuk keperluan Laporan Kerja Praktik — Sistem PPDB Sekolah Bhinneka*
