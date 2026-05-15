# Dokumen Spesifikasi Sistem: PPDB Sekolah Bhinneka

Dokumen ini berisi gambaran umum, fitur utama, dan alur kerja untuk sistem website Penerimaan Peserta Didik Baru (PPDB) Sekolah Bhinneka.

---

## 1. Aktor Sistem (User Roles)
Untuk mengakomodasi fitur-fitur yang disebutkan, sistem ini akan mendefinisikan dua aktor utama:
1. **Calon Siswa / Wali**: Pengguna yang melakukan pendaftaran, mengisi data, dan mengunggah dokumen.
2. **Admin / Tim Verifikator**: Pihak sekolah yang bertanggung jawab memeriksa dan memverifikasi berkas yang masuk.

---

## 2. Cakupan Fitur Utama (Feature Scope)

### 🔑 Autentikasi & Akun
*   **Registrasi Akun**
    *   Calon siswa/wali membuat akun menggunakan email aktif, nomor WhatsApp, dan password.
    *   Sistem mengirimkan konfirmasi pendaftaran akun.
*   **Login Akun**
    *   Masuk ke dalam sistem menggunakan email/nomor WhatsApp dan password yang telah didaftarkan.
    *   Fitur *Remember Me* dan *Forgot Password* (opsional untuk pengembangan lanjut).

### 📝 Pengisian Data (Formulir Digital)
*   **Biodata Calon Siswa**
    *   Input data pribadi: Nama Lengkap, Nama Panggilan, NISN (jika ada), Tempat/Tanggal Lahir, Jenis Kelamin, Agama, Alamat Domisili, dan Asal Sekolah.
*   **Biodata Orang Tua / Wali**
    *   Input data Ayah Kandung & Ibu Kandung (Nama, NIK, Pekerjaan, Penghasilan, No. HP).
    *   Kondisional: Jika calon siswa tidak tinggal bersama orang tua, sistem menyediakan opsi pengisian data **Wali Murid** beserta hubungan kekerabatannya.

### 📁 Manajemen Berkas (Upload Dokumen)
*   Fitur unggah dokumen pendukung dengan batasan format (PDF/JPG/PNG) dan ukuran maksimal (misal: maks 2MB).
*   Komponen berkas yang wajib diunggah:
    1.  Kartu Keluarga (KK)
    2.  Akta Kelahiran
    3.  Ijazah / Surat Keterangan Lulus (SKL)

### 🛡️ Validasi & Verifikasi (Sisi Admin)
*   **Dashboard Verifikator**
    *   Halaman khusus admin untuk melihat daftar pendaftar yang sudah melengkapi berkas.
*   **Verifikasi Berkas**
    *   Admin dapat melihat detail biodata dan mengunduh/meninjau berkas yang diunggah.
    *   Admin memberikan status pada setiap berkas: **Disetujui** atau **Ditolak** (disertai alasan penolakan, misalnya: *"Berkas buram/tidak terbaca"*).
*   **Status Kelulusan Administrasi**
    *   Jika semua berkas valid, status akun siswa berubah menjadi *Terverifikasi / Lolos Tahap Berkas*.

---

## 3. Alur Kerja Sistem (User Journey)

1.  **Tahap Pendaftaran:** Calon siswa membuat akun dan login ke sistem.
2.  **Tahap Pengisian Data:** Calon siswa mengisi formulir biodata diri dan orang tua/wali secara berurutan.
3.  **Tahap Unggah:** Calon siswa mengunggah foto/scan dokumen asli (KK, Akta, Ijazah). Setelah selesai, siswa melakukan *submit* final.
4.  **Tahap Verifikasi:** Admin memeriksa kesesuaian antara biodata yang diinput dengan berkas yang diunggah.
5.  **Tahap Pengumuman:** Calon siswa dapat melihat status verifikasi mereka secara langsung di halaman dashboard akun masing-masing.

---

## 4. Rencana Pengembangan Selanjutnya (Future Roadmap)
*   Fitur cetak Kartu Tanda Peserta PPDB otomatis dalam bentuk PDF.
*   Notifikasi otomatis via Email setiap kali ada perubahan status verifikasi berkas.