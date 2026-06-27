# 📊 Slide PowerPoint-Ready — PPDB Sekolah Bhinneka

> **Format:** Judul + Poin Bullet (maks. 5 poin per slide) + Speaker Notes
> **Total Slide:** 30 slide | **Estimasi Durasi:** 12–15 menit
> **Rekomendasi Font:** Poppins / Inter | **Color Accent:** Biru Tua `#1E3A5F` + Emas `#F5A623`

---

## ━━━ BAGIAN 1: INTRO ━━━

---

### 🎞️ SLIDE 1 — Cover / Judul Utama

**[JUDUL BESAR]**
> SISTEM PPDB ONLINE BERBASIS WEB

**[SUBJUDUL]**
> Perancangan dan Implementasi menggunakan Metode Waterfall
> pada Sekolah Bhinneka

**[BAWAH]**
> Laporan Kerja Praktik · [Nama Institusi] · [Tahun]

📝 **Speaker Notes:**
> *"Selamat datang. Video ini merupakan presentasi laporan kerja praktik kami mengenai perancangan dan implementasi Sistem PPDB Online berbasis web pada Sekolah Bhinneka."*

---

### 🎞️ SLIDE 2 — Identitas Tim

**[JUDUL]** Tim & Mitra

**[ISI]**
- 👥 **Tim Pengembang**
  - [Nama 1] — [NIM]
  - [Nama 2] — [NIM]
  - [Nama 3] — [NIM]
- 🎓 **Dosen Pembimbing:** [Nama Dosen]
- 🏫 **Mitra:** Sekolah Bhinneka

📝 **Speaker Notes:**
> *"Proyek ini dikerjakan oleh tim kami di bawah bimbingan [nama dosen], bersama Sekolah Bhinneka sebagai mitra kerja praktik."*

---

### 🎞️ SLIDE 3 — Agenda Presentasi

**[JUDUL]** Agenda

**[ISI]**
1. Latar Belakang & Studi Kasus
2. Metode Pengembangan (Waterfall)
3. Analisis Kebutuhan
4. Perancangan Sistem
5. Pemodelan UML
6. Demo Aplikasi
7. Kesimpulan

📝 **Speaker Notes:**
> *"Berikut adalah agenda presentasi kami. Kita akan mulai dari latar belakang masalah, kemudian membahas metode pengembangan, analisis kebutuhan, perancangan, diagram UML, dan diakhiri dengan demo aplikasi serta kesimpulan."*

---

## ━━━ BAGIAN 2: LATAR BELAKANG ━━━

---

### 🎞️ SLIDE 4 — Kondisi Awal Sekolah Bhinneka

**[JUDUL]** Kondisi yang Kami Temukan

**[ISI]**
- 📋 Formulir pendaftaran ditulis tangan oleh orang tua
- 🖥️ Staf admin menginput ulang data ke Microsoft Excel
- 🔁 Proses berlangsung setiap tahun ajaran baru
- 🔍 Berdasarkan: **wawancara & observasi langsung**

📝 **Speaker Notes:**
> *"Dari hasil wawancara dan observasi langsung di Sekolah Bhinneka, kami menemukan bahwa seluruh proses PPDB masih dilakukan secara manual — formulir fisik diisi, lalu diinput ulang ke Excel oleh staf administrasi."*

---

### 🎞️ SLIDE 5 — Identifikasi Masalah

**[JUDUL]** Masalah yang Dihadapi

**[ISI]**
- ✏️ **Rentan typo** saat proses input ulang data
- 📄 **Data tertinggal** — field tidak terinput secara lengkap
- 🕐 **Proses lambat** — bottleneck di bagian administrasi
- 📊 **Rekap sulit** — tidak ada sistem terintegrasi
- 🗂️ **Arsip manual** — data sulit ditelusuri kembali

📝 **Speaker Notes:**
> *"Proses double-entry ini menimbulkan beberapa risiko: kesalahan penulisan, data yang tertinggal, lambatnya proses, dan sulitnya melakukan rekap data yang cepat."*

---

### 🎞️ SLIDE 6 — Solusi yang Diusulkan

**[JUDUL]** Solusi: Sistem PPDB Online

**[ISI]**
- 🌐 Orang tua mendaftar langsung via website
- 🗃️ Data tersimpan otomatis ke database
- 👩‍💼 Admin kelola semua data dalam 1 platform
- 📊 Rekap & export data dalam hitungan detik
- 📱 Dapat diakses dari HP maupun laptop

📝 **Speaker Notes:**
> *"Solusi yang kami usulkan adalah platform PPDB Online berbasis web yang menghilangkan kebutuhan input ulang, sehingga risiko kesalahan dapat diminimalkan secara signifikan."*

