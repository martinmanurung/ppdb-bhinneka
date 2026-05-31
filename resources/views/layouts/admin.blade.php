<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Admin PPDB Bhinneka</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-slate-100 min-h-screen">
@php
    $statusFilter = request('status');
    $isAntrianBerkas = request()->routeIs('admin.applicants.index')
        && $statusFilter === \App\Models\Pendaftaran::STATUS_MENUNGGU_BERKAS;
    $isDaftarCalonSiswa = request()->routeIs('admin.applicants.show', 'admin.applicants.print')
        || (request()->routeIs('admin.applicants.index') && ! $isAntrianBerkas);
@endphp
    <div class="flex min-h-screen">
        <aside class="hidden lg:flex lg:flex-col w-64 bg-slate-900 text-white shrink-0">
            <div class="p-6 border-b border-slate-700">
                <a href="{{ route('admin.dashboard') }}" class="block">
                    <p class="text-xs uppercase tracking-widest text-slate-400">Panel Admin</p>
                    <p class="text-xl font-bold mt-1">PPDB Bhinneka</p>
                </a>
            </div>

            <nav class="flex-1 p-4 space-y-1">
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition
                    {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600 text-white' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                    <i class="fas fa-chart-pie w-5 text-center"></i>
                    Dashboard
                </a>
                <a href="{{ route('admin.applicants.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition
                    {{ $isDaftarCalonSiswa ? 'bg-blue-600 text-white' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                    <i class="fas fa-user-graduate w-5 text-center"></i>
                    Daftar Calon Siswa
                </a>
                <a href="{{ route('admin.applicants.index', ['status' => \App\Models\Pendaftaran::STATUS_MENUNGGU_BERKAS]) }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition
                    {{ $isAntrianBerkas ? 'bg-amber-500 text-white' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                    <i class="fas fa-folder-open w-5 text-center"></i>
                    Antrian Berkas
                    @if (($adminNavCounts['waiting'] ?? 0) > 0)
                        <span class="ml-auto {{ $isAntrianBerkas ? 'bg-white text-amber-600' : 'bg-amber-500 text-white' }} text-xs font-bold px-2 py-0.5 rounded-full">
                            {{ $adminNavCounts['waiting'] }}
                        </span>
                    @endif
                </a>
                <a href="{{ route('admin.export') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition
                    {{ request()->routeIs('admin.export*') ? 'bg-blue-600 text-white' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                    <i class="fas fa-file-excel w-5 text-center"></i>
                    Export Data
                </a>
            </nav>

            <div class="p-4 border-t border-slate-700">
                <p class="text-xs text-slate-400 mb-1">Login sebagai</p>
                <p class="text-sm font-semibold truncate">{{ auth()->user()->name }}</p>
                <form action="{{ route('logout') }}" method="POST" class="mt-3">
                    @csrf
                    <button type="submit" class="w-full text-left text-sm text-red-300 hover:text-red-200">
                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                    </button>
                </form>
            </div>
        </aside>

        <div class="flex-1 flex flex-col min-w-0">
            <header class="bg-white border-b border-slate-200 px-4 py-3 lg:px-8 flex items-center justify-between gap-4">
                <div class="lg:hidden">
                    <p class="font-bold text-slate-900">PPDB Admin</p>
                </div>
                <div class="hidden lg:block flex-1">
                    @hasSection('header')
                        @yield('header')
                    @endif
                </div>
                <a href="{{ route('home') }}" class="text-sm text-slate-500 hover:text-blue-600" title="Beranda">
                    <i class="fas fa-home"></i>
                </a>
            </header>

            <div class="lg:hidden bg-slate-900 px-4 py-2 flex gap-2 overflow-x-auto">
                <a href="{{ route('admin.dashboard') }}" class="text-xs whitespace-nowrap px-3 py-1.5 rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600 text-white' : 'text-slate-300' }}">Dashboard</a>
                <a href="{{ route('admin.applicants.index') }}" class="text-xs whitespace-nowrap px-3 py-1.5 rounded-lg {{ $isDaftarCalonSiswa ? 'bg-blue-600 text-white' : 'text-slate-300' }}">Calon Siswa</a>
                <a href="{{ route('admin.applicants.index', ['status' => \App\Models\Pendaftaran::STATUS_MENUNGGU_BERKAS]) }}" class="text-xs whitespace-nowrap px-3 py-1.5 rounded-lg {{ $isAntrianBerkas ? 'bg-amber-500 text-white' : 'text-slate-300' }}">Antrian</a>
                <a href="{{ route('admin.export') }}" class="text-xs whitespace-nowrap px-3 py-1.5 rounded-lg {{ request()->routeIs('admin.export*') ? 'bg-blue-600 text-white' : 'text-slate-300' }}">Export</a>
            </div>

            @if ($errors->any())
                <div class="mx-4 mt-4 lg:mx-8">
                    <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-xl">
                        <p class="font-semibold mb-1">Terjadi kesalahan:</p>
                        <ul class="list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            @if (session('success'))
                <div class="mx-4 mt-4 lg:mx-8">
                    <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-xl flex items-center gap-2">
                        <i class="fas fa-check-circle"></i>
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            @if (session('error'))
                <div class="mx-4 mt-4 lg:mx-8">
                    <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-xl">
                        {{ session('error') }}
                    </div>
                </div>
            @endif

            <main class="flex-1 p-4 lg:p-8">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
