@extends('layouts.student')

@section('title', 'Berkas Persyaratan')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold text-slate-900 mb-1">Berkas Persyaratan Calon Siswa</h1>
    <p class="text-slate-600 text-sm">
        Daftar berkas fisik yang harus dibawa ke sekolah. Berkas <strong>tidak diunggah online</strong> — serahkan langsung saat kedatangan ke sekolah.
    </p>
</div>

<div class="grid lg:grid-cols-3 gap-6">
    <div class="lg:col-span-2">
        @include('student.partials.berkas-panel', ['compact' => false, 'showDownload' => true])
    </div>

    <div class="space-y-4">
        <div class="bg-gradient-to-br from-amber-50 to-orange-50 border border-amber-200 rounded-2xl p-5">
            <h3 class="font-bold text-amber-900 mb-2"><i class="fas fa-file-pdf mr-1"></i> Surat Pernyataan</h3>
            <p class="text-sm text-amber-800 mb-4">
                Poin <strong>f</strong> dan <strong>g</strong> memerlukan surat pernyataan yang ditandatangani dan bermeterai Rp10.000.
            </p>
            <a href="{{ route('student.surat-pernyataan') }}"
                class="inline-flex items-center justify-center gap-2 w-full py-2.5 rounded-xl bg-amber-500 hover:bg-amber-600 text-white text-sm font-semibold">
                <i class="fas fa-download"></i> Unduh Template PDF
            </a>
        </div>

        <div class="bg-teal-50 border border-teal-200 rounded-2xl p-5 text-sm text-teal-900">
            <p class="font-semibold mb-2"><i class="fas fa-info-circle mr-1"></i> Tips</p>
            <ul class="space-y-2 text-teal-800 text-xs">
                <li>• Fotokopi berkas poin a–e masing-masing <strong>2 lembar</strong></li>
                <li>• SKTB TK (poin d) hanya untuk pendaftar masuk <strong>SD kelas I</strong></li>
                <li>• Foto 3×4 (poin e) diserahkan setelah mendapat seragam sekolah</li>
                <li>• Bawa juga formulir online yang sudah dicetak (jika diminta sekolah)</li>
            </ul>
        </div>

        <a href="{{ route('student.dashboard') }}" class="block text-center text-sm text-teal-600 hover:text-teal-700 font-medium">
            <i class="fas fa-arrow-left mr-1"></i> Kembali ke Beranda
        </a>
    </div>
</div>
@endsection
