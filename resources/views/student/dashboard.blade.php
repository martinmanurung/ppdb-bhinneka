@extends('layouts.student')

@section('title', 'Beranda')

@section('content')
@php
    $status = $pendaftaran->status ?? \App\Models\Pendaftaran::STATUS_BELUM_SUBMIT;
    $canEdit = $pendaftaran?->canEditForms() ?? true;
    $steps = [
        ['label' => 'Biodata', 'done' => $registrationProgress['biodata'], 'icon' => 'fa-user', 'route' => 'student.form.biodata'],
        ['label' => 'Orang Tua', 'done' => $registrationProgress['parents'], 'icon' => 'fa-users', 'route' => 'student.form.parents'],
        ['label' => 'Kirim Online', 'done' => $registrationProgress['submitted'], 'icon' => 'fa-paper-plane', 'route' => 'student.form.konfirmasi'],
        ['label' => 'Verifikasi', 'done' => $registrationProgress['verified'], 'icon' => 'fa-school', 'route' => null],
    ];
@endphp

<div class="mb-8">
    <h1 class="text-2xl lg:text-3xl font-bold text-slate-900">Selamat datang, {{ auth()->user()->name }}!</h1>
    <p class="text-slate-600 mt-1">Pantau progres pendaftaran PPDB Sekolah Bhinneka di sini.</p>
</div>

@if ($pendaftaran)
    <div class="bg-gradient-to-r from-teal-600 to-emerald-600 text-white rounded-2xl p-6 mb-6 shadow-lg">
        <p class="text-teal-100 text-sm">Nomor Pendaftaran</p>
        <p class="text-2xl font-bold tracking-wide">{{ $pendaftaran->nomor_pendaftaran }}</p>
    </div>
@endif

{{-- Progress stepper --}}
<div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 mb-6">
    <h2 class="font-bold text-slate-800 mb-4">Progres Pendaftaran</h2>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
        @foreach ($steps as $step)
            <div class="relative rounded-xl p-4 text-center border-2 transition
                {{ $step['done'] ? 'border-emerald-200 bg-emerald-50' : 'border-slate-100 bg-slate-50' }}">
                <div class="w-10 h-10 mx-auto rounded-full flex items-center justify-center mb-2
                    {{ $step['done'] ? 'bg-emerald-500 text-white' : 'bg-slate-200 text-slate-500' }}">
                    <i class="fas {{ $step['icon'] }}"></i>
                </div>
                <p class="text-sm font-semibold text-slate-700">{{ $step['label'] }}</p>
                <p class="text-xs mt-1 {{ $step['done'] ? 'text-emerald-600 font-medium' : 'text-slate-400' }}">
                    {{ $step['done'] ? 'Selesai' : 'Belum' }}
                </p>
            </div>
        @endforeach
    </div>
</div>

