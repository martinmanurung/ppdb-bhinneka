@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="max-w-5xl mx-auto space-y-8">
    <div class="text-center">
        <h1 class="text-4xl font-bold text-blue-700">Login PPDB</h1>
        <p class="mt-2 text-gray-600">Gunakan satu akun untuk masuk sebagai calon pendaftar atau admin. Sistem akan mengarahkan Anda sesuai role.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-blue-100 border border-blue-200 rounded-2xl p-6 shadow-sm">
            <div class="text-4xl mb-4">🎓</div>
            <h2 class="text-2xl font-bold text-gray-900">Untuk Calon Pendaftar</h2>
            <p class="mt-2 text-gray-700">Masuk untuk melengkapi formulir pendaftaran online, lalu serahkan berkas fisik ke sekolah.</p>
            <ul class="mt-4 space-y-2 text-sm text-gray-700">
                <li>• Isi data pribadi calon siswa</li>
                <li>• Lengkapi data orang tua / wali</li>
                <li>• Kirim formulir & bawa berkas ke sekolah</li>
            </ul>
        </div>

        <div class="bg-green-100 border border-green-200 rounded-2xl p-6 shadow-sm">
            <div class="text-4xl mb-4">👨‍💼</div>
            <h2 class="text-2xl font-bold text-gray-900">Untuk Admin</h2>
            <p class="mt-2 text-gray-700">Masuk untuk mencetak formulir, verifikasi berkas fisik, dan mengubah status pendaftaran.</p>
            <ul class="mt-4 space-y-2 text-sm text-gray-700">
                <li>• Cetak formulir pendaftar</li>
                <li>• Cocokkan data dengan berkas fisik</li>
                <li>• Update status setelah pembayaran</li>
            </ul>
        </div>
    </div>

    <div class="max-w-md mx-auto bg-white p-8 rounded-2xl shadow-lg border border-gray-100">
        <h2 class="text-2xl font-bold mb-2 text-center">Masuk ke Sistem</h2>
        <p class="text-center text-gray-500 mb-6">Akun akan diarahkan otomatis sesuai role Anda.</p>

        <form action="{{ route('login') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="login" class="block text-sm font-medium text-gray-700">Email / No. WhatsApp</label>
                <input type="text" id="login" name="login" value="{{ old('login') }}" required placeholder="contoh: user@email.com atau 08xxxxxxxxxx"
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2 @error('login') border-red-500 @enderror">
                @error('login')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password" required
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2 @error('password') border-red-500 @enderror">
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex items-center">
                <input type="checkbox" id="remember" name="remember"
                    class="rounded border-gray-300">
                <label for="remember" class="ml-2 text-sm text-gray-700">Ingat saya</label>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700">
                Login
            </button>
        </form>

        <p class="text-center mt-4">
            Belum punya akun? <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Daftar di sini</a>
        </p>
    </div>
</div>
@endsection
