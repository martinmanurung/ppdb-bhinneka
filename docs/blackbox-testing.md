# Blackbox Testing PPDB Bhinneka

Dokumen ini berisi test case blackbox testing dalam format formal untuk kebutuhan laporan kampus. Ruang lingkup pengujian dibatasi hanya pada fitur registrasi dan login.

## Identitas Pengujian

| Elemen | Keterangan |
|---|---|
| Nama Sistem | PPDB Bhinneka |
| Jenis Pengujian | Blackbox    Testing |
| Ruang Lingkup | Registrasi dan Login |
| Tujuan | Memastikan proses pembuatan akun dan autentikasi berjalan sesuai kebutuhan |

## Test Case Registrasi

| ID | Test Case | Tujuan | Prasyarat | Langkah Pengujian | Data Uji | Hasil yang Diharapkan | Status |
|---|---|---|---|---|---|---|---|
| REG-01 | Registrasi berhasil dengan data valid | Memastikan user dapat membuat akun baru | User belum login dan belum memiliki akun | 1. Buka halaman registrasi. 2. Isi seluruh field dengan data valid. 3. Klik tombol daftar. | Nama lengkap valid, email valid dan belum terdaftar, WhatsApp valid, password valid, konfirmasi password sesuai | Akun berhasil dibuat, user otomatis login, dan diarahkan ke halaman biodata siswa | Pass/Fail |
| REG-02 | Validasi nama wajib diisi | Memastikan field nama tidak boleh kosong | User berada di halaman registrasi | 1. Buka halaman registrasi. 2. Kosongkan field nama. 3. Isi field lain dengan benar. 4. Klik daftar. | Nama kosong | Sistem menolak pendaftaran dan menampilkan pesan bahwa nama harus diisi | Pass/Fail |
| REG-03 | Validasi email wajib diisi | Memastikan field email tidak boleh kosong | User berada di halaman registrasi | 1. Buka halaman registrasi. 2. Kosongkan field email. 3. Isi field lain dengan benar. 4. Klik daftar. | Email kosong | Sistem menolak pendaftaran dan menampilkan pesan bahwa email harus diisi | Pass/Fail |
| REG-04 | Validasi format email | Memastikan email harus berformat benar | User berada di halaman registrasi | 1. Buka halaman registrasi. 2. Isi email dengan format tidak valid. 3. Lengkapi field lain. 4. Klik daftar. | Email tidak valid, misalnya test@ | Sistem menolak pendaftaran dan menampilkan pesan format email tidak valid | Pass/Fail |
| REG-05 | Validasi nomor WhatsApp | Memastikan nomor WhatsApp sesuai format | User berada di halaman registrasi | 1. Buka halaman registrasi. 2. Isi nomor WhatsApp tidak valid. 3. Lengkapi field lain. 4. Klik daftar. | WhatsApp tidak valid, misalnya 12345 | Sistem menolak pendaftaran dan menampilkan pesan format nomor WhatsApp tidak valid | Pass/Fail |
| REG-06 | Validasi password minimal 8 karakter | Memastikan password memenuhi panjang minimal | User berada di halaman registrasi | 1. Buka halaman registrasi. 2. Isi password kurang dari 8 karakter. 3. Lengkapi field lain. 4. Klik daftar. | Password kurang dari 8 karakter | Sistem menolak pendaftaran dan menampilkan pesan password minimal 8 karakter | Pass/Fail |
| REG-07 | Validasi konfirmasi password | Memastikan konfirmasi password harus sama | User berada di halaman registrasi | 1. Buka halaman registrasi. 2. Isi password dan konfirmasi password berbeda. 3. Klik daftar. | Password dan konfirmasi tidak sama | Sistem menolak pendaftaran dan menampilkan pesan konfirmasi password tidak cocok | Pass/Fail |
| REG-08 | Validasi email unik | Memastikan email yang sudah terdaftar tidak bisa dipakai lagi | Sudah ada akun dengan email tertentu | 1. Buka halaman registrasi. 2. Isi email yang sudah terdaftar. 3. Lengkapi field lain. 4. Klik daftar. | Email yang sudah pernah digunakan | Sistem menolak pendaftaran dan menampilkan pesan email sudah terdaftar | Pass/Fail |
| REG-09 | Validasi WhatsApp unik | Memastikan nomor WhatsApp yang sudah terdaftar tidak bisa dipakai lagi | Sudah ada akun dengan nomor WhatsApp tertentu | 1. Buka halaman registrasi. 2. Isi nomor WhatsApp yang sudah terdaftar. 3. Lengkapi field lain. 4. Klik daftar. | Nomor WhatsApp yang sudah digunakan | Sistem menolak pendaftaran dan menampilkan pesan nomor WhatsApp sudah terdaftar | Pass/Fail |

## Test Case Login

| ID | Test Case | Tujuan | Prasyarat | Langkah Pengujian | Data Uji | Hasil yang Diharapkan | Status |
|---|---|---|---|---|---|---|---|
| LOG-01 | Login berhasil dengan email | Memastikan user dapat masuk menggunakan email | User sudah memiliki akun aktif | 1. Buka halaman login. 2. Isi email dan password yang benar. 3. Klik login. | Email terdaftar dan password benar | User berhasil login dan diarahkan ke dashboard sesuai role | Pass/Fail |
| LOG-02 | Login berhasil dengan nomor WhatsApp | Memastikan user dapat masuk menggunakan WhatsApp | User sudah memiliki akun aktif | 1. Buka halaman login. 2. Isi nomor WhatsApp dan password yang benar. 3. Klik login. | Nomor WhatsApp terdaftar dan password benar | User berhasil login dan diarahkan ke dashboard sesuai role | Pass/Fail |
| LOG-03 | Validasi field login wajib diisi | Memastikan field login tidak boleh kosong | User berada di halaman login | 1. Buka halaman login. 2. Kosongkan field login. 3. Isi password. 4. Klik login. | Field login kosong | Sistem menolak proses login dan menampilkan pesan bahwa email atau nomor WhatsApp harus diisi | Pass/Fail |
| LOG-04 | Validasi password wajib diisi | Memastikan password tidak boleh kosong | User berada di halaman login | 1. Buka halaman login. 2. Isi email atau WhatsApp. 3. Kosongkan password. 4. Klik login. | Password kosong | Sistem menolak proses login dan menampilkan pesan bahwa password harus diisi | Pass/Fail |
| LOG-05 | Login gagal dengan password salah | Memastikan sistem menolak password yang tidak sesuai | User sudah memiliki akun aktif | 1. Buka halaman login. 2. Isi email atau WhatsApp yang benar. 3. Isi password yang salah. 4. Klik login. | Login benar, password salah | Sistem menolak login dan menampilkan pesan email/nomor WhatsApp atau password tidak valid | Pass/Fail |
| LOG-06 | Logout setelah login | Memastikan user dapat keluar dari sistem | User sudah login | 1. Login ke sistem. 2. Klik tombol logout. | User aktif | Session berakhir dan user diarahkan ke halaman login | Pass/Fail |

## Ringkasan Hasil Pengujian

| Kategori | Jumlah Test Case |
|---|---|
| Registrasi | 9 |
| Login | 6 |
| Total | 15 |

<!-- ## Keterangan

- Status pada tabel diisi setelah proses pengujian dilakukan.
- Dokumen ini disusun sebagai contoh blackbox testing untuk kebutuhan laporan, sehingga hanya mencakup dua fitur utama yang paling relevan. -->