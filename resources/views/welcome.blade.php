<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('assets/logo-bhinneka.jpg') }}">
    <title>PPDB SEKOLAH BHINNEKA</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }
        html {
            scroll-behavior: smooth;
        }
        /* Navbar Customization */
        .navbar-custom {
            background-color: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid #f1f5f9;
        }
        .navbar-brand {
            font-weight: 700;
            color: #0f766e !important;
            letter-spacing: -0.5px;
        }
        .nav-link {
            font-weight: 500;
            color: #475569 !important;
            transition: color 0.3s ease;
            position: relative;
        }
        .nav-link:hover {
            color: #0d9488 !important;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: #0d9488;
            transition: width 0.3s ease;
        }
        .nav-link:hover::after {
            width: 100%;
        }
        .btn-ppdb {
            background: linear-gradient(to right, #059669, #0d9488);
            color: #fff !important;
            font-weight: 600;
            border: none;
            border-radius: 12px;
            padding: 10px 24px;
            box-shadow: 0 4px 6px -1px rgba(13, 148, 136, 0.2);
            transition: all 0.3s ease;
        }
        .btn-ppdb:hover {
            background: linear-gradient(to right, #047857, #0f766e);
            box-shadow: 0 10px 15px -3px rgba(13, 148, 136, 0.3);
            transform: translateY(-2px);
        }

        /* Hero Section */
        .hero-section {
            position: relative;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            background-image: url("{{ asset('images/publicimagessekolah.jpg') }}");
            background-size: cover;
            background-position: center;
        }
        .hero-overlay {
            position: absolute;
            inset: 0;
            background: rgba(15, 23, 42, 0.65);
            backdrop-filter: blur(1px);
        }
        .hero-content {
            position: relative;
            z-index: 10;
            text-align: center;
            color: #fff;
        }
        .hero-title {
            font-size: clamp(3rem, 5vw, 5rem);
            font-weight: 800;
            letter-spacing: -1px;
            margin-bottom: 1rem;
        }
        .hero-title span {
            color: #34d399;
        }
        .hero-subtitle {
            font-size: clamp(1.25rem, 2vw, 1.75rem);
            font-weight: 300;
            color: #e2e8f0;
        }

        /* Profile Section */
        .profil-section {
            background-color: #0f172a;
            color: #fff;
        }
        .profil-img {
            height: 100%;
            min-height: 400px;
            background-image: url("{{ asset('images/publicimagessekolah2.jpg') }}");
            background-size: cover;
            background-position: center;
        }
        .profil-text-container {
            background: linear-gradient(135deg, #0f172a 0%, #115e59 50%, #0f172a 100%);
            padding: 4rem;
        }
        .badge-custom {
            background-color: rgba(52, 211, 153, 0.2);
            color: #34d399;
            border: 1px solid rgba(52, 211, 153, 0.3);
            padding: 8px 16px;
            border-radius: 50px;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            font-size: 0.85rem;
        }

        /* Stats Section */
        .stats-section {
            background-color: #fff;
            padding: 5rem 0;
            box-shadow: inset 0 2px 4px 0 rgba(0, 0, 0, 0.02);
            position: relative;
            z-index: 10;
        }
        .stat-card {
            background-color: #f8fafc;
            border: 1px solid #f1f5f9;
            border-radius: 1rem;
            padding: 2rem;
            transition: all 0.3s ease;
        }
        .stat-card:hover {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05);
            transform: translateY(-5px);
        }

        /* Facilities Section */
        .fasilitas-section {
            padding: 6rem 0;
            background-color: #fff;
            border-top: 1px solid #f1f5f9;
        }
        .card-custom {
            border: 1px solid #f1f5f9;
            border-radius: 1.5rem;
            overflow: hidden;
            transition: all 0.4s ease;
            background-color: #f8fafc;
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        .card-custom:hover {
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
            transform: translateY(-8px);
        }
        .card-img-wrapper {
            position: relative;
            overflow: hidden;
            height: 220px;
        }
        .card-img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }
        .card-custom:hover .card-img-wrapper img {
            transform: scale(1.05);
        }
        .card-badge {
            position: absolute;
            top: 16px;
            left: 16px;
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 6px 14px;
            border-radius: 12px;
            color: #fff;
        }

        /* Visi Misi Section */
        .visi-misi-section {
            background-color: #f8fafc;
            border-top: 1px solid #f1f5f9;
            border-bottom: 1px solid #f1f5f9;
        }
        .visi-misi-img {
            height: 100%;
            min-height: 400px;
            background-image: url("{{ asset('images/publicimagessekolah3.jpg') }}");
            background-size: cover;
            background-position: center;
        }
        .visi-box {
            background: linear-gradient(to right, #f0fdfa, rgba(236, 253, 245, 0.5));
            padding: 1.5rem;
            border-radius: 1rem;
            border-left: 4px solid #10b981;
            margin-bottom: 2rem;
        }

        /* Extracurricular Section */
        .ekskul-section {
            padding: 6rem 0;
            background-color: #f8fafc;
        }
        
        .section-header {
            text-align: center;
            max-width: 800px;
            margin: 0 auto 4rem auto;
        }

        .section-title {
            font-size: clamp(2rem, 3vw, 3rem);
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 1rem;
            letter-spacing: -0.5px;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-custom fixed-top py-3 shadow-sm">
        <div class="container-fluid px-4 px-lg-5">
            <a class="navbar-brand d-flex align-items-center gap-2" href="#">
                SEKOLAH BHINNEKA
            </a>
            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars text-secondary"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-lg-4">
                    <li class="nav-item">
                        <a class="nav-link" href="#home"><i class="fas fa-home me-1 d-lg-none"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#profil">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#fasilitas">Fasilitas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#visi-misi">Visi Misi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#ekstrakurikuler">Ekstrakurikuler</a>
                    </li>
                </ul>
                <div class="d-flex mt-3 mt-lg-0">
                    @auth
                        @if(auth()->user()->role === 'admin')
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-ppdb w-100 d-flex align-items-center justify-content-center gap-2">
                                Dashboard Admin <i class="fas fa-arrow-right"></i>
                            </a>
                        @else
                            <a href="{{ route('student.dashboard') }}" class="btn btn-ppdb w-100 d-flex align-items-center justify-content-center gap-2">
                                Dashboard <i class="fas fa-arrow-right"></i>
                            </a>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="btn btn-ppdb w-100 d-flex align-items-center justify-content-center gap-2">
                            Login PPDB <i class="fas fa-arrow-right"></i>
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero-section">
        <div class="hero-overlay"></div>
        <div class="hero-content container">
            <h1 class="hero-title">SEKOLAH <span>BHINNEKA</span></h1>
            <p class="hero-subtitle">Pendaftaran Peserta Didik Baru Angkatan 2026 / 2027</p>
        </div>
    </section>

    <!-- Profil Section -->
    <section id="profil" class="profil-section">
        <div class="container-fluid p-0">
            <div class="row g-0 align-items-stretch">
                <div class="col-lg-6 profil-img"></div>
                <div class="col-lg-6 profil-text-container d-flex flex-column justify-content-center">
                    <div class="px-lg-5">
                        <div class="mb-4">
                            <span class="badge-custom">Tentang Kami</span>
                        </div>
                        <h2 class="display-5 fw-bold mb-4">Sejarah Sekolah Bhinneka</h2>
                        <div class="text-light opacity-75 fs-5 fw-light lh-lg">
                            <p>
                                Sekolah Bhinneka didirikan pada <span class="text-success fw-medium">17 Maret 2003</span> untuk memenuhi kebutuhan pendidikan berkualitas bagi masyarakat Perumahan Taman Walet dan sekitarnya. Sekolah ini tidak hanya berfokus pada prestasi akademik, tetapi juga pada pembentukan karakter, moral, dan nilai-nilai kebhinekaan sesuai semangat Bhinneka Tunggal Ika.
                            </p>
                            <p>
                                Sebagai lembaga pendidikan yang inklusif dan ramah anak, Sekolah Bhinneka berkomitmen mengembangkan potensi peserta didik secara optimal melalui tenaga pendidik yang profesional dan lingkungan belajar yang kondusif.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <div class="row g-4 text-center justify-content-center">
                <div class="col-md-4 col-sm-6">
                    <div class="stat-card">
                        <div class="display-4 fw-bold text-teal mb-2" style="color: #0d9488;">230</div>
                        <div class="text-secondary fw-semibold text-uppercase" style="font-size: 0.85rem; letter-spacing: 1px;">Siswa Aktif</div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="stat-card">
                        <div class="display-4 fw-bold text-success mb-2">15</div>
                        <div class="text-secondary fw-semibold text-uppercase" style="font-size: 0.85rem; letter-spacing: 1px;">Tenaga Pendidik</div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="stat-card">
                        <div class="display-4 fw-bold text-primary mb-2">23+</div>
                        <div class="text-secondary fw-semibold text-uppercase" style="font-size: 0.85rem; letter-spacing: 1px;">Tahun Berpengalaman</div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-8 mx-auto text-center">
                    <p class="text-secondary fs-5 fw-light lh-base">
                        Sekolah terus meningkatkan mutu pendidikan melalui inovasi pembelajaran, pengembangan fasilitas, dan berbagai kegiatan pembentukan karakter guna mencetak generasi yang cerdas, berakhlak mulia, dan siap menghadapi masa depan.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Fasilitas Section -->
    <section id="fasilitas" class="fasilitas-section">
        <div class="container">
            <div class="section-header">
                <span class="badge rounded-pill bg-teal text-teal fw-bold px-3 py-2 mb-3" style="background-color: #f0fdfa; color: #0d9488; letter-spacing: 1px; font-size: 0.75rem;">KENYAMANAN BELAJAR</span>
                <h2 class="section-title">Fasilitas Sekolah</h2>
                <p class="text-secondary fs-5 fw-light">Kami menyediakan sarana dan prasarana terbaik untuk mendukung proses pembelajaran serta kenyamanan seluruh warga Sekolah Bhinneka.</p>
            </div>

            <div class="row g-4">
                <!-- Fasilitas 1 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card card-custom border-0 h-100">
                        <div class="card-img-wrapper">
                            <img src="{{ asset('images/publicimagessekolah7.jpg') }}" alt="Ruang Belajar Mengajar">
                            <span class="card-badge" style="background-color: #0d9488;">Akademik</span>
                        </div>
                        <div class="card-body p-4 d-flex flex-column">
                            <h4 class="card-title fw-bold mb-3">Ruang Belajar Mengajar</h4>
                            <p class="card-text text-secondary fw-light flex-grow-1">Ruang kelas yang bersih, nyaman, dan dilengkapi fasilitas pembelajaran modern untuk mendukung efektivitas KBM sehari-hari.</p>
                        </div>
                    </div>
                </div>
                <!-- Fasilitas 2 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card card-custom border-0 h-100">
                        <div class="card-img-wrapper">
                            <img src="{{ asset('images/publicimagessekolah8.jpg') }}" alt="Ruang Pendaftaran">
                            <span class="card-badge bg-success">Pelayanan</span>
                        </div>
                        <div class="card-body p-4 d-flex flex-column">
                            <h4 class="card-title fw-bold mb-3">Ruang Pendaftaran</h4>
                            <p class="card-text text-secondary fw-light flex-grow-1">Pusat informasi dan administrasi PPDB yang representatif untuk melayani calon orang tua murid dengan ramah dan nyaman.</p>
                        </div>
                    </div>
                </div>
                <!-- Fasilitas 3 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card card-custom border-0 h-100">
                        <div class="card-img-wrapper">
                            <img src="{{ asset('images/publicimagessekolah9.jpg') }}" alt="Ruang Baca">
                            <span class="card-badge bg-primary">Literasi</span>
                        </div>
                        <div class="card-body p-4 d-flex flex-column">
                            <h4 class="card-title fw-bold mb-3">Ruang Baca (Perpustakaan)</h4>
                            <p class="card-text text-secondary fw-light flex-grow-1">Lingkungan tenang dengan koleksi buku referensi yang lengkap guna meningkatkan minat baca dan wawasan siswa.</p>
                        </div>
                    </div>
                </div>
                <!-- Fasilitas 4 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card card-custom border-0 h-100">
                        <div class="card-img-wrapper">
                            <img src="{{ asset('images/publicimagessekolah10.jpg') }}" alt="Ruang Kepala Sekolah">
                            <span class="card-badge bg-info text-dark">Manajemen</span>
                        </div>
                        <div class="card-body p-4 d-flex flex-column">
                            <h4 class="card-title fw-bold mb-3">Ruang Kepala Sekolah</h4>
                            <p class="card-text text-secondary fw-light flex-grow-1">Ruang kerja dan koordinasi kepala sekolah yang profesional untuk menjaga manajemen mutu pendidikan sekolah.</p>
                        </div>
                    </div>
                </div>
                <!-- Fasilitas 5 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card card-custom border-0 h-100">
                        <div class="card-img-wrapper">
                            <img src="{{ asset('images/publicimagessekolah11.jpg') }}" alt="Laboratorium Komputer">
                            <span class="card-badge bg-warning text-dark">Teknologi</span>
                        </div>
                        <div class="card-body p-4 d-flex flex-column">
                            <h4 class="card-title fw-bold mb-3">Laboratorium Komputer</h4>
                            <p class="card-text text-secondary fw-light flex-grow-1">Fasilitas komputer modern dengan koneksi internet cepat guna mendukung pembelajaran digital, TIK, dan ujian daring.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Visi Misi Section -->
    <section id="visi-misi" class="visi-misi-section">
        <div class="container-fluid p-0">
            <div class="row g-0 align-items-stretch flex-column-reverse flex-lg-row">
                <div class="col-lg-6 bg-white d-flex flex-column justify-content-center p-5">
                    <div class="px-lg-5 mx-auto" style="max-width: 600px;">
                        <span class="text-success fw-bold text-uppercase mb-2 d-block" style="letter-spacing: 1px; font-size: 0.85rem;">Arah & Tujuan</span>
                        <h2 class="display-5 fw-bold text-dark mb-5">Visi & Misi Sekolah</h2>

                        <div class="visi-box">
                            <h4 class="fw-bold mb-2 d-flex align-items-center gap-2">
                                <span style="width: 6px; height: 20px; background-color: #10b981; border-radius: 10px;"></span>
                                VISI Sekolah Bhinneka
                            </h4>
                            <p class="text-secondary fs-5 fst-italic mb-0">
                                "Menjadi lembaga pendidikan yang unggul dalam prestasi, berkarakter, dan menjunjung tinggi nilai-nilai kebhinekaan"
                            </p>
                        </div>

                        <div>
                            <h4 class="fw-bold mb-4 d-flex align-items-center gap-2">
                                <span style="width: 6px; height: 20px; background-color: #0d9488; border-radius: 10px;"></span>
                                MISI
                            </h4>
                            
                            <div class="d-flex align-items-start gap-3 mb-4">
                                <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center shadow-sm flex-shrink-0" style="width: 32px; height: 32px; font-weight: bold; font-size: 0.85rem;">1</div>
                                <p class="text-secondary m-0 pt-1">Menyelenggarakan pendidikan yang berkualitas dan berorientasi pada perkembangan siswa.</p>
                            </div>
                            
                            <div class="d-flex align-items-start gap-3 mb-4">
                                <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center shadow-sm flex-shrink-0" style="width: 32px; height: 32px; font-weight: bold; font-size: 0.85rem;">2</div>
                                <p class="text-secondary m-0 pt-1">Membentuk karakter siswa yang disiplin, jujur, dan bertanggung jawab.</p>
                            </div>
                            
                            <div class="d-flex align-items-start gap-3 mb-4">
                                <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center shadow-sm flex-shrink-0" style="width: 32px; height: 32px; font-weight: bold; font-size: 0.85rem;">3</div>
                                <p class="text-secondary m-0 pt-1">Mengembangkan potensi akademik dan non-akademik peserta didik.</p>
                            </div>
                            
                            <div class="d-flex align-items-start gap-3 mb-4">
                                <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center shadow-sm flex-shrink-0" style="width: 32px; height: 32px; font-weight: bold; font-size: 0.85rem;">4</div>
                                <p class="text-secondary m-0 pt-1">Menanamkan nilai toleransi dan kebersamaan dalam keberagaman.</p>
                            </div>
                            
                            <div class="d-flex align-items-start gap-3 mb-4">
                                <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center shadow-sm flex-shrink-0" style="width: 32px; height: 32px; font-weight: bold; font-size: 0.85rem;">5</div>
                                <p class="text-secondary m-0 pt-1">Menciptakan lingkungan belajar yang aman, nyaman, dan menyenangkan.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 visi-misi-img"></div>
            </div>
        </div>
    </section>

    <!-- Ekstrakurikuler Section -->
    <section id="ekstrakurikuler" class="ekskul-section">
        <div class="container">
            <div class="section-header">
                <span class="badge rounded-pill bg-success-subtle text-success fw-bold px-3 py-2 mb-3" style="letter-spacing: 1px; font-size: 0.75rem;">EKSPLORASI POTENSI DIRI</span>
                <h2 class="section-title">Ekstrakurikuler Utama</h2>
                <p class="text-secondary fs-5 fw-light">Wadah pengembangan karakter, mental juang, dan kedisiplinan tinggi bagi siswa Sekolah Bhinneka untuk bersiap menjadi pemimpin masa depan.</p>
            </div>

            <div class="row g-4 g-lg-5">
                <!-- Ekskul 1 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card card-custom border-0 h-100 bg-white">
                        <div class="card-img-wrapper" style="height: 260px;">
                            <img src="{{ asset('images/publicimagessekolah4.jpg') }}" alt="Pramuka">
                            <span class="card-badge bg-warning text-dark">Kepanduan</span>
                        </div>
                        <div class="card-body p-4 p-xl-5 d-flex flex-column">
                            <h3 class="fw-bold mb-3">Pramuka Wajib</h3>
                            <p class="card-text text-secondary fw-light flex-grow-1">Membentuk mental tangguh, kemandirian, kecintaan pada alam, serta melatih kecakapan hidup dan kepemimpinan berlandaskan Dasa Darma.</p>
                        </div>
                    </div>
                </div>
                <!-- Ekskul 2 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card card-custom border-0 h-100 bg-white">
                        <div class="card-img-wrapper" style="height: 260px;">
                            <img src="{{ asset('images/publicimagessekolah5.jpg') }}" alt="Karate">
                            <span class="card-badge bg-danger">Bela Diri</span>
                        </div>
                        <div class="card-body p-4 p-xl-5 d-flex flex-column">
                            <h3 class="fw-bold mb-3">Karate</h3>
                            <p class="card-text text-secondary fw-light flex-grow-1">Fokus pada pertahanan diri, kekuatan fisik, kontrol emosi, dan ketepatan strategi demi membangun integritas serta prestasi olahraga yang kompetitif.</p>
                        </div>
                    </div>
                </div>
                <!-- Ekskul 3 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card card-custom border-0 h-100 bg-white">
                        <div class="card-img-wrapper" style="height: 260px;">
                            <img src="{{ asset('images/publicimagessekolah6.jpg') }}" alt="Paskibra">
                            <span class="card-badge bg-primary">Formasi & Kedisiplinan</span>
                        </div>
                        <div class="card-body p-4 p-xl-5 d-flex flex-column">
                            <h3 class="fw-bold mb-3">Paskibra</h3>
                            <p class="card-text text-secondary fw-light flex-grow-1">Menanamkan rasa nasionalisme tinggi, merawat fokus akurasi gerakan baris-berbaris, serta membangun soliditas kerja sama kelompok yang solid.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>