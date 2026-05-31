@extends('layouts.guest')

@section('title', 'Daftar Akun')

@section('hero')
    <h1 class="text-3xl lg:text-4xl font-bold leading-tight mb-4">Daftar PPDB Online</h1>
    <p class="text-teal-50 text-lg mb-8">Buat akun untuk orang tua/wali calon siswa. Proses cepat dan bisa dilanjutkan kapan saja.</p>
    <div class="space-y-3 text-sm">
        <div class="flex items-center gap-2 bg-white/10 rounded-xl px-4 py-3">
            <i class="fas fa-check-circle text-emerald-300"></i>
            <span>Gratis — tanpa biaya pendaftaran online</span>
        </div>
        <div class="flex items-center gap-2 bg-white/10 rounded-xl px-4 py-3">
            <i class="fas fa-check-circle text-emerald-300"></i>
            <span>Data wali murid bersifat opsional</span>
        </div>
        <div class="flex items-center gap-2 bg-white/10 rounded-xl px-4 py-3">
            <i class="fas fa-check-circle text-emerald-300"></i>
            <span>Berkas fisik diserahkan langsung ke sekolah</span>
        </div>
    </div>
@endsection

@section('content')
    <h2 class="text-2xl font-bold text-slate-900 mb-1">Buat Akun Baru</h2>
    <p class="text-slate-500 text-sm mb-8">Isi data akun orang tua/wali yang akan mengurus pendaftaran.</p>

    <form action="{{ route('register') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="name" class="block text-sm font-medium text-slate-700 mb-1">Nama Lengkap (Orang Tua/Wali)</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required
                class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-teal-500 focus:border-teal-500 @error('name') border-red-400 @enderror">
            @error('name')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-slate-700 mb-1">Email Aktif</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required
                class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-teal-500 focus:border-teal-500 @error('email') border-red-400 @enderror">
            @error('email')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="whatsapp" class="block text-sm font-medium text-slate-700 mb-1">Nomor WhatsApp</label>
            <input type="text" id="whatsapp" name="whatsapp" value="{{ old('whatsapp') }}"
                placeholder="08xxxxxxxxxx" required
                class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-teal-500 focus:border-teal-500 @error('whatsapp') border-red-400 @enderror">
            @error('whatsapp')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-slate-700 mb-1">Password</label>
            <input type="password" id="password" name="password" required
                class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-teal-500 focus:border-teal-500 @error('password') border-red-400 @enderror">
            <p class="text-xs text-slate-400 mt-1">Minimal 8 karakter</p>
            @error('password')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-slate-700 mb-1">Konfirmasi Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required
                class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-teal-500 focus:border-teal-500">
        </div>

        <button type="submit"
            class="w-full py-3.5 rounded-xl font-semibold text-white bg-gradient-to-r from-teal-600 to-emerald-600 hover:from-teal-700 hover:to-emerald-700 shadow-lg shadow-teal-500/25 transition mt-2">
            Daftar Sekarang
        </button>
    </form>

    <p class="text-center mt-8 text-sm text-slate-600">
        Sudah punya akun?
        <a href="{{ route('login') }}" class="font-semibold text-teal-600 hover:text-teal-700">Masuk di sini</a>
    </p>

    <p class="text-center mt-4">
        <a href="{{ route('home') }}" class="text-sm text-slate-400 hover:text-teal-600"><i class="fas fa-arrow-left mr-1"></i> Kembali ke beranda</a>
    </p>
@endsection
