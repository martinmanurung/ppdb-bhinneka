@extends('layouts.guest')

@section('title', 'Beranda')

@section('hero')
    <h1 class="text-3xl lg:text-5xl font-bold leading-tight mb-4">PPDB Sekolah Bhinneka</h1>
    <p class="text-teal-50 text-lg mb-8">Pendaftaran Peserta Didik Baru secara online — mudah, terstruktur, dan transparan untuk orang tua calon siswa.</p>
    <div class="grid grid-cols-2 gap-3 text-sm">
        <div class="bg-white/10 rounded-xl p-4 text-center">
            <p class="text-2xl font-bold">4</p>
            <p class="text-teal-100 mt-1">Langkah mudah</p>
        </div>
        <div class="bg-white/10 rounded-xl p-4 text-center">
            <p class="text-2xl font-bold">100%</p>
            <p class="text-teal-100 mt-1">Online</p>
        </div>
    </div>
@endsection

@section('content')
    @auth
        @if (auth()->user()->isStudent())
            <div class="text-center">
                <h2 class="text-2xl font-bold text-slate-900 mb-2">Halo, {{ auth()->user()->name }}!</h2>
                <p class="text-slate-500 mb-6">Lanjutkan proses pendaftaran PPDB Anda.</p>
                <a href="{{ route('student.dashboard') }}"
                    class="inline-flex items-center justify-center w-full py-3.5 rounded-xl font-semibold text-white bg-gradient-to-r from-teal-600 to-emerald-600 hover:from-teal-700 hover:to-emerald-700">
                    Ke Dashboard Pendaftaran
                </a>
            </div>
        @else
            <div class="text-center">
                <p class="text-slate-600 mb-4">Anda sudah masuk ke sistem.</p>
                <a href="{{ route('admin.dashboard') }}"
                    class="inline-flex items-center justify-center w-full py-3.5 rounded-xl font-semibold text-white bg-slate-700 hover:bg-slate-800">
                    Buka Panel
                </a>
            </div>
        @endif
    @else
        <h2 class="text-2xl font-bold text-slate-900 mb-2 text-center">Mulai Pendaftaran</h2>
        <p class="text-slate-500 text-sm text-center mb-6">Daftar akun baru atau masuk jika sudah punya akun.</p>

        <div class="space-y-3 mb-8">
            <a href="{{ route('register') }}"
                class="flex items-center justify-center gap-2 w-full py-3.5 rounded-xl font-semibold text-white bg-gradient-to-r from-teal-600 to-emerald-600 hover:from-teal-700 hover:to-emerald-700 shadow-lg">
                <i class="fas fa-user-plus"></i> Daftar Akun Baru
            </a>
            <a href="{{ route('login') }}"
                class="flex items-center justify-center gap-2 w-full py-3.5 rounded-xl font-semibold text-teal-700 bg-teal-50 border border-teal-200 hover:bg-teal-100">
                <i class="fas fa-sign-in-alt"></i> Sudah Punya Akun? Masuk
            </a>
        </div>

        <div class="rounded-2xl bg-slate-50 border border-slate-100 p-5">
            <h3 class="font-bold text-slate-800 mb-4 text-sm">Alur Pendaftaran</h3>
            <ol class="space-y-3 text-sm text-slate-600">
                <li class="flex gap-3">
                    <span class="w-6 h-6 rounded-full bg-teal-600 text-white text-xs flex items-center justify-center shrink-0 font-bold">1</span>
                    <span><strong class="text-slate-800">Daftar akun</strong> — email & WhatsApp aktif</span>
                </li>
                <li class="flex gap-3">
                    <span class="w-6 h-6 rounded-full bg-teal-600 text-white text-xs flex items-center justify-center shrink-0 font-bold">2</span>
                    <span><strong class="text-slate-800">Isi biodata</strong> calon siswa</span>
                </li>
                <li class="flex gap-3">
                    <span class="w-6 h-6 rounded-full bg-teal-600 text-white text-xs flex items-center justify-center shrink-0 font-bold">3</span>
                    <span><strong class="text-slate-800">Data ayah & ibu</strong> (wali opsional)</span>
                </li>
                <li class="flex gap-3">
                    <span class="w-6 h-6 rounded-full bg-teal-600 text-white text-xs flex items-center justify-center shrink-0 font-bold">4</span>
                    <span><strong class="text-slate-800">Serahkan berkas</strong> fisik ke sekolah sesuai checklist</span>
                </li>
            </ol>
        </div>

        <p class="text-center text-xs text-slate-400 mt-6">
            Pertanyaan? Hubungi <strong class="text-slate-600">admin@bhinneka.sch.id</strong>
        </p>
    @endauth
@endsection
