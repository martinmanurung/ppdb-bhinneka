@extends('layouts.app')

@section('title', 'Dashboard Siswa')

@section('content')
<div class="max-w-4xl mx-auto">
    <h1 class="text-4xl font-bold mb-6">Dashboard PPDB</h1>

    @php
        $statusVerifikasi = $student->status_verifikasi ?? \App\Models\Student::STATUS_BELUM_SUBMIT;
    @endphp

    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
        <div class="bg-blue-100 border border-blue-300 rounded-lg p-4 text-center">
            <p class="text-gray-700">Biodata</p>
            <p class="text-sm {{ $registrationProgress['biodata'] ? 'text-green-600 font-bold' : 'text-red-600' }}">
                {{ $registrationProgress['biodata'] ? '✓ Selesai' : '✗ Belum' }}
            </p>
        </div>
        <div class="bg-green-100 border border-green-300 rounded-lg p-4 text-center">
            <p class="text-gray-700">Orangtua/Wali</p>
            <p class="text-sm {{ $registrationProgress['parents'] ? 'text-green-600 font-bold' : 'text-red-600' }}">
                {{ $registrationProgress['parents'] ? '✓ Selesai' : '✗ Belum' }}
            </p>
        </div>
        <div class="bg-yellow-100 border border-yellow-300 rounded-lg p-4 text-center">
            <p class="text-gray-700">Kirim Online</p>
            <p class="text-sm {{ $registrationProgress['submitted'] ? 'text-green-600 font-bold' : 'text-red-600' }}">
                {{ $registrationProgress['submitted'] ? '✓ Terkirim' : '✗ Belum' }}
            </p>
        </div>
        <div class="bg-purple-100 border border-purple-300 rounded-lg p-4 text-center">
            <p class="text-gray-700">Verifikasi Sekolah</p>
            <p class="text-sm {{ $registrationProgress['verified'] ? 'text-green-600 font-bold' : 'text-orange-600' }}">
                {{ $registrationProgress['verified'] ? '✓ Terverifikasi' : '⏳ Proses' }}
            </p>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6 mb-6">
        <h2 class="text-2xl font-bold mb-4">Status Pendaftaran</h2>
        <p class="text-gray-700 mb-4">
            <strong>Status:</strong>
            <span class="px-3 py-1 rounded-full text-white font-bold text-sm
                {{ $statusVerifikasi === 'Terverifikasi' ? 'bg-green-500' : '' }}
                {{ $statusVerifikasi === 'Ditolak' ? 'bg-red-500' : '' }}
                {{ $statusVerifikasi === 'Menunggu Penyerahan Berkas' ? 'bg-amber-500' : '' }}
                {{ $statusVerifikasi === 'Belum Submit' ? 'bg-gray-500' : '' }}
            ">
                {{ $statusVerifikasi }}
            </span>
        </p>

        @if ($statusVerifikasi === 'Menunggu Penyerahan Berkas')
            <div class="bg-amber-50 border border-amber-200 text-amber-900 px-4 py-3 rounded text-sm">
                <p class="font-semibold mb-1">Langkah selanjutnya</p>
                <p>Datang ke sekolah membawa berkas fisik: KK, Akta Kelahiran, dan Ijazah/SKL. Admin akan mencetak formulir online Anda dan mencocokkannya dengan berkas asli.</p>
            </div>
        @elseif ($statusVerifikasi === 'Terverifikasi')
            <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded text-sm">
                Pendaftaran Anda telah diverifikasi. Proses pendaftaran selesai.
            </div>
        @endif

        @if ($student && $student->status_verifikasi === 'Ditolak' && $student->alasan_penolakan)
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mt-4">
                <strong>Alasan Penolakan:</strong>
                <p>{{ $student->alasan_penolakan }}</p>
            </div>
        @endif
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
        <div class="bg-white rounded-lg shadow p-4 flex items-center justify-between">
            <div>
                <div class="font-bold">Data Pribadi</div>
                <p class="text-sm {{ $registrationProgress['biodata'] ? 'text-green-600' : 'text-gray-400' }}">
                    {{ $registrationProgress['biodata'] ? 'Sudah Diisi' : 'Belum Diisi' }}
                </p>
            </div>
            @if (!$student || $student->canEditForms())
                <a href="{{ route('student.form.biodata') }}" class="bg-blue-500 text-white px-3 py-1 rounded">Isi Data</a>
            @endif
        </div>

        <div class="bg-white rounded-lg shadow p-4 flex items-center justify-between">
            <div>
                <div class="font-bold">Data Orangtua/Wali</div>
                <div class="text-sm {{ $registrationProgress['parents'] ? 'text-green-600' : 'text-gray-400' }}">
                    {{ $registrationProgress['parents'] ? 'Sudah Diisi' : 'Belum Diisi' }}
                </div>
            </div>
            @if ($registrationProgress['biodata'] && (!$student || $student->canEditForms()))
                <a href="{{ route('student.form.parents') }}" class="bg-indigo-500 text-white px-3 py-1 rounded">Isi Data</a>
            @endif
        </div>
    </div>

    @if ($registrationProgress['parents'])
        <a href="{{ route('student.form.konfirmasi') }}"
            class="block w-full py-3 rounded text-center font-semibold bg-blue-600 text-white hover:bg-blue-700">
            {{ $student && $student->hasSubmittedOnline() ? 'Lihat Status Pengiriman' : 'Kirim Formulir Pendaftaran' }}
        </a>
    @endif
</div>
@endsection