---

## ━━━ BAGIAN 3: METODE WATERFALL ━━━

---

### 🎞️ SLIDE 7 — Apa itu SDLC?

**[JUDUL]** Software Development Life Cycle (SDLC)

**[ISI]**
- Kerangka kerja proses pengembangan perangkat lunak
- Mencakup: **perencanaan → pembangunan → pengujian → peluncuran**
- Tujuan: menghasilkan perangkat lunak berkualitas tinggi
- Berbagai model SDLC: Waterfall, Agile, Spiral, dll.

📝 **Speaker Notes:**
> *"SDLC adalah kerangka kerja yang menggambarkan proses lengkap pengembangan perangkat lunak dari awal hingga pemeliharaan. Kami memilih salah satu model yang paling klasik dan terstruktur: Waterfall."*

---

### 🎞️ SLIDE 8 — Model Waterfall

**[JUDUL]** Metode Waterfall

**[ISI — DIAGRAM VERTIKAL]**
```
① Requirements   →  Analisis Kebutuhan
② System Design  →  Perancangan Sistem
③ Implementation →  Pengkodean
④ Testing        →  Pengujian
⑤ Deployment     →  Penerapan
⑥ Maintenance    →  Pemeliharaan
```
> Bersifat **linier & sekuensial** — satu tahap selesai dulu, baru lanjut

📝 **Speaker Notes:**
> *"Model Waterfall bekerja secara berurutan — setiap fase harus selesai sepenuhnya sebelum melanjutkan ke fase berikutnya, seperti air yang mengalir ke bawah."*

---

### 🎞️ SLIDE 9 — Mengapa Waterfall?

**[JUDUL]** Alasan Memilih Waterfall

**[ISI]**
- ✅ Kebutuhan sistem **sudah jelas** dari hasil observasi
- ✅ Scope proyek **tetap dan terukur**
- ✅ Menghasilkan **dokumentasi terstruktur**
- ✅ Timeline **dapat diprediksi** — sesuai jadwal KP
- ✅ Cocok untuk tim kecil dengan **kebutuhan terdefinisi**

📝 **Speaker Notes:**
> *"Kami memilih Waterfall karena kebutuhan sistem sudah kami ketahui dengan jelas sejak awal, scope tidak berubah di tengah jalan, dan model ini menghasilkan dokumentasi yang komprehensif — penting untuk laporan kerja praktik."*

---

## ━━━ BAGIAN 4: ANALISIS KEBUTUHAN ━━━

---

### 🎞️ SLIDE 10 — Aktor Sistem

**[JUDUL]** Aktor dalam Sistem PPDB

**[ISI — 2 KOLOM]**

| 👨‍👩‍👦 Orang Tua / Wali | 👩‍💼 Admin / Verifikator |
|---|---|
| Mendaftar online | Kelola data pendaftar |
| Mengisi formulir | Cetak formulir |
| Submit pendaftaran | Verifikasi berkas |
| Pantau status | Export data CSV |

📝 **Speaker Notes:**
> *"Sistem memiliki dua aktor utama: Orang Tua atau Wali yang berinteraksi dari luar sekolah secara online, dan Admin atau Tim Verifikator yang bekerja dari dalam sekolah."*

---

### 🎞️ SLIDE 11 — Kebutuhan Fungsional: Orang Tua

**[JUDUL]** Kebutuhan Fungsional — Orang Tua

**[ISI]**
- **KF-01** Registrasi akun (email, WhatsApp, password)
- **KF-02** Login ke sistem
- **KF-03** Isi biodata calon siswa (nama, NISN, TTL, dll.)
- **KF-04/05** Isi biodata ayah & ibu kandung
- **KF-06** Isi biodata wali *(opsional)*
- **KF-07** Submit formulir online
- **KF-08** Pantau status pendaftaran real-time

📝 **Speaker Notes:**
> *"Terdapat delapan kebutuhan fungsional untuk aktor Orang Tua, mulai dari registrasi hingga pemantauan status pendaftaran secara real-time."*

---

### 🎞️ SLIDE 12 — Kebutuhan Fungsional: Admin

**[JUDUL]** Kebutuhan Fungsional — Admin

**[ISI]**
- **KF-09** Dashboard daftar semua pendaftar
- **KF-10** Cetak formulir *(print-ready)*
- **KF-11** Ubah status:
  - ✅ Terverifikasi
  - ❌ Ditolak + alasan penolakan
- **KF-12** Export rekap data ke **CSV / Excel**

