<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPDB SEKOLAH BHINNEKA</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght=300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        html {
            scroll-behavior: smooth;
        }
        /* Efek garis bawah halus untuk menu navigasi saat di-hover */
        .nav-link {
            position: relative;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -4px;
            left: 0;
            background-color: #0d9488; /* warna teal-600 */
            transition: width 0.3s ease;
        }
        .nav-link:hover::after {
            width: 100%;
        }
    </style>
</head>

<body class="bg-gray-50 pt-20">

    <nav class="bg-white/95 backdrop-blur-md shadow-sm border-b border-slate-100 fixed top-0 left-0 right-0 z-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex justify-between items-center h-20">

                <a href="#" class="text-2xl font-bold text-teal-700 tracking-tight flex items-center gap-2 group">
                    <span class="bg-teal-700 text-white w-9 h-9 rounded-lg flex items-center justify-center text-lg font-black shadow-sm group-hover:bg-emerald-600 transition-colors">B</span>
                    SEKOLAH BHINNEKA
                </a>

                <div class="flex items-center gap-8">
                    
                    <div class="flex items-center gap-7 border-r border-slate-200 pr-8 hidden md:flex">
                        <a href="#" class="nav-link flex items-center gap-1 font-medium text-slate-600 hover:text-teal-600 transition-colors text-[15px]">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-slate-400">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21.75h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21.75h8.25" />
                            </svg>
                            Home
                        </a>

                        <a href="#profil" class="nav-link font-medium text-slate-600 hover:text-teal-600 transition-colors text-[15px]">
                            Profil
                        </a>

                        <a href="#fasilitas" class="nav-link font-medium text-slate-600 hover:text-teal-600 transition-colors text-[15px]">
                            Fasilitas
                        </a>

                        <a href="#visi-misi" class="nav-link font-medium text-slate-600 hover:text-teal-600 transition-colors text-[15px]">
                            Visi Misi
                        </a>

                        <a href="#ekstrakurikuler" class="nav-link font-medium text-slate-600 hover:text-teal-600 transition-colors text-[15px]">
                            Ekstrakurikuler
                        </a>
                    </div>

                    <div class="flex gap-3.5 items-center">
                        <a href="{{ route('login') }}" class="text-slate-700 hover:text-teal-600 font-semibold px-4 py-2.5 rounded-xl transition-all text-sm tracking-wide">
                            Login
                        </a>
                        
                        <a href="{{ route('register') }}" class="bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 text-white px-5 py-2.5 rounded-xl font-semibold shadow-md shadow-teal-600/10 hover:shadow-lg hover:shadow-teal-600/20 active:scale-[0.98] transition-all text-sm flex items-center gap-2 tracking-wide">
                            Daftar Sekarang
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                            </svg>
                        </a>
                    </div>

                </div>

            </div>
        </div>
    </nav>

    <section id="home" class="relative h-screen flex items-center justify-center overflow-hidden">
        <img src="{{ asset('images/publicimagessekolah.jpg') }}" alt="Gedung Sekolah Bhinneka" class="absolute inset-0 w-full h-full object-cover">
        
        <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-[1px]"></div>

        <div class="relative text-center text-white px-6 max-w-4xl z-10">
            <h1 class="text-5xl md:text-7xl font-extrabold mb-6 tracking-tight leading-tight">
                 SEKOLAH <span class="text-emerald-400">BHINNEKA</span>
            </h1>
            <p class="text-xl md:text-2xl font-light text-slate-200 tracking-wide">
                Pendaftaran Peserta Didik Baru Angkatan 2026 / 2027
            </p>
        </div>
    </section>

    <section id="profil" class="bg-slate-900 overflow-hidden">
        <div class="w-full grid lg:grid-cols-2 items-stretch min-h-[650px]">
            
            <div class="w-full h-80 md:h-[450px] lg:h-auto flex relative group">
                <img src="{{ asset('images/publicimagessekolah2.jpg') }}" class="w-full h-full object-cover object-center transition-transform duration-700 group-hover:scale-105" alt="Foto Profil Kegiatan Sekolah Bhinneka">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-900/50 via-transparent to-transparent"></div>
            </div>

            <div class="bg-gradient-to-br from-slate-900 via-teal-950 to-slate-900 text-white p-8 md:p-16 lg:p-24 flex flex-col justify-center">
                <div class="max-w-xl">
                    <span class="bg-emerald-500/20 text-emerald-400 border border-emerald-500/30 px-4 py-1.5 rounded-full w-fit text-sm font-semibold mb-6 inline-block tracking-wide uppercase">
                        Tentang Kami
                    </span>

                    <h2 class="text-4xl md:text-5xl font-bold mb-8 leading-tight tracking-tight">
                        Sejarah Sekolah Bhinneka
                    </h2>

                    <div class="space-y-6 text-base md:text-lg text-slate-300 leading-relaxed font-light">
                        <p>
                            Sekolah Bhinneka didirikan pada <span class="text-emerald-400 font-medium">17 Maret 2003</span> untuk memenuhi kebutuhan pendidikan berkualitas bagi masyarakat Perumahan Taman Walet dan sekitarnya. Sekolah ini tidak hanya berfokus pada prestasi akademik, tetapi juga pada pembentukan karakter, moral, dan nilai-nilai kebhinekaan sesuai semangat Bhinneka Tunggal Ika.
                        </p>
                        <p>
                            Sebagai lembaga pendidikan yang inklusif dan ramah anak, Sekolah Bhinneka berkomitmen mengembangkan potensi peserta didik secara optimal melalui tenaga pendidik yang profesional dan lingkungan belajar yang kondusif.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="bg-white py-16 shadow-inner relative z-10">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-8 text-center">
                
                <div class="p-6 bg-slate-50 rounded-2xl border border-slate-100 transition-all hover:shadow-md">
                    <div class="text-4xl font-extrabold text-teal-600 mb-2">230</div>
                    <div class="text-sm font-semibold text-slate-500 uppercase tracking-wider">Siswa Aktif</div>
                </div>

                <div class="p-6 bg-slate-50 rounded-2xl border border-slate-100 transition-all hover:shadow-md">
                    <div class="text-4xl font-extrabold text-emerald-600 mb-2">15</div>
                    <div class="text-sm font-semibold text-slate-500 uppercase tracking-wider">Tenaga Pendidik</div>
                </div>

                <div class="p-6 bg-slate-50 rounded-2xl border border-slate-100 transition-all hover:shadow-md">
                    <div class="text-4xl font-extrabold text-blue-600 mb-2">23+</div>
                    <div class="text-sm font-semibold text-slate-500 uppercase tracking-wider">Tahun Berpengalaman</div>
                </div>

            </div>

            <div class="mt-10 text-center max-w-2xl mx-auto">
                <p class="text-slate-600 text-sm md:text-base leading-relaxed font-light">
                    Sekolah terus meningkatkan mutu pendidikan melalui inovasi pembelajaran, pengembangan fasilitas, dan berbagai kegiatan pembentukan karakter guna mencetak generasi yang cerdas, berakhlak mulia, dan siap menghadapi masa depan.
                </p>
            </div>
        </div>
    </section>

    <section id="fasilitas" class="py-24 bg-white border-t border-slate-100">
        <div class="max-w-7xl mx-auto px-6">
            
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-teal-600 font-bold uppercase tracking-widest text-xs bg-teal-50 px-4 py-2 rounded-full mb-3 inline-block">
                    Kenyamanan Belajar
                </span>
                <h2 class="text-3xl md:text-5xl font-extrabold text-slate-900 mb-5 tracking-tight">
                    Fasilitas Sekolah
                </h2>
                <p class="text-slate-600 text-base md:text-lg font-light leading-relaxed">
                    Kami menyediakan sarana dan prasarana terbaik untuk mendukung proses pembelajaran serta kenyamanan seluruh warga Sekolah Bhinneka.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                <div class="bg-slate-50 rounded-3xl overflow-hidden border border-slate-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col group">
                    <div class="h-52 overflow-hidden relative">
                        <img src="{{ asset('images/publicimagessekolah7.jpg') }}" alt="Ruang Kegiatan Belajar Mengajar" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <span class="absolute top-4 left-4 bg-teal-600 text-white text-[11px] font-semibold uppercase tracking-wider px-3 py-1 rounded-xl">Akademik</span>
                    </div>
                    <div class="p-6 flex-1 flex flex-col justify-between">
                        <div>
                            <h3 class="text-xl font-bold text-slate-900 mb-2">Ruang Belajar Mengajar</h3>
                            <p class="text-slate-600 text-sm font-light leading-relaxed">Ruang kelas yang bersih, nyaman, dan dilengkapi fasilitas pembelajaran modern untuk mendukung efektivitas KBM sehari-hari.</p>
                        </div>
                    </div>
                </div>

                <div class="bg-slate-50 rounded-3xl overflow-hidden border border-slate-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col group">
                    <div class="h-52 overflow-hidden relative">
                        <img src="{{ asset('images/publicimagessekolah8.jpg') }}" alt="Ruang Pendaftaran PPDB" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <span class="absolute top-4 left-4 bg-emerald-600 text-white text-[11px] font-semibold uppercase tracking-wider px-3 py-1 rounded-xl">Pelayanan</span>
                    </div>
                    <div class="p-6 flex-1 flex flex-col justify-between">
                        <div>
                            <h3 class="text-xl font-bold text-slate-900 mb-2">Ruang Pendaftaran</h3>
                            <p class="text-slate-600 text-sm font-light leading-relaxed">Pusat informasi dan administrasi PPDB yang representatif untuk melayani calon orang tua murid dengan ramah dan nyaman.</p>
                        </div>
                    </div>
                </div>

                <div class="bg-slate-50 rounded-3xl overflow-hidden border border-slate-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col group">
                    <div class="h-52 overflow-hidden relative">
                        <img src="{{ asset('images/publicimagessekolah9.jpg') }}" alt="Ruang Baca Perpustakaan" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <span class="absolute top-4 left-4 bg-blue-600 text-white text-[11px] font-semibold uppercase tracking-wider px-3 py-1 rounded-xl">Literasi</span>
                    </div>
                    <div class="p-6 flex-1 flex flex-col justify-between">
                        <div>
                            <h3 class="text-xl font-bold text-slate-900 mb-2">Ruang Baca (Perpustakaan)</h3>
                            <p class="text-slate-600 text-sm font-light leading-relaxed">Lingkungan tenang dengan koleksi buku referensi yang lengkap guna meningkatkan minat baca dan wawasan siswa.</p>
                        </div>
                    </div>
                </div>

                <div class="bg-slate-50 rounded-3xl overflow-hidden border border-slate-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col group">
                    <div class="h-52 overflow-hidden relative">
                        <img src="{{ asset('images/publicimagessekolah10.jpg') }}" alt="Ruang Kepala Sekolah" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <span class="absolute top-4 left-4 bg-purple-600 text-white text-[11px] font-semibold uppercase tracking-wider px-3 py-1 rounded-xl">Manajemen</span>
                    </div>
                    <div class="p-6 flex-1 flex flex-col justify-between">
                        <div>
                            <h3 class="text-xl font-bold text-slate-900 mb-2">Ruang Kepala Sekolah</h3>
                            <p class="text-slate-600 text-sm font-light leading-relaxed">Ruang kerja dan koordinasi kepala sekolah yang profesional untuk menjaga manajemen mutu pendidikan sekolah.</p>
                        </div>
                    </div>
                </div>

                <div class="bg-slate-50 rounded-3xl overflow-hidden border border-slate-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col group">
                    <div class="h-52 overflow-hidden relative">
                        <img src="{{ asset('images/publicimagessekolah11.jpg') }}" alt="Laboratorium Komputer" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <span class="absolute top-4 left-4 bg-amber-600 text-white text-[11px] font-semibold uppercase tracking-wider px-3 py-1 rounded-xl">Teknologi</span>
                    </div>
                    <div class="p-6 flex-1 flex flex-col justify-between">
                        <div>
                            <h3 class="text-xl font-bold text-slate-900 mb-2">Laboratorium Komputer</h3>
                            <p class="text-slate-600 text-sm font-light leading-relaxed">Fasilitas komputer modern dengan koneksi internet cepat guna mendukung pembelajaran digital, TIK, dan ujian daring.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section id="visi-misi" class="bg-slate-50 overflow-hidden border-t border-b border-slate-100">
        <div class="w-full grid lg:grid-cols-2 items-stretch min-h-[550px]">
            
            <div class="p-8 md:p-16 lg:p-24 flex flex-col justify-center bg-white order-2 lg:order-1">
                <div class="max-w-xl w-full mx-auto lg:mr-0">
                    
                    <span class="text-emerald-600 font-semibold uppercase tracking-wider text-sm mb-2 inline-block">
                        Arah & Tujuan
                    </span>
                    <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-8">
                        Visi & Misi Sekolah
                    </h2>

                    <div class="mb-8 bg-gradient-to-r from-teal-50 to-emerald-50/30 p-6 rounded-2xl border-l-4 border-emerald-500 shadow-sm">
                        <h3 class="text-lg font-bold text-slate-800 mb-2 flex items-center gap-2">
                            <span class="w-1.5 h-4 bg-emerald-500 rounded-full"></span>
                            Visi Kami
                        </h3>
                        <p class="text-base md:text-lg text-slate-700 leading-relaxed font-medium italic">
                            "Menjadi sekolah unggul dalam prestasi, berkarakter kuat, dan memegang teguh nilai-nilai luhur kebhinekaan."
                        </p>
                    </div>

                    <div>
                        <h3 class="text-lg font-bold text-slate-800 mb-4 flex items-center gap-2">
                            <span class="w-1.5 h-4 bg-teal-500 rounded-full"></span>
                            Misi Kami
                        </h3>
                        
                        <div class="space-y-4">
                            <div class="flex gap-4 items-start">
                                <span class="flex-shrink-0 w-7 h-7 rounded-full bg-emerald-600 text-white flex items-center justify-center font-bold text-xs shadow-md shadow-emerald-200">
                                    1
                                </span>
                                <p class="text-sm md:text-base text-slate-600 leading-relaxed pt-0.5">
                                    Menyelenggarakan sistem pendidikan yang inovatif, berkualitas, dan adaptif terhadap perkembangan zaman.
                                </p>
                            </div>

                            <div class="flex gap-4 items-start">
                                <span class="flex-shrink-0 w-7 h-7 rounded-full bg-emerald-600 text-white flex items-center justify-center font-bold text-xs shadow-md shadow-emerald-200">
                                    2
                                </span>
                                <p class="text-sm md:text-base text-slate-600 leading-relaxed pt-0.5">
                                    Membentuk karakter peserta didik yang disiplin, berintegritas, berakhlak mulia, serta toleran terhadap sesama.
                                </p>
                            </div>

                            <div class="flex gap-4 items-start">
                                <span class="flex-shrink-0 w-7 h-7 rounded-full bg-emerald-600 text-white flex items-center justify-center font-bold text-xs shadow-md shadow-emerald-200">
                                    3
                                </span>
                                <p class="text-sm md:text-base text-slate-600 leading-relaxed pt-0.5">
                                    Menggali dan meningkatkan potensi prestasi akademik maupun non-akademik siswa di kancah global.
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="w-full h-80 md:h-[450px] lg:h-auto flex order-1 lg:order-2">
                <img src="{{ asset('images/publicimagessekolah3.jpg') }}" class="w-full h-full object-cover object-center" alt="Visi Misi Sekolah Bhinneka">
            </div>

        </div>
    </section>

    <section id="ekstrakurikuler" class="py-24 bg-slate-50">
        <div class="max-w-7xl mx-auto px-6">
            
            <div class="text-center max-w-3xl mx-auto mb-20">
                <span class="text-emerald-600 font-bold uppercase tracking-widest text-xs bg-emerald-100/60 px-4 py-2 rounded-full mb-3 inline-block">
                    Eksplorasi Potensi Diri
                </span>
                <h2 class="text-3xl md:text-5xl font-extrabold text-slate-900 mb-5 tracking-tight">
                    Ekstrakurikuler Utama
                </h2>
                <p class="text-slate-600 text-base md:text-lg font-light leading-relaxed">
                    Wadah pengembangan karakter, mental juang, dan kedisiplinan tinggi bagi siswa Sekolah Bhinneka untuk bersiap menjadi pemimpin masa depan.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8 lg:gap-10">
                
                <div class="bg-white rounded-[2rem] overflow-hidden shadow-sm hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 group flex flex-col border border-slate-100">
                    <div class="h-64 overflow-hidden relative">
                        <img src="{{ asset('images/publicimagessekolah4.jpg') }}" alt="Ekstrakurikuler Pramuka Bhinneka" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
                        <span class="absolute top-5 left-5 bg-amber-600 text-white text-[11px] font-bold uppercase tracking-wider px-3.5 py-1.5 rounded-xl shadow-md">
                            Kepanduan
                        </span>
                    </div>
                    <div class="p-8 flex-1 flex flex-col justify-between">
                        <div>
                            <h3 class="text-2xl font-bold text-slate-900 mb-3 group-hover:text-amber-600 transition-colors">
                                Pramuka Wajib
                            </h3>
                            <p class="text-slate-600 text-sm font-light leading-relaxed">
                                Membentuk mental tangguh, kemandirian, kecintaan pada alam, serta melatih kecakapan hidup dan kepemimpinan berlandaskan Dasa Darma.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-[2rem] overflow-hidden shadow-sm hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 group flex flex-col border border-slate-100">
                    <div class="h-64 overflow-hidden relative">
                        <img src="{{ asset('images/publicimagessekolah5.jpg') }}" alt="Ekstrakurikuler Karate Bhinneka" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
                        <span class="absolute top-5 left-5 bg-red-600 text-white text-[11px] font-bold uppercase tracking-wider px-3.5 py-1.5 rounded-xl shadow-md">
                            Bela Diri
                        </span>
                    </div>
                    <div class="p-8 flex-1 flex flex-col justify-between">
                        <div>
                            <h3 class="text-2xl font-bold text-slate-900 mb-3 group-hover:text-red-600 transition-colors">
                                Karate
                            </h3>
                            <p class="text-slate-600 text-sm font-light leading-relaxed">
                                Fokus pada pertahanan diri, kekuatan fisik, kontrol emosi, dan ketepatan strategi demi membangun integritas serta prestasi olahraga yang kompetitif.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-[2rem] overflow-hidden shadow-sm hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 group flex flex-col border border-slate-100">
                    <div class="h-64 overflow-hidden relative">
                        <img src="{{ asset('images/publicimagessekolah6.jpg') }}" alt="Ekstrakurikuler Paskibra" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
                        <span class="absolute top-5 left-5 bg-blue-600 text-white text-[11px] font-bold uppercase tracking-wider px-3.5 py-1.5 rounded-xl shadow-md">
                            Formasi & Kedisiplinan
                        </span>
                    </div>
                    <div class="p-8 flex-1 flex flex-col justify-between">
                        <div>
                            <h3 class="text-2xl font-bold text-slate-900 mb-3 group-hover:text-blue-600 transition-colors">
                                Paskibra
                            </h3>
                            <p class="text-slate-600 text-sm font-light leading-relaxed">
                                Menanamkan rasa nasionalisme tinggi, merawat fokus akurasi gerakan baris-berbaris, serta membangun soliditas kerja sama kelompok yang solid.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

</body>
</html>