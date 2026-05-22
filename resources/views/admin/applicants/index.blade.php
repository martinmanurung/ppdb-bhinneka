@extends('layouts.admin')

@section('title', 'Daftar Pendaftar')

@section('header')
    <h1 class="text-xl font-bold text-slate-900">Daftar Pendaftar</h1>
    <p class="text-sm text-slate-500">Kelola verifikasi berkas fisik dan status pendaftaran</p>
@endsection

@section('content')
<div class="space-y-6">
    {{-- Filter tabs --}}
    <div class="flex flex-wrap gap-2">
        <a href="{{ route('admin.applicants.index') }}"
            class="px-4 py-2 rounded-xl text-sm font-medium transition {{ !request('status') ? 'bg-blue-600 text-white' : 'bg-white text-slate-600 border border-slate-200 hover:bg-slate-50' }}">
            Semua
        </a>
        <a href="{{ route('admin.applicants.index', ['status' => \App\Models\Pendaftaran::STATUS_MENUNGGU_BERKAS]) }}"
            class="px-4 py-2 rounded-xl text-sm font-medium transition {{ request('status') === \App\Models\Pendaftaran::STATUS_MENUNGGU_BERKAS ? 'bg-amber-500 text-white' : 'bg-white text-slate-600 border border-slate-200 hover:bg-slate-50' }}">
            Menunggu Berkas
        </a>
        <a href="{{ route('admin.applicants.index', ['status' => \App\Models\Pendaftaran::STATUS_TERVERIFIKASI]) }}"
            class="px-4 py-2 rounded-xl text-sm font-medium transition {{ request('status') === \App\Models\Pendaftaran::STATUS_TERVERIFIKASI ? 'bg-green-600 text-white' : 'bg-white text-slate-600 border border-slate-200 hover:bg-slate-50' }}">
            Terverifikasi
        </a>
        <a href="{{ route('admin.applicants.index', ['status' => \App\Models\Pendaftaran::STATUS_DITOLAK]) }}"
            class="px-4 py-2 rounded-xl text-sm font-medium transition {{ request('status') === \App\Models\Pendaftaran::STATUS_DITOLAK ? 'bg-red-600 text-white' : 'bg-white text-slate-600 border border-slate-200 hover:bg-slate-50' }}">
            Ditolak
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-4 lg:p-6">
        <form method="GET" action="{{ route('admin.applicants.index') }}" class="flex flex-wrap gap-3">
            @if (request('status'))
                <input type="hidden" name="status" value="{{ request('status') }}">
            @endif
            <div class="flex-1 min-w-[200px] relative">
                <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-slate-400"></i>
                <input type="text" name="search" placeholder="Cari nama atau email..."
                    value="{{ request('search') }}"
                    class="w-full pl-10 border border-slate-300 rounded-xl px-4 py-2.5 focus:ring-2 focus:ring-blue-500">
            </div>
            <button type="submit" class="bg-blue-600 text-white px-5 py-2.5 rounded-xl font-medium hover:bg-blue-700">
                Cari
            </button>
            <a href="{{ route('admin.export.download', request()->only('status')) }}"
                class="inline-flex items-center gap-2 bg-emerald-600 text-white px-5 py-2.5 rounded-xl font-medium hover:bg-emerald-700">
                <i class="fas fa-download"></i> Export
            </a>
        </form>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-5 py-3 text-left font-semibold text-slate-600">No</th>
                        <th class="px-5 py-3 text-left font-semibold text-slate-600">Pendaftar</th>
                        <th class="px-5 py-3 text-left font-semibold text-slate-600">Asal Sekolah</th>
                        <th class="px-5 py-3 text-left font-semibold text-slate-600">Jenjang</th>
                        <th class="px-5 py-3 text-left font-semibold text-slate-600">Status</th>
                        <th class="px-5 py-3 text-left font-semibold text-slate-600">Submit</th>
                        <th class="px-5 py-3 text-center font-semibold text-slate-600">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($applicants as $index => $applicant)
                        <tr class="hover:bg-slate-50/80">
                            <td class="px-5 py-4 text-slate-500">{{ $applicants->firstItem() + $index }}</td>
                            <td class="px-5 py-4">
                                <p class="font-semibold text-slate-900">{{ $applicant->student->nama_lengkap }}</p>
                                <p class="text-xs text-slate-500">{{ $applicant->nomor_pendaftaran }}</p>
                            </td>
                            <td class="px-5 py-4 text-slate-600">{{ $applicant->student->asal_sekolah }}</td>
                            <td class="px-5 py-4 text-slate-600">{{ $applicant->student->jenjang ?? '-' }}</td>
                            <td class="px-5 py-4">
                                <x-admin.status-badge :status="$applicant->status" />
                            </td>
                            <td class="px-5 py-4 text-slate-600 whitespace-nowrap">{{ $applicant->submitted_at?->format('d/m/Y H:i') }}</td>
                            <td class="px-5 py-4">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('admin.applicants.show', $applicant) }}"
                                        class="bg-blue-600 text-white px-3 py-1.5 rounded-lg text-xs font-semibold hover:bg-blue-700">
                                        Detail
                                    </a>
                                    <a href="{{ route('admin.applicants.print', $applicant) }}" target="_blank"
                                        class="bg-slate-100 text-slate-700 px-3 py-1.5 rounded-lg text-xs font-semibold hover:bg-slate-200"
                                        title="Cetak formulir">
                                        <i class="fas fa-print"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-5 py-12 text-center text-slate-500">
                                Tidak ada pendaftar ditemukan
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($applicants->hasPages())
            <div class="px-5 py-4 border-t border-slate-100">{{ $applicants->links() }}</div>
        @endif
    </div>
</div>
@endsection