<div class="grid lg:grid-cols-3 gap-6 mb-6">
    <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-slate-100 p-6">
        <h2 class="font-bold text-slate-800 mb-3">Status Pendaftaran</h2>
        @php
            $statusColors = [
                'Terverifikasi' => 'bg-emerald-100 text-emerald-800 border-emerald-200',
                'Ditolak' => 'bg-red-100 text-red-800 border-red-200',
                'Menunggu Penyerahan Berkas' => 'bg-amber-100 text-amber-800 border-amber-200',
                'Belum Submit' => 'bg-slate-100 text-slate-700 border-slate-200',
            ];
        @endphp
        <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full text-sm font-semibold border {{ $statusColors[$status] ?? 'bg-slate-100' }}">
            <i class="fas fa-circle text-[8px]"></i>
            {{ $status }}
        </span>

        @if ($status === 'Menunggu Penyerahan Berkas')
            <div class="mt-4 bg-amber-50 border border-amber-200 rounded-xl p-4 text-sm text-amber-900">
                <p class="font-semibold flex items-center gap-2"><i class="fas fa-map-marker-alt"></i> Langkah selanjutnya</p>
                <p class="mt-2">Datang ke sekolah membawa seluruh berkas persyaratan sesuai daftar di bawah.</p>
            </div>
        @elseif ($status === 'Terverifikasi')
            <div class="mt-4 bg-emerald-50 border border-emerald-200 rounded-xl p-4 text-sm text-emerald-800">
                <i class="fas fa-check-circle mr-1"></i> Pendaftaran Anda telah diverifikasi. Proses pendaftaran selesai.
            </div>
        @endif

        @if ($pendaftaran && $status === 'Ditolak' && $pendaftaran->alasan_penolakan)
            <div class="mt-4 bg-red-50 border border-red-200 rounded-xl p-4 text-sm text-red-800">
                <strong>Alasan penolakan:</strong>
                <p class="mt-1">{{ $pendaftaran->alasan_penolakan }}</p>
            </div>
        @endif
    </div>

    <div class="bg-gradient-to-br from-amber-50 to-orange-50 border border-amber-200 rounded-2xl p-6">
        <div class="w-12 h-12 rounded-xl bg-amber-500 text-white flex items-center justify-center mb-3">
            <i class="fas fa-file-pdf text-xl"></i>
        </div>
        <h3 class="font-bold text-amber-900">Surat Pernyataan</h3>
        <p class="text-sm text-amber-800 mt-2">Unduh template, isi, tandatangani bermeterai Rp10.000 (poin f & g).</p>
        <a href="{{ route('student.surat-pernyataan') }}"
            class="mt-4 inline-flex items-center gap-2 bg-amber-500 hover:bg-amber-600 text-white text-sm font-semibold px-4 py-2.5 rounded-xl transition">
            <i class="fas fa-download"></i> Unduh PDF
        </a>
    </div>
</div>

@include('student.partials.berkas-panel', ['compact' => false, 'showDownload' => true, 'class' => 'mb-6'])

<div class="grid md:grid-cols-2 gap-4 mb-6">
    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-5 flex items-center justify-between gap-4">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-teal-100 text-teal-600 flex items-center justify-center">
                <i class="fas fa-user text-lg"></i>
            </div>
            <div>
                <p class="font-bold text-slate-800">Biodata Siswa</p>
                <p class="text-sm {{ $registrationProgress['biodata'] ? 'text-emerald-600' : 'text-slate-400' }}">
                    {{ $registrationProgress['biodata'] ? 'Sudah diisi' : 'Belum diisi' }}
                </p>
            </div>
        </div>
        @if ($canEdit)
            <a href="{{ route('student.form.biodata') }}" class="shrink-0 bg-teal-600 hover:bg-teal-700 text-white text-sm font-medium px-4 py-2 rounded-xl">Isi</a>
        @endif
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-5 flex items-center justify-between gap-4">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-indigo-100 text-indigo-600 flex items-center justify-center">
                <i class="fas fa-users text-lg"></i>
            </div>
            <div>
                <p class="font-bold text-slate-800">Data Orang Tua</p>
                <p class="text-sm {{ $registrationProgress['parents'] ? 'text-emerald-600' : 'text-slate-400' }}">
                    {{ $registrationProgress['parents'] ? 'Sudah diisi' : 'Belum diisi' }}
                </p>
            </div>
        </div>
        @if ($registrationProgress['biodata'] && $canEdit)
            <a href="{{ route('student.form.parents') }}" class="shrink-0 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium px-4 py-2 rounded-xl">Isi</a>
        @endif
    </div>
</div>

@if ($registrationProgress['parents'])
    <a href="{{ route('student.form.konfirmasi') }}"
        class="block w-full py-4 rounded-2xl text-center font-semibold bg-gradient-to-r from-teal-600 to-emerald-600 text-white hover:from-teal-700 hover:to-emerald-700 shadow-lg transition">
        <i class="fas fa-paper-plane mr-2"></i>
        {{ $pendaftaran && $pendaftaran->hasSubmittedOnline() ? 'Lihat Status Pengiriman' : 'Kirim Formulir Pendaftaran' }}
    </a>
@endif
@endsection