📝 **Speaker Notes:**
> *"Admin memiliki empat kebutuhan fungsional utama yang semuanya berpusat pada kemampuan mengelola data pendaftar secara efisien."*

---

### 🎞️ SLIDE 13 — Kebutuhan Non-Fungsional

**[JUDUL]** Kebutuhan Non-Fungsional

**[ISI]**
| Aspek | Standar |
|---|---|
| 🔒 Keamanan | Autentikasi sesi, enkripsi password |
| 📱 Responsif | Dapat diakses HP & laptop |
| ⚡ Performa | Halaman termuat < 3 detik |
| 🧭 Kemudahan | Antarmuka intuitif tanpa pelatihan |
| 📦 Skalabilitas | Mampu menangani ratusan pendaftar |

📝 **Speaker Notes:**
> *"Selain fitur, sistem juga harus memenuhi standar kualitas non-fungsional yang menjamin keamanan, kecepatan, dan kemudahan penggunaan."*

---

### 🎞️ SLIDE 14 — Alur Status Pendaftaran

**[JUDUL]** Alur Status Pendaftaran

**[ISI — DIAGRAM ALUR]**
```
📝 Belum Submit
        ↓  submit formulir online
⏳ Menunggu Penyerahan Berkas
        ↓  verifikasi + pembayaran
   ✅ Terverifikasi    ❌ Ditolak
                          (+alasan)
```

📝 **Speaker Notes:**
> *"Sistem mendefinisikan empat status yang mencerminkan alur proses PPDB secara nyata — dari belum submit hingga terverifikasi atau ditolak."*

---

## ━━━ BAGIAN 5: PERANCANGAN SISTEM ━━━

---

### 🎞️ SLIDE 15 — Arsitektur Sistem

**[JUDUL]** Arsitektur Sistem

**[ISI — DIAGRAM]**
```
👤 Pengguna (Browser)
        ↕ HTTP/HTTPS
⚙️  Web Server (Aplikasi)
        ↕ SQL Query
🗃️  Database Server (MySQL)
```
- Model: **Client–Server Berbasis Web**
- Komunikasi diamankan dengan **sesi autentikasi**

📝 **Speaker Notes:**
> *"Sistem menggunakan arsitektur client-server berbasis web: pengguna mengakses melalui browser, request diproses web server, dan data disimpan di database."*

---

### 🎞️ SLIDE 16 — Struktur Database

**[JUDUL]** Rancangan Database

**[ISI]**
| Tabel | Fungsi |
|---|---|
| `users` | Akun login pengguna |
| `students` | Biodata calon siswa |
| `pendaftaran` | Proses PPDB + nomor `PPDB-2026-00001` |
| `ayah` | Data ayah kandung |
| `ibu` | Data ibu kandung |
| `wali` | Data wali *(opsional)* |

📝 **Speaker Notes:**
> *"Database terdiri dari enam tabel yang saling berelasi. Nomor pendaftaran digenerate otomatis oleh sistem dengan format PPDB-tahun-urutan."*

---

### 🎞️ SLIDE 17 — Relasi Antar Tabel

**[JUDUL]** Relasi Database

**[ISI — DIAGRAM]**
```
USERS ──1:1──▶ STUDENTS ──1:1──▶ PENDAFTARAN
                                      │
                              ┌───────┼───────┐
                              ▼       ▼       ▼
                            AYAH    IBU    WALI*
                                           (*opsional)
```

📝 **Speaker Notes:**
> *"Relasi antar tabel menggunakan foreign key: satu akun memiliki satu data siswa, satu siswa memiliki satu pendaftaran, dan setiap pendaftaran memiliki data ayah, ibu, serta opsional wali."*

---

## ━━━ BAGIAN 6: PEMODELAN UML ━━━

---

### 🎞️ SLIDE 18 — Pengantar UML

**[JUDUL]** Unified Modeling Language (UML)

**[ISI]**
- Bahasa pemodelan visual standar industri
- Mendokumentasikan struktur & perilaku sistem
- Diagram yang digunakan dalam proyek ini:
  - 📌 Use Case Diagram
  - 🔄 Activity Diagram
  - ↔️ Sequence Diagram
  - 🗃️ Entity-Relationship Diagram (ERD)

📝 **Speaker Notes:**
> *"UML adalah standar pemodelan yang digunakan untuk mendokumentasikan sistem perangkat lunak secara visual. Kami menggunakan empat jenis diagram UML dalam proyek ini."*

---

### 🎞️ SLIDE 19 — Use Case Diagram

**[JUDUL]** Use Case Diagram

**[ISI]**
> *(Tampilkan gambar/diagram Use Case)*

