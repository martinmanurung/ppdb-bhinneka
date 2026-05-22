@extends('layouts.admin')

@section('title', 'Export Data')

@section('header')
    <h1 class="text-xl font-bold text-slate-900">Export Data Pendaftar</h1>
    <p class="text-sm text-slate-500">Unduh rekap data dalam format CSV (dapat dibuka di Microsoft Excel)</p>
@endsection

@section('content')
<div class="max-w-2xl">
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 lg:p-8">
        <div class="flex items-start gap-4 mb-6 p-4 bg-emerald-50 border border-emerald-100 rounded-xl">
            <div class="w-12 h-12 bg-emerald-100 rounded-xl flex items-center justify-center text-emerald-600 shrink-0">
                <i class="fas fa-file-excel text-xl"></i>
            </div>
            <div>
                <p class="font-semibold text-emerald-900">Format file CSV</p>
                <p class="text-sm text-emerald-800 mt-1">
                    Berisi biodata siswa, kontak, data orang tua, status, dan tanggal pendaftaran.
                    Hanya pendaftar yang sudah <strong>submit formulir online</strong> yang diekspor.
                </p>
            </div>
        </div>

        <form action="{{ route('admin.export.download') }}" method="GET" class="space-y-5">
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Filter Status</label>
                <select name="status" class="w-full border border-slate-300 rounded-xl px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">Semua status (yang sudah submit)</option>
                    @foreach ($statuses as $value => $label)
                        <option value="{{ $value }}" {{ request('status') === $value ? 'selected' : '' }}>
                            {{ $label }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="grid grid-cols-2 gap-3 text-sm text-slate-600 bg-slate-50 rounded-xl p-4">
                <div>
                    <p class="text-slate-400 text-xs uppercase">Total siap export</p>
                    <p class="text-2xl font-bold text-slate-900">{{ $exportableCount }}</p>
                </div>
                <div>
                    <p class="text-slate-400 text-xs uppercase">Terverifikasi</p>
                    <p class="text-2xl font-bold text-green-600">{{ $verifiedCount }}</p>
                </div>
            </div>

            <button type="submit" class="w-full flex items-center justify-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold py-3 rounded-xl transition">
                <i class="fas fa-download"></i>
                Unduh Excel (CSV)
            </button>
        </form>
    </div>

    <div class="mt-6 bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
        <h2 class="font-bold text-slate-900 mb-3">Kolom yang disertakan</h2>
        <p class="text-sm text-slate-600 leading-relaxed">
            No, Nama Lengkap, Nama Panggilan, NISN, Jenjang, Jenis Kelamin, Tempat/Tanggal Lahir,
            Agama, Alamat, Kota, Provinsi, Asal Sekolah, Email, WhatsApp, Nama Ayah, Nama Ibu,
            Nama Wali, Status, Tanggal Submit Online, Tanggal Terdaftar.
        </p>
    </div>
</div>
@endsection
