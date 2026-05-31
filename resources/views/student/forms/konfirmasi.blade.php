@extends('layouts.student')

@section('title', 'Kirim Formulir')

@section('content')
<div>
    <h1 class="text-2xl font-bold text-slate-900 mb-1">Kirim Formulir Pendaftaran</h1>
    <p class="text-sm text-teal-700 bg-teal-50 inline-block px-3 py-1 rounded-lg mb-6">No. Pendaftaran: <strong>{{ $pendaftaran->nomor_pendaftaran }}</strong></p>

    @if ($pendaftaran->hasSubmittedOnline())
        <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-2xl px-5 py-4 mb-6">
            <p class="font-bold flex items-center gap-2"><i class="fas fa-check-circle"></i> Formulir sudah dikirim</p>
            <p class="mt-2 text-sm">{{ $pendaftaran->submitted_at->format('d F Y, H:i') }} WIB</p>
            <p class="mt-2">Status: <strong>{{ $pendaftaran->status }}</strong></p>
            <p class="mt-3 text-sm">Silakan datang ke sekolah membawa seluruh berkas persyaratan sesuai daftar di bawah.</p>
            <div class="mt-4 pt-4 border-t border-emerald-200">
                @include('student.partials.berkas-panel', ['compact' => false, 'showDownload' => true, 'class' => 'border-0 shadow-none p-0 bg-transparent'])
            </div>
        </div>
    @else
        <div class="bg-blue-50 border border-blue-200 text-blue-900 rounded-2xl px-5 py-4 mb-6 text-sm">
            <p class="font-semibold mb-2">Setelah mengirim formulir online:</p>
            <ol class="list-decimal list-inside space-y-1">
                <li>Status menjadi <strong>Menunggu Penyerahan Berkas</strong></li>
                <li>Unduh dan tandatangani <a href="{{ route('student.surat-pernyataan') }}" class="underline font-medium">surat pernyataan</a></li>
                <li>Datang ke sekolah dengan berkas fisik + surat pernyataan</li>
                <li>Admin verifikasi data dan menerima pembayaran administrasi</li>
            </ol>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 mb-6">
            <h2 class="font-bold text-slate-800 mb-4">Ringkasan Data</h2>
            <dl class="grid sm:grid-cols-2 gap-3 text-sm">
                <div><dt class="text-slate-500">Nama</dt><dd class="font-semibold">{{ $student->nama_lengkap }}</dd></div>
                <div><dt class="text-slate-500">Asal Sekolah</dt><dd class="font-semibold">{{ $student->asal_sekolah }}</dd></div>
                <div><dt class="text-slate-500">Jenjang</dt><dd class="font-semibold">{{ $student->jenjang ?? '-' }}</dd></div>
            </dl>
        </div>

        @include('student.partials.berkas-panel', ['compact' => false, 'showDownload' => true, 'variant' => 'amber', 'class' => 'mb-6'])

        <form action="{{ route('student.form.submit') }}" method="POST" class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6">
            @csrf
            <label class="flex items-start gap-3 cursor-pointer">
                <input type="checkbox" name="konfirmasi" value="1" required class="mt-1 rounded border-slate-300 text-teal-600">
                <span class="text-slate-700 text-sm">
                    Saya menyatakan bahwa data yang saya isi sudah benar dan siap menyerahkan berkas persyaratan ke sekolah.
                </span>
            </label>
            @error('konfirmasi')
                <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
            @enderror
            <div class="flex flex-col sm:flex-row gap-3 mt-6">
                <a href="{{ route('student.form.parents') }}" class="flex-1 bg-slate-100 text-slate-700 py-3 rounded-xl text-center font-medium hover:bg-slate-200">Kembali</a>
                <button type="submit" class="flex-1 bg-gradient-to-r from-teal-600 to-emerald-600 text-white py-3 rounded-xl font-semibold hover:from-teal-700 hover:to-emerald-700">
                    Kirim Formulir
                </button>
            </div>
        </form>
    @endif
</div>
@endsection