- Menggambarkan **interaksi aktor ↔ fungsi sistem**
- Aktor: Orang Tua/Wali & Admin
- Total use case: **12 fungsi utama**

📝 **Speaker Notes:**
> *"Use Case Diagram menjawab pertanyaan: siapa yang menggunakan sistem dan apa yang bisa mereka lakukan. Orang tua memiliki 8 use case, admin memiliki 4 use case tambahan."*

---

### 🎞️ SLIDE 20 — Activity Diagram

**[JUDUL]** Activity Diagram

**[ISI]**
> *(Tampilkan gambar/diagram Activity)*

- Menggambarkan **alur aktivitas proses PPDB**
- Mencakup proses **online** dan **offline di sekolah**
- Menampilkan **titik keputusan** (decision point)

📝 **Speaker Notes:**
> *"Activity Diagram menggambarkan alur lengkap proses PPDB dari sudut pandang aktivitas — dari registrasi orang tua hingga verifikasi oleh admin, termasuk alur offline saat penyerahan berkas fisik."*

---

### 🎞️ SLIDE 21 — Sequence Diagram

**[JUDUL]** Sequence Diagram

**[ISI]**
> *(Tampilkan gambar/diagram Sequence)*

- Menggambarkan **urutan interaksi antar komponen**
- Skenario: **Submit Formulir Online**
- Komponen: Browser → Web Server → Database

📝 **Speaker Notes:**
> *"Sequence Diagram menampilkan urutan detail saat orang tua menekan tombol submit — dari browser, ke server, ke database, dan kembali ke pengguna dengan konfirmasi nomor pendaftaran."*

---

### 🎞️ SLIDE 22 — ERD

**[JUDUL]** Entity-Relationship Diagram (ERD)

**[ISI]**
> *(Tampilkan gambar ERD)*

- Menggambarkan **struktur & relasi data** dalam database
- 6 entitas utama: users, students, pendaftaran, ayah, ibu, wali
- Kardinalitas: **1:1** dan **1:0..1** (opsional)

📝 **Speaker Notes:**
> *"ERD memodelkan bagaimana data diorganisir di dalam database. Relasi antar entitas menggunakan foreign key untuk menjaga integritas data."*

---

## ━━━ BAGIAN 7: DEMO APLIKASI ━━━

---

### 🎞️ SLIDE 23 — Intro Demo

**[JUDUL]** Demo Aplikasi

**[ISI]**
**Alur Demo:**

🟦 **Sisi Orang Tua**
Registrasi → Login → Isi Formulir → Submit → Cek Status

🟩 **Sisi Admin**
Dashboard → Detail → Cetak → Ubah Status → Export CSV

📝 **Speaker Notes:**
> *"Mari kita lihat demonstrasi langsung sistem PPDB Online yang telah kami bangun, dari dua sudut pandang berbeda."*

---

### 🎞️ SLIDE 24 — Demo: Sisi Orang Tua

**[JUDUL]** Demo — Orang Tua / Wali

**[ISI]**
> *(Screen recording: Registrasi → Formulir → Submit)*

- ✅ Buat akun dengan email & WhatsApp
- ✅ Isi formulir multi-step (siswa, ayah, ibu)
- ✅ Submit → nomor pendaftaran otomatis terbit
- ✅ Status berubah: **"Menunggu Penyerahan Berkas"**

📝 **Speaker Notes:**
> *"Orang tua cukup membuat akun, login, mengisi formulir digital, lalu submit. Sistem akan menerbitkan nomor pendaftaran secara otomatis dan status langsung diperbarui."*

---

### 🎞️ SLIDE 25 — Demo: Sisi Admin

**[JUDUL]** Demo — Admin / Verifikator

**[ISI]**
> *(Screen recording: Dashboard → Verifikasi → Export)*

- ✅ Dashboard: semua pendaftar + status real-time
- ✅ Cetak formulir: tampilan print-ready
- ✅ Verifikasi: klik → status berubah "Terverifikasi"
- ✅ Export: download CSV 1 klik

📝 **Speaker Notes:**
> *"Admin dapat melihat semua pendaftar di dashboard, mencetak formulir untuk dicocokkan dengan berkas fisik, mengubah status setelah verifikasi selesai, dan mengekspor seluruh data ke CSV."*

---

## ━━━ BAGIAN 8: PENUTUP ━━━

---

### 🎞️ SLIDE 26 — Hasil yang Dicapai

**[JUDUL]** Hasil yang Dicapai

**[ISI]**
| Sebelum | Sesudah |
|---|---|
| Formulir kertas manual | Formulir digital online |
| Input ulang ke Excel | Data langsung ke database |
| Rekap butuh waktu lama | Export CSV 1 klik |
| Status tidak transparan | Pantau status real-time |
| Rentan kesalahan input | Validasi otomatis sistem |

