@extends('layouts.admin')

@php $student = $pendaftaran->student; @endphp

@section('title', 'Detail - ' . $student->nama_lengkap)

@section('header')
    <div class="flex flex-wrap items-center gap-3">
        <a href="{{ route('admin.applicants.index') }}" class="text-slate-400 hover:text-blue-600 text-sm">
            <i class="fas fa-arrow-left"></i>
        </a>
        <div>
            <h1 class="text-xl font-bold text-slate-900">{{ $student->nama_lengkap }}</h1>
            <p class="text-sm text-slate-500">{{ $pendaftaran->nomor_pendaftaran }}</p>
        </div>
        <x-admin.status-badge :status="$pendaftaran->status" class="ml-2" />
    </div>
@endsection

@section('content')
<div class="grid grid-cols-1 xl:grid-cols-3 gap-6">
    <div class="xl:col-span-1 space-y-6 order-2 xl:order-1">
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
            <h2 class="font-bold text-slate-900 mb-4">Verifikasi & Status</h2>

            <form action="{{ route('admin.applicants.update-status', $pendaftaran) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Status Pendaftaran</label>
                    <select name="status" id="status-select" required class="w-full border border-slate-300 rounded-xl px-4 py-2.5">
                        @foreach (\App\Models\Pendaftaran::STATUSES as $value => $label)
                            <option value="{{ $value }}" {{ $pendaftaran->status === $value ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>

                <div id="rejection-reason" class="{{ $pendaftaran->status === \App\Models\Pendaftaran::STATUS_DITOLAK ? '' : 'hidden' }}">
                    <label class="block text-sm font-medium text-slate-700 mb-1">Alasan Penolakan *</label>
                    <textarea name="alasan_penolakan" rows="3" class="w-full border border-slate-300 rounded-xl px-4 py-2.5 text-sm">{{ old('alasan_penolakan', $pendaftaran->alasan_penolakan) }}</textarea>
                    @error('alasan_penolakan')<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <button type="submit" class="w-full bg-blue-600 text-white py-2.5 rounded-xl font-semibold">Simpan Status</button>
            </form>

            @if ($pendaftaran->status === \App\Models\Pendaftaran::STATUS_MENUNGGU_BERKAS)
                <form action="{{ route('admin.applicants.update-status', $pendaftaran) }}" method="POST" class="mt-3"
                    onsubmit="return confirm('Berkas sesuai dan pembayaran sudah diterima?')">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="status" value="{{ \App\Models\Pendaftaran::STATUS_TERVERIFIKASI }}">
                    <button type="submit" class="w-full bg-green-600 text-white py-2.5 rounded-xl text-sm font-semibold">
                        <i class="fas fa-check mr-1"></i> Tandai Terverifikasi
                    </button>
                </form>
            @endif
        </div>

        <div class="bg-white rounded-2xl border p-6">
            <a href="{{ route('admin.applicants.print', $pendaftaran) }}" target="_blank"
                class="flex items-center justify-center gap-2 w-full bg-emerald-600 text-white py-2.5 rounded-xl font-semibold">
                <i class="fas fa-print"></i> Cetak Formulir
            </a>
        </div>

        <div class="bg-white rounded-2xl border p-6 text-sm space-y-2">
            <p><strong>Email:</strong> {{ $pendaftaran->user->email }}</p>
            <p><strong>WhatsApp:</strong> {{ $pendaftaran->user->whatsapp }}</p>
            <p><strong>Submit:</strong> {{ $pendaftaran->submitted_at?->format('d/m/Y H:i') ?? '-' }}</p>
        </div>
    </div>

    <div class="xl:col-span-2 space-y-6 order-1 xl:order-2">
        <div class="bg-white rounded-2xl border p-6">
            <h2 class="font-bold mb-4">Biodata Calon Siswa</h2>
            @include('admin.applicants.partials.biodata', ['student' => $student])
        </div>

        @if ($pendaftaran->ayah)
            <div class="bg-white rounded-2xl border p-6">
                <h2 class="font-bold mb-4">Data Ayah — {{ $pendaftaran->ayah->nama_lengkap }}</h2>
                @include('admin.applicants.partials.ortu', ['ortu' => $pendaftaran->ayah])
            </div>
        @endif

        @if ($pendaftaran->ibu)
            <div class="bg-white rounded-2xl border p-6">
                <h2 class="font-bold mb-4">Data Ibu — {{ $pendaftaran->ibu->nama_lengkap }}</h2>
                @include('admin.applicants.partials.ortu', ['ortu' => $pendaftaran->ibu])
            </div>
        @endif

        @if ($pendaftaran->wali)
            <div class="bg-white rounded-2xl border p-6">
                <h2 class="font-bold mb-4">Data Wali — {{ $pendaftaran->wali->nama_lengkap }}</h2>
                @include('admin.applicants.partials.ortu', ['ortu' => $pendaftaran->wali, 'isWali' => true])
            </div>
        @endif
    </div>
</div>

<script>
    document.getElementById('status-select')?.addEventListener('change', function () {
        const box = document.getElementById('rejection-reason');
        box.classList.toggle('hidden', this.value !== '{{ \App\Models\Pendaftaran::STATUS_DITOLAK }}');
    });
</script>
@endsection
