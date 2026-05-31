@extends('layouts.guest')

@section('title', 'Masuk')

@section('hero')
    <h1 class="text-3xl lg:text-4xl font-bold leading-tight mb-4">Selamat datang kembali!</h1>
    <p class="text-teal-50 text-lg mb-8">Masuk untuk melanjutkan pendaftaran calon siswa PPDB Sekolah Bhinneka.</p>
    <ul class="space-y-4 text-sm">
        <li class="flex items-start gap-3">
            <span class="w-8 h-8 rounded-lg bg-white/15 flex items-center justify-center shrink-0"><i class="fas fa-user"></i></span>
            <span>Lengkapi biodata calon siswa</span>
        </li>
        <li class="flex items-start gap-3">
            <span class="w-8 h-8 rounded-lg bg-white/15 flex items-center justify-center shrink-0"><i class="fas fa-users"></i></span>
            <span>Isi data ayah & ibu (wali opsional)</span>
        </li>
        <li class="flex items-start gap-3">
            <span class="w-8 h-8 rounded-lg bg-white/15 flex items-center justify-center shrink-0"><i class="fas fa-school"></i></span>
            <span>Kirim formulir & serahkan berkas ke sekolah</span>
        </li>
    </ul>
@endsection

@section('content')
    <h2 class="text-2xl font-bold text-slate-900 mb-1">Masuk Akun</h2>
    <p class="text-slate-500 text-sm mb-8">Gunakan email atau nomor WhatsApp yang terdaftar.</p>

    <form action="{{ route('login') }}" method="POST" class="space-y-5">
        @csrf

        <div>
            <label for="login" class="block text-sm font-medium text-slate-700 mb-1">Email / No. WhatsApp</label>
            <div class="relative">
                <i class="fas fa-envelope absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
                <input type="text" id="login" name="login" value="{{ old('login') }}" required
                    placeholder="user@email.com atau 08xxxxxxxxxx"
                    class="w-full pl-10 pr-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-teal-500 focus:border-teal-500 @error('login') border-red-400 @enderror">
            </div>
            @error('login')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-slate-700 mb-1">Password</label>
            <div class="relative">
                <i class="fas fa-lock absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
                <input type="password" id="password" name="password" required
                    class="w-full pl-10 pr-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-teal-500 focus:border-teal-500 @error('password') border-red-400 @enderror">
            </div>
            @error('password')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <label class="flex items-center gap-2 cursor-pointer">
            <input type="checkbox" id="remember" name="remember" class="rounded border-slate-300 text-teal-600">
            <span class="text-sm text-slate-600">Ingat saya</span>
        </label>

        <button type="submit"
            class="w-full py-3.5 rounded-xl font-semibold text-white bg-gradient-to-r from-teal-600 to-emerald-600 hover:from-teal-700 hover:to-emerald-700 shadow-lg shadow-teal-500/25 transition">
            Masuk
        </button>
    </form>

    <p class="text-center mt-8 text-sm text-slate-600">
        Belum punya akun?
        <a href="{{ route('register') }}" class="font-semibold text-teal-600 hover:text-teal-700">Daftar sekarang</a>
    </p>

    <p class="text-center mt-4">
        <a href="{{ route('home') }}" class="text-sm text-slate-400 hover:text-teal-600"><i class="fas fa-arrow-left mr-1"></i> Kembali ke beranda</a>
    </p>
@endsection
