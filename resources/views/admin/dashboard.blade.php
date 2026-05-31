@extends('layouts.admin')

@section('title', 'Dashboard')

@section('header')
    <h1 class="text-xl font-bold text-slate-900">Dashboard Verifikator</h1>
    <p class="text-sm text-slate-500">Pantau pendaftaran, proses verifikasi berkas fisik, dan pembayaran</p>
@endsection

@section('content')
<div class="space-y-8">
    {{-- Alur kerja --}}
    <div class="bg-gradient-to-r from-slate-900 via-blue-900 to-sky-800 rounded-2xl p-6 lg:p-8 text-white shadow-xl">
        <p class="text-sky-200 text-xs uppercase tracking-widest font-semibold mb-2">Alur Admin (AGENTS)</p>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-4">
            <div class="bg-white/10 rounded-xl p-4 backdrop-blur">
                <span class="text-2xl font-black text-sky-300">1</span>
                <p class="font-semibold mt-2 text-sm">Cetak Formulir</p>
                <p class="text-xs text-slate-300 mt-1">Data yang sudah diisi online</p>
            </div>
            <div class="bg-white/10 rounded-xl p-4 backdrop-blur">
                <span class="text-2xl font-black text-sky-300">2</span>
                <p class="font-semibold mt-2 text-sm">Cocokkan Berkas</p>
                <p class="text-xs text-slate-300 mt-1">Cek kelengkapan berkas fisik</p>
            </div>
            <div class="bg-white/10 rounded-xl p-4 backdrop-blur">
                <span class="text-2xl font-black text-sky-300">3</span>
                <p class="font-semibold mt-2 text-sm">Terima Pembayaran</p>
                <p class="text-xs text-slate-300 mt-1">Administrasi di sekolah</p>
            </div>
            <div class="bg-white/10 rounded-xl p-4 backdrop-blur">
                <span class="text-2xl font-black text-sky-300">4</span>
                <p class="font-semibold mt-2 text-sm">Terverifikasi</p>
                <p class="text-xs text-slate-300 mt-1">Ubah status di sistem</p>
            </div>
        </div>
    </div>

    {{-- Statistik --}}
    <div class="grid grid-cols-2 lg:grid-cols-5 gap-4">
        <a href="{{ route('admin.applicants.index') }}" class="bg-white rounded-2xl border border-slate-200 p-5 shadow-sm hover:border-blue-300 transition group">
            <p class="text-3xl font-black text-blue-600 group-hover:scale-105 transition-transform">{{ $stats['submitted'] }}</p>
            <p class="text-sm text-slate-600 mt-1">Sudah Submit Online</p>
        </a>
        <a href="{{ route('admin.applicants.index', ['status' => \App\Models\Pendaftaran::STATUS_MENUNGGU_BERKAS]) }}"
            class="bg-white rounded-2xl border border-amber-200 p-5 shadow-sm hover:border-amber-400 transition group">
            <p class="text-3xl font-black text-amber-600">{{ $stats['waiting_documents'] }}</p>
            <p class="text-sm text-slate-600 mt-1">Menunggu Berkas</p>
        </a>
        <a href="{{ route('admin.applicants.index', ['status' => \App\Models\Pendaftaran::STATUS_TERVERIFIKASI]) }}"
            class="bg-white rounded-2xl border border-green-200 p-5 shadow-sm hover:border-green-400 transition">
            <p class="text-3xl font-black text-green-600">{{ $stats['verified'] }}</p>
            <p class="text-sm text-slate-600 mt-1">Terverifikasi</p>
        </a>
        <a href="{{ route('admin.applicants.index', ['status' => \App\Models\Pendaftaran::STATUS_DITOLAK]) }}"
            class="bg-white rounded-2xl border border-red-200 p-5 shadow-sm hover:border-red-400 transition">
            <p class="text-3xl font-black text-red-600">{{ $stats['rejected'] }}</p>
            <p class="text-sm text-slate-600 mt-1">Ditolak</p>
        </a>
        <div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-sm col-span-2 lg:col-span-1">
            <p class="text-3xl font-black text-slate-500">{{ $stats['draft'] }}</p>
            <p class="text-sm text-slate-600 mt-1">Belum Submit</p>
        </div>
    </div>

    {{-- Tabel pendaftar --}}
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="px-6 py-4 border-b border-slate-100 flex flex-wrap items-center justify-between gap-3">
            <div>
                <h2 class="text-lg font-bold text-slate-900">Antrian Verifikasi</h2>
                <p class="text-sm text-slate-500">Calon siswa yang sudah submit formulir online</p>
            </div>
            <div class="flex gap-2">
                <a href="{{ route('admin.applicants.index', ['status' => \App\Models\Pendaftaran::STATUS_MENUNGGU_BERKAS]) }}"
                    class="text-sm bg-amber-100 text-amber-800 px-3 py-1.5 rounded-lg font-medium hover:bg-amber-200">
                    <i class="fas fa-folder-open mr-1"></i> Antrian Berkas
                </a>
                <a href="{{ route('admin.applicants.index') }}" class="text-sm text-blue-600 font-medium hover:underline">
                    Lihat semua →
                </a>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-slate-50 text-slate-600">
                    <tr>
                        <th class="px-6 py-3 text-left font-semibold">Nama</th>
                        <th class="px-6 py-3 text-left font-semibold">Jenjang</th>
                        <th class="px-6 py-3 text-left font-semibold">WhatsApp</th>
                        <th class="px-6 py-3 text-left font-semibold">Status</th>
                        <th class="px-6 py-3 text-left font-semibold">Submit</th>
                        <th class="px-6 py-3 text-center font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($recentApplicants as $applicant)
                        <tr class="hover:bg-slate-50/80">
                            <td class="px-6 py-4">
                                <p class="font-semibold text-slate-900">{{ $applicant->student->nama_lengkap }}</p>
                                <p class="text-xs text-slate-500">{{ $applicant->nomor_pendaftaran }}</p>
                            </td>
                            <td class="px-6 py-4 text-slate-600">{{ $applicant->student->jenjang ?? '-' }}</td>
                            <td class="px-6 py-4 text-slate-600">{{ $applicant->user->whatsapp }}</td>
                            <td class="px-6 py-4">
                                <x-admin.status-badge :status="$applicant->status" />
                            </td>
                            <td class="px-6 py-4 text-slate-600">{{ $applicant->submitted_at?->format('d/m/Y') }}</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('admin.applicants.show', $applicant) }}"
                                        class="inline-flex items-center gap-1 bg-blue-600 text-white px-3 py-1.5 rounded-lg text-xs font-semibold hover:bg-blue-700">
                                        <i class="fas fa-eye"></i> Proses
                                    </a>
                                    <a href="{{ route('admin.applicants.print', $applicant) }}" target="_blank"
                                        class="inline-flex items-center gap-1 bg-slate-100 text-slate-700 px-3 py-1.5 rounded-lg text-xs font-semibold hover:bg-slate-200">
                                        <i class="fas fa-print"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-slate-500">
                                <i class="fas fa-inbox text-3xl text-slate-300 mb-3 block"></i>
                                Belum ada pendaftar yang submit formulir online
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="px-6 py-4 bg-slate-50 border-t border-slate-100 flex flex-wrap gap-3">
            <a href="{{ route('admin.applicants.index') }}" class="bg-slate-900 text-white px-5 py-2.5 rounded-xl text-sm font-semibold hover:bg-slate-800">
                Kelola Semua Calon Siswa
            </a>
            <a href="{{ route('admin.export') }}" class="bg-emerald-600 text-white px-5 py-2.5 rounded-xl text-sm font-semibold hover:bg-emerald-700">
                <i class="fas fa-file-excel mr-1"></i> Export Data
            </a>
        </div>
    </div>
</div>
@endsection
