@extends('layouts.admin')

@section('title', 'Detail - ' . $student->nama_lengkap)

@section('header')
    <div class="flex flex-wrap items-center gap-3">
        <a href="{{ route('admin.applicants.index') }}" class="text-slate-400 hover:text-blue-600 text-sm">
            <i class="fas fa-arrow-left"></i>
        </a>
        <div>
            <h1 class="text-xl font-bold text-slate-900">{{ $student->nama_lengkap }}</h1>
            <p class="text-sm text-slate-500">No. PPDB-{{ str_pad($student->id, 5, '0', STR_PAD_LEFT) }}</p>
        </div>
        <x-admin.status-badge :status="$student->status_verifikasi" class="ml-2" />
    </div>
@endsection

@section('content')
<div class="grid grid-cols-1 xl:grid-cols-3 gap-6">
    {{-- Kolom kiri: verifikasi & status --}}
    <div class="xl:col-span-1 space-y-6 order-2 xl:order-1">
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
            <h2 class="font-bold text-slate-900 mb-1 flex items-center gap-2">
                <i class="fas fa-tasks text-blue-600"></i> Verifikasi & Status
            </h2>
            <p class="text-xs text-slate-500 mb-4">
                Setelah berkas fisik sesuai dan pembayaran diterima, ubah status ke <strong>Terverifikasi</strong>.
            </p>

            <form action="{{ route('admin.applicants.update-status', $student) }}" method="POST" class="space-y-4" id="status-form">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Status Pendaftaran</label>
                    <select name="status_verifikasi" id="status-select" required
                        class="w-full border border-slate-300 rounded-xl px-4 py-2.5">
                        @foreach (\App\Models\Student::STATUSES as $value => $label)
                            <option value="{{ $value }}" {{ $student->status_verifikasi === $value ? 'selected' : '' }}>
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div id="rejection-reason" class="{{ $student->status_verifikasi === \App\Models\Student::STATUS_DITOLAK ? '' : 'hidden' }}">
                    <label class="block text-sm font-medium text-slate-700 mb-1">Alasan Penolakan *</label>
                    <textarea name="alasan_penolakan" rows="3"
                        class="w-full border border-slate-300 rounded-xl px-4 py-2.5 text-sm">{{ old('alasan_penolakan', $student->alasan_penolakan) }}</textarea>
                    @error('alasan_penolakan')
                        <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 rounded-xl">
                    Simpan Status
                </button>
            </form>

            @if ($student->status_verifikasi === \App\Models\Student::STATUS_MENUNGGU_BERKAS)
                <form action="{{ route('admin.applicants.update-status', $student) }}" method="POST" class="mt-3"
                    onsubmit="return confirm('Konfirmasi: berkas sudah sesuai dan pembayaran sudah diterima?')">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="status_verifikasi" value="{{ \App\Models\Student::STATUS_TERVERIFIKASI }}">
                    <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-2.5 rounded-xl text-sm">
                        <i class="fas fa-check mr-1"></i> Tandai Terverifikasi
                    </button>
                </form>
            @endif
        </div>

        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
            <h2 class="font-bold text-slate-900 mb-3 flex items-center gap-2">
                <i class="fas fa-print text-emerald-600"></i> Cetak Formulir
            </h2>
            <p class="text-sm text-slate-600 mb-4">Cetak data pendaftaran online untuk dicocokkan dengan berkas fisik di meja verifikasi.</p>
            <a href="{{ route('admin.applicants.print', $student) }}" target="_blank"
                class="flex items-center justify-center gap-2 w-full bg-emerald-600 hover:bg-emerald-700 text-white font-semibold py-2.5 rounded-xl">
                <i class="fas fa-print"></i> Cetak Formulir
            </a>
        </div>

        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
            <h2 class="font-bold text-slate-900 mb-3">Kontak Pendaftar</h2>
            <dl class="space-y-3 text-sm">
                <div>
                    <dt class="text-slate-400 text-xs">Email</dt>
                    <dd class="font-medium text-slate-800">{{ $student->user->email }}</dd>
                </div>
                <div>
                    <dt class="text-slate-400 text-xs">WhatsApp</dt>
                    <dd>
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $student->user->whatsapp) }}"
                            target="_blank" class="font-medium text-green-600 hover:underline">
                            {{ $student->user->whatsapp }}
                            <i class="fab fa-whatsapp ml-1"></i>
                        </a>
                    </dd>
                </div>
                <div>
                    <dt class="text-slate-400 text-xs">Submit Online</dt>
                    <dd class="font-medium text-slate-800">{{ $student->submitted_at?->format('d F Y, H:i') ?? '-' }}</dd>
                </div>
            </dl>
        </div>

        <div class="bg-amber-50 border border-amber-200 rounded-2xl p-5">
            <h2 class="font-bold text-amber-900 text-sm mb-3">Checklist Berkas Fisik</h2>
            <ul class="space-y-2">
                @foreach ($requiredDocuments as $label)
                    <li class="flex items-start gap-2 text-sm text-amber-900">
                        <span class="mt-0.5 text-amber-500"><i class="far fa-square"></i></span>
                        {{ $label }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    {{-- Kolom kanan: biodata --}}
    <div class="xl:col-span-2 space-y-6 order-1 xl:order-2">
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
            <div class="px-6 py-4 bg-slate-50 border-b border-slate-100">
                <h2 class="font-bold text-slate-900">Biodata Calon Siswa</h2>
            </div>
            <dl class="grid grid-cols-1 sm:grid-cols-2 divide-y sm:divide-y-0 sm:divide-x divide-slate-100">
                @foreach ([
                    'Nama Lengkap' => $student->nama_lengkap,
                    'Nama Panggilan' => $student->nama_panggilan ?? '-',
                    'NISN' => $student->nisn ?? '-',
                    'Jenjang' => $student->jenjang ?? '-',
                    'Jenis Kelamin' => $student->jenis_kelamin,
                    'Agama' => $student->agama,
                    'Tempat Lahir' => $student->tempat_lahir,
                    'Tanggal Lahir' => $student->tanggal_lahir->format('d-m-Y'),
                    'Asal Sekolah' => $student->asal_sekolah,
                    'Kewarganegaraan' => $student->kewarganegaraan ?? 'Indonesia',
                ] as $label => $value)
                    <div class="px-6 py-4 sm:col-span-1 {{ $label === 'Asal Sekolah' ? 'sm:col-span-2' : '' }}">
                        <dt class="text-xs text-slate-400 uppercase tracking-wide">{{ $label }}</dt>
                        <dd class="mt-1 font-medium text-slate-900">{{ $value }}</dd>
                    </div>
                @endforeach
                <div class="px-6 py-4 sm:col-span-2">
                    <dt class="text-xs text-slate-400 uppercase tracking-wide">Alamat</dt>
                    <dd class="mt-1 font-medium text-slate-900">
                        {{ $student->alamat_jalan }}, {{ $student->kota_kabupaten }}, {{ $student->provinsi }}
                    </dd>
                </div>
            </dl>
        </div>

        @foreach ($student->parents as $parent)
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                <div class="px-6 py-4 bg-slate-50 border-b border-slate-100 flex items-center justify-between">
                    <h2 class="font-bold text-slate-900">{{ $parent->jenis_wali }}</h2>
                    <span class="text-sm text-slate-600">{{ $parent->nama_lengkap }}</span>
                </div>
                <dl class="grid grid-cols-1 sm:grid-cols-2 gap-0">
                    @foreach ([
                        'NIK' => $parent->nik ?? '-',
                        'Tempat Lahir' => $parent->tempat_lahir,
                        'Tanggal Lahir' => $parent->tanggal_lahir->format('d-m-Y'),
                        'Agama' => $parent->agama,
                        'Pendidikan' => $parent->pendidikan ?? '-',
                        'Pekerjaan' => $parent->pekerjaan,
                        'Penghasilan' => $parent->penghasilan ? 'Rp ' . number_format($parent->penghasilan, 0, ',', '.') : '-',
                        'Telepon' => $parent->no_telp,
                    ] as $label => $value)
                        <div class="px-6 py-4 border-t border-slate-50">
                            <dt class="text-xs text-slate-400">{{ $label }}</dt>
                            <dd class="mt-1 font-medium text-slate-900">{{ $value }}</dd>
                        </div>
                    @endforeach
                    @if ($parent->jenis_wali === 'Wali' && ($parent->hubungan_wali ?? null))
                        <div class="px-6 py-4 border-t border-slate-50 sm:col-span-2">
                            <dt class="text-xs text-slate-400">Hubungan</dt>
                            <dd class="mt-1 font-medium text-slate-900">{{ $parent->hubungan_wali }}</dd>
                        </div>
                    @endif
                </dl>
            </div>
        @endforeach
    </div>
</div>

<script>
    document.getElementById('status-select')?.addEventListener('change', function () {
        const box = document.getElementById('rejection-reason');
        if (this.value === '{{ \App\Models\Student::STATUS_DITOLAK }}') {
            box.classList.remove('hidden');
        } else {
            box.classList.add('hidden');
        }
    });
</script>
@endsection
