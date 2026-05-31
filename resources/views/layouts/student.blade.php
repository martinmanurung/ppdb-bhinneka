<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - PPDB Bhinneka</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 min-h-screen">
    <div class="flex min-h-screen">
        {{-- Sidebar --}}
        <aside class="hidden lg:flex lg:flex-col w-72 bg-gradient-to-b from-teal-800 via-teal-700 to-emerald-800 text-white shrink-0 shadow-xl">
            <div class="p-6 border-b border-white/10">
                <a href="{{ route('student.dashboard') }}" class="block">
                    <div class="flex items-center gap-3">
                        <div class="w-11 h-11 rounded-2xl bg-white/15 flex items-center justify-center text-xl">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <div>
                            <p class="text-xs text-teal-100 uppercase tracking-wider">Portal Orang Tua</p>
                            <p class="font-bold text-lg leading-tight">PPDB Bhinneka</p>
                        </div>
                    </div>
                </a>
            </div>

            <nav class="flex-1 p-4 space-y-1">
                <a href="{{ route('student.dashboard') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition
                    {{ request()->routeIs('student.dashboard') ? 'bg-white/20 text-white shadow-lg' : 'text-teal-50 hover:bg-white/10' }}">
                    <i class="fas fa-home w-5 text-center"></i>
                    Beranda
                </a>
                <a href="{{ route('student.form.biodata') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition
                    {{ request()->routeIs('student.form.biodata') ? 'bg-white/20 text-white shadow-lg' : 'text-teal-50 hover:bg-white/10' }}">
                    <i class="fas fa-user w-5 text-center"></i>
                    Biodata Siswa
                </a>
                <a href="{{ route('student.form.parents') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition
                    {{ request()->routeIs('student.form.parents') ? 'bg-white/20 text-white shadow-lg' : 'text-teal-50 hover:bg-white/10' }}">
                    <i class="fas fa-users w-5 text-center"></i>
                    Data Orang Tua
                </a>
                <a href="{{ route('student.form.konfirmasi') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition
                    {{ request()->routeIs('student.form.konfirmasi') ? 'bg-white/20 text-white shadow-lg' : 'text-teal-50 hover:bg-white/10' }}">
                    <i class="fas fa-paper-plane w-5 text-center"></i>
                    Kirim Formulir
                </a>
                <a href="{{ route('student.berkas') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition
                    {{ request()->routeIs('student.berkas') ? 'bg-white/20 text-white shadow-lg' : 'text-teal-50 hover:bg-white/10' }}">
                    <i class="fas fa-folder-open w-5 text-center"></i>
                    Berkas Persyaratan
                </a>

                <div class="pt-4 mt-4 border-t border-white/10">
                    <p class="px-4 text-xs uppercase tracking-wider text-teal-200 mb-2">Dokumen</p>
                    <a href="{{ route('student.surat-pernyataan') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium bg-amber-400/20 text-amber-50 border border-amber-300/30 hover:bg-amber-400/30 transition">
                        <i class="fas fa-file-pdf w-5 text-center text-amber-200"></i>
                        Unduh Surat Pernyataan
                    </a>
                </div>
            </nav>

            <div class="p-4 border-t border-white/10">
                <p class="text-xs text-teal-200">Halo,</p>
                <p class="text-sm font-semibold truncate">{{ auth()->user()->name }}</p>
                <form action="{{ route('logout') }}" method="POST" class="mt-3">
                    @csrf
                    <button type="submit" class="w-full text-left text-sm text-red-200 hover:text-white transition">
                        <i class="fas fa-sign-out-alt mr-2"></i> Keluar
                    </button>
                </form>
            </div>
        </aside>

        <div class="flex-1 flex flex-col min-w-0">
            {{-- Top bar mobile --}}
            <header class="lg:hidden bg-gradient-to-r from-teal-700 to-emerald-700 text-white px-4 py-4 flex items-center justify-between">
                <div>
                    <p class="text-xs text-teal-100">PPDB Bhinneka</p>
                    <p class="font-bold">@yield('title')</p>
                </div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-sm bg-white/20 px-3 py-1 rounded-lg">Keluar</button>
                </form>
            </header>

            <div class="lg:hidden bg-white border-b px-2 py-2 flex gap-1 overflow-x-auto text-xs">
                <a href="{{ route('student.dashboard') }}" class="px-3 py-1.5 rounded-lg whitespace-nowrap {{ request()->routeIs('student.dashboard') ? 'bg-teal-600 text-white' : 'text-gray-600' }}">Beranda</a>
                <a href="{{ route('student.form.biodata') }}" class="px-3 py-1.5 rounded-lg whitespace-nowrap {{ request()->routeIs('student.form.biodata') ? 'bg-teal-600 text-white' : 'text-gray-600' }}">Biodata</a>
                <a href="{{ route('student.form.parents') }}" class="px-3 py-1.5 rounded-lg whitespace-nowrap {{ request()->routeIs('student.form.parents') ? 'bg-teal-600 text-white' : 'text-gray-600' }}">Ortu</a>
                <a href="{{ route('student.berkas') }}" class="px-3 py-1.5 rounded-lg whitespace-nowrap {{ request()->routeIs('student.berkas') ? 'bg-teal-600 text-white' : 'text-gray-600' }}">Berkas</a>
                <a href="{{ route('student.surat-pernyataan') }}" class="px-3 py-1.5 rounded-lg whitespace-nowrap text-amber-700 bg-amber-50">Surat PDF</a>
            </div>

            @if ($errors->any())
                <div class="mx-4 mt-4 lg:mx-8">
                    <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-2xl text-sm">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            @if (session('success'))
                <div class="mx-4 mt-4 lg:mx-8">
                    <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-2xl flex items-center gap-2 text-sm">
                        <i class="fas fa-check-circle"></i>
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            @if (session('error'))
                <div class="mx-4 mt-4 lg:mx-8">
                    <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-2xl text-sm">{{ session('error') }}</div>
                </div>
            @endif

            @if (session('info'))
                <div class="mx-4 mt-4 lg:mx-8">
                    <div class="bg-blue-50 border border-blue-200 text-blue-800 px-4 py-3 rounded-2xl text-sm">{{ session('info') }}</div>
                </div>
            @endif

            <main class="flex-1 p-4 lg:p-8 max-w-5xl">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