📝 **Speaker Notes:**
> *"Berikut adalah perbandingan kondisi sebelum dan sesudah implementasi sistem. Setiap titik masalah yang kami identifikasi di awal berhasil diatasi oleh sistem yang kami bangun."*

---

### 🎞️ SLIDE 27 — Manfaat Sistem

**[JUDUL]** Manfaat Sistem

**[ISI]**
- 🎯 Menghilangkan proses **input ulang** data
- 🎯 Meminimalkan risiko **kesalahan & data tertinggal**
- 🎯 Mempercepat proses **rekap dan pelaporan**
- 🎯 Memberikan **transparansi status** bagi orang tua
- 🎯 Meringankan **beban administrasi** sekolah

📝 **Speaker Notes:**
> *"Secara keseluruhan, sistem ini memberikan manfaat nyata bagi kedua pihak — orang tua mendapat kemudahan dan transparansi, sementara sekolah mendapatkan efisiensi dan akurasi data yang lebih baik."*

---

### 🎞️ SLIDE 28 — Roadmap Pengembangan

**[JUDUL]** Rencana Pengembangan Selanjutnya

**[ISI]**
- 📄 Cetak **Kartu Tanda Peserta PPDB** otomatis (PDF)
- 📲 Notifikasi otomatis via **WhatsApp / Email** saat status berubah
- 📊 Dashboard statistik & grafik data pendaftar
- 🔐 Manajemen multi-admin dengan tingkatan akses

📝 **Speaker Notes:**
> *"Ke depannya, sistem ini masih dapat dikembangkan lebih lanjut — termasuk fitur cetak kartu peserta otomatis dan notifikasi WhatsApp setiap kali ada perubahan status pendaftaran."*

---

### 🎞️ SLIDE 29 — Kesimpulan

**[JUDUL]** Kesimpulan

**[ISI]**
- Berhasil merancang & mengimplementasikan **Sistem PPDB Online**
- Menggunakan metode **Waterfall** secara terstruktur
- Menjawab masalah nyata yang ditemukan di **Sekolah Bhinneka**
- Sistem siap digunakan untuk **periode PPDB mendatang**

📝 **Speaker Notes:**
> *"Sebagai kesimpulan, proyek kerja praktik ini berhasil menghasilkan sistem yang menjawab kebutuhan nyata Sekolah Bhinneka, dikerjakan secara terstruktur menggunakan metode Waterfall."*

---

### 🎞️ SLIDE 30 — Terima Kasih

**[JUDUL BESAR]**
> 🙏 Terima Kasih

**[ISI]**
- 🏫 Sekolah Bhinneka — Mitra Kerja Praktik
- 🎓 [Nama Dosen] — Dosen Pembimbing
- 👥 Seluruh pihak yang telah mendukung

**[BAWAH]**
> ❓ Ada pertanyaan?

📝 **Speaker Notes:**
> *"Kami mengucapkan terima kasih kepada Sekolah Bhinneka, dosen pembimbing, dan semua pihak yang telah mendukung proyek ini. Terima kasih telah menyaksikan presentasi kami."*

---

## 📌 PANDUAN DESAIN SLIDE

| Elemen | Rekomendasi |
|---|---|
| **Font Judul** | Poppins Bold / Inter Bold — ukuran 36–44pt |
| **Font Isi** | Poppins Regular / Inter — ukuran 20–24pt |
| **Warna Utama** | Biru Tua `#1E3A5F` |
| **Warna Aksen** | Emas `#F5A623` atau Biru Muda `#3B82F6` |
| **Background** | Putih bersih atau Biru sangat muda `#F0F4FF` |
| **Transisi Slide** | Fade — 0.3 detik |
| **Animasi Isi** | Appear — satu per satu, 0.2 detik delay |
| **Rasio** | 16:9 (Widescreen) |

> [!TIP]
> Untuk slide yang menampilkan diagram UML (slide 19–22), cukup **screenshot diagram** dari file `uml_diagrams_ppdb.md` dan tempelkan sebagai gambar di slide. Tambahkan border tipis dan shadow agar terlihat profesional.

> [!NOTE]
> Slide 7–8 (Waterfall) sangat efektif jika dibuat sebagai **animasi bertahap** — setiap tahap muncul satu per satu saat narasi dibacakan. Di PowerPoint gunakan "Animation → Appear" per baris.

---

*30 Slide · Sistem PPDB Online · Sekolah Bhinneka · Laporan Kerja Praktik*
