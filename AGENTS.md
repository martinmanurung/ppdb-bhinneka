# Dokumen Spesifikasi Sistem: PPDB Sekolah Bhinneka

Dokumen ini berisi gambaran umum, fitur utama, dan alur kerja untuk sistem website Penerimaan Peserta Didik Baru (PPDB) Sekolah Bhinneka.

---

## 1. Aktor Sistem (User Roles)

1. **Orang Tua / Wali**: Mengisi formulir pendaftaran secara online, memantau status, dan menyerahkan berkas fisik ke sekolah.
2. **Admin / Tim Verifikator**: Mencetak formulir online, mencocokkan data dengan berkas fisik, menerima pembayaran, dan mengubah status di sistem.

---

## 2. Cakupan Fitur Utama (Feature Scope)

### Autentikasi & Akun
* **Registrasi Akun** — Email aktif, nomor WhatsApp, dan password.
* **Login Akun** — Email/nomor WhatsApp dan password.

### Pengisian Data (Formulir Digital — Online)
* **Biodata Calon Siswa** — Nama, NISN, tempat/tanggal lahir, jenis kelamin, agama, alamat, asal sekolah, jenjang, dll.
* **Biodata Orang Tua / Wali** — Ayah, Ibu, dan Wali (opsional) beserta NIK, pekerjaan, penghasilan, no. HP.
* **Submit Formulir Online** — Setelah biodata lengkap, orang tua/wali mengirim formulir. Status berubah menjadi **Menunggu Penyerahan Berkas**.

### Penyerahan Berkas (Offline di Sekolah)
* Berkas **tidak diunggah online**. Orang tua/wali datang ke sekolah membawa:
  1. Kartu Keluarga (KK)
  2. Akta Kelahiran
  3. Ijazah / Surat Keterangan Lulus (SKL)

### Validasi & Verifikasi (Sisi Admin — di Sekolah)
* **Dashboard Verifikator** — Daftar pendaftar yang sudah submit formulir online.
* **Cetak Formulir** — Admin mencetak formulir yang sudah diisi online untuk dicocokkan dengan berkas fisik.
* **Verifikasi & Pembayaran** — Setelah data sesuai dan pembayaran administrasi diterima, admin mengubah status menjadi **Terverifikasi**.
* **Export Data** — Rekap/unduh data pendaftar (format CSV, dapat dibuka di Excel).

---

## 3. Alur Kerja Sistem (User Journey)

1. **Pendaftaran Online:** Orang tua/wali membuat akun, login, mengisi biodata siswa dan orang tua/wali.
2. **Submit Formulir:** Setelah data dikirim, status menjadi *Menunggu Penyerahan Berkas*.
3. **Penyerahan Berkas di Sekolah:** Orang tua/wali datang ke sekolah hanya untuk menyerahkan berkas persyaratan fisik.
4. **Cetak & Cocokkan:** Admin mencetak formulir online dan mencocokkan dengan berkas asli.
5. **Pembayaran:** Setelah data dinyatakan sesuai, pembayaran administrasi dilakukan di sekolah.
6. **Status Terverifikasi:** Admin mengubah status di website menjadi *Terverifikasi*.
7. **Selesai:** Data dapat direkap atau diunduh oleh pihak sekolah (Excel/CSV).

---

## 4. Struktur Database (Ringkas)

| Tabel | Fungsi |
|-------|--------|
| `students` | Biodata calon siswa saja |
| `pendaftaran` | Proses PPDB: `nomor_pendaftaran`, status, submit, penolakan |
| `ayah` | Data ayah kandung (1 per pendaftaran) |
| `ibu` | Data ibu kandung (1 per pendaftaran) |
| `wali` | Data wali opsional (1 per pendaftaran) |

Nomor pendaftaran otomatis, format: `PPDB-{tahun}-{urutan}` (contoh: `PPDB-2026-00001`).

---

## 5. Status Pendaftaran

| Status | Keterangan |
|--------|------------|
| Belum Submit | Formulir online belum dikirim |
| Menunggu Penyerahan Berkas | Formulir online sudah dikirim, menunggu kedatangan ke sekolah |
| Terverifikasi | Berkas sesuai dan pembayaran selesai |
| Ditolak | Pendaftaran ditolak (dengan alasan) |

---

## 6. Rencana Pengembangan Selanjutnya (Future Roadmap)

* Fitur cetak Kartu Tanda Peserta PPDB otomatis dalam bentuk PDF.
* Notifikasi otomatis via Email/WhatsApp setiap kali ada perubahan status.
