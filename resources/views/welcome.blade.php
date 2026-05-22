@extends('layouts.app')

@section('title', 'PPDB Bhinneka')

@section('content')
<div class="relative overflow-hidden rounded-3xl bg-white shadow-2xl border border-blue-100">
    <div class="absolute inset-0 bg-gradient-to-br from-blue-50 via-white to-emerald-50"></div>
    <div class="relative px-6 py-12 md:px-12 md:py-16">
        <div class="max-w-5xl mx-auto text-center">
            <div class="inline-flex items-center gap-2 rounded-full bg-blue-100 px-4 py-2 text-sm font-semibold text-blue-700 mb-6">
                <span>PPDB Sekolah Bhinneka</span>
            </div>
            <h1 class="text-5xl md:text-6xl font-black tracking-tight text-blue-700 mb-4">PPDB Sekolah Bhinneka</h1>
            <p class="text-lg md:text-xl text-gray-600 max-w-2xl mx-auto">Sistem Penerimaan Peserta Didik Baru yang rapi, cepat, dan mudah dipahami oleh calon pendaftar maupun admin.</p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 my-12 text-left">
                <div class="rounded-3xl bg-blue-50 border border-blue-100 p-8 shadow-sm">
                    <div class="text-5xl mb-4">🎓</div>
                    <h2 class="text-3xl font-bold mb-2 text-gray-900">Untuk Calon Siswa</h2>
                    <p class="text-gray-600 mb-6">Daftar, lengkapi biodata dan data orang tua secara online, lalu serahkan berkas fisik ke sekolah.</p>
                    @auth
                        @if (auth()->user()->isStudent())
                            <a href="{{ route('student.dashboard') }}" class="inline-flex items-center justify-center bg-blue-600 text-white px-6 py-3 rounded-xl font-semibold hover:bg-blue-700">
                                Ke Dashboard
                            </a>
                        @else
                            <span class="inline-flex items-center rounded-full bg-white px-4 py-2 text-sm text-gray-500 border border-blue-100">Anda login sebagai Admin</span>
                        @endif
                    @else
                        <a href="{{ route('register') }}" class="inline-flex items-center justify-center bg-blue-600 text-white px-6 py-3 rounded-xl font-semibold hover:bg-blue-700">
                            Daftar Sekarang
                        </a>
                    @endauth
                </div>

                <div class="rounded-3xl bg-emerald-50 border border-emerald-100 p-8 shadow-sm">
                    <div class="text-5xl mb-4">👨‍💼</div>
                    <h2 class="text-3xl font-bold mb-2 text-gray-900">Untuk Admin</h2>
                    <p class="text-gray-600 mb-6">Cetak formulir online, verifikasi berkas fisik, dan ubah status pendaftaran setelah pembayaran.</p>
                    @auth
                        @if (auth()->user()->isAdmin())
                            <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center justify-center bg-emerald-600 text-white px-6 py-3 rounded-xl font-semibold hover:bg-emerald-700">
                                Ke Dashboard Admin
                            </a>
                        @else
                            <span class="inline-flex items-center rounded-full bg-white px-4 py-2 text-sm text-gray-500 border border-emerald-100">Anda login sebagai Siswa</span>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="inline-flex items-center justify-center bg-emerald-600 text-white px-6 py-3 rounded-xl font-semibold hover:bg-emerald-700">
                            Login Admin / Pendaftar
                        </a>
                    @endauth
                </div>
            </div>

            @guest
                <div class="rounded-3xl bg-white/80 border border-gray-100 p-8 shadow-sm backdrop-blur">
                    <h2 class="text-2xl font-bold mb-6 text-gray-900">Alur Pendaftaran</h2>
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                        <div class="space-y-2">
                            <div class="bg-blue-600 text-white rounded-2xl w-14 h-14 flex items-center justify-center mx-auto font-bold text-xl">1</div>
                            <p class="font-semibold text-gray-900">Daftar Akun</p>
                            <p class="text-sm text-gray-600">Buat akun dengan email dan WhatsApp</p>
                        </div>
                        <div class="space-y-2">
                            <div class="bg-blue-600 text-white rounded-2xl w-14 h-14 flex items-center justify-center mx-auto font-bold text-xl">2</div>
                            <p class="font-semibold text-gray-900">Isi Biodata</p>
                            <p class="text-sm text-gray-600">Lengkapi data diri Anda</p>
                        </div>
                        <div class="space-y-2">
                            <div class="bg-blue-600 text-white rounded-2xl w-14 h-14 flex items-center justify-center mx-auto font-bold text-xl">3</div>
                            <p class="font-semibold text-gray-900">Isi Data Orangtua</p>
                            <p class="text-sm text-gray-600">Tambahkan data orangtua/wali</p>
                        </div>
                        <div class="space-y-2">
                            <div class="bg-blue-600 text-white rounded-2xl w-14 h-14 flex items-center justify-center mx-auto font-bold text-xl">4</div>
                            <p class="font-semibold text-gray-900">Serahkan Berkas</p>
                            <p class="text-sm text-gray-600">Bawa KK, Akta, dan Ijazah ke sekolah</p>
                        </div>
                    </div>
                </div>
            @endguest

            <div class="mt-8 text-gray-600 text-sm">
                <p>Untuk pertanyaan, hubungi: <strong>admin@bhinneka.sch.id</strong></p>
            </div>
        </div>
    </div>
</div>
@endsection
