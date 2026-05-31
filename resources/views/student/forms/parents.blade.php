@extends('layouts.student')

@section('title', 'Data Orang Tua / Wali')

@section('content')
<div>
    <h1 class="text-2xl font-bold text-slate-900 mb-1">Data Orang Tua / Wali</h1>
    <p class="text-slate-600 text-sm mb-2">Lengkapi data <strong>Ayah</strong> dan <strong>Ibu</strong> (wajib). Data <strong>Wali</strong> bersifat <span class="text-emerald-600 font-semibold">opsional</span> — hanya jika calon siswa tidak tinggal bersama orang tua.</p>
    @if ($pendaftaran ?? null)
        <p class="text-sm text-teal-700 bg-teal-50 inline-block px-3 py-1 rounded-lg mb-4">No. Pendaftaran: <strong>{{ $pendaftaran->nomor_pendaftaran }}</strong></p>
    @endif

    @include('student.partials.berkas-panel', ['compact' => true, 'showDownload' => false, 'class' => 'mb-6'])

    <form action="{{ route('student.form.parents') }}" method="POST" class="space-y-6">
        @csrf

        <section class="bg-white rounded-2xl shadow-sm border border-blue-100 p-6">
            <h2 class="text-lg font-bold text-blue-800 mb-4"><i class="fas fa-male"></i> Data Ayah Kandung</h2>
            @include('student.forms.partials.parent-fields', ['prefix' => 'ayah', 'ortu' => $ayah, 'required' => true])
        </section>

        <section class="bg-white rounded-2xl shadow-sm border border-pink-100 p-6">
            <h2 class="text-lg font-bold text-pink-800 mb-4"><i class="fas fa-female"></i> Data Ibu Kandung</h2>
            @include('student.forms.partials.parent-fields', ['prefix' => 'ibu', 'ortu' => $ibu, 'required' => true])
        </section>

        <section class="bg-white rounded-2xl shadow-sm border border-dashed border-amber-200 p-6">
            <label class="flex items-start gap-3 cursor-pointer mb-2">
                <input type="checkbox" id="toggle-wali" class="mt-1 rounded border-gray-300 text-amber-600"
                    {{ ($wali || filled(old('wali.nama_lengkap'))) ? 'checked' : '' }}>
                <span>
                    <span class="font-bold text-amber-900 block">Tambah Data Wali Murid <span class="text-xs font-normal text-emerald-600">(Opsional)</span></span>
                    <span class="text-sm text-gray-600">Centang hanya jika calon siswa tidak tinggal bersama ayah/ibu</span>
                </span>
            </label>

            <div id="wali-section" class="{{ ($wali || filled(old('wali.nama_lengkap'))) ? '' : 'hidden' }} mt-4 pt-4 border-t border-amber-100">
                <h2 class="text-lg font-bold text-amber-800 mb-1"><i class="fas fa-user-friends"></i> Data Wali Murid</h2>
                <p class="text-xs text-gray-500 mb-4">Isi semua field di bawah jika menambahkan data wali.</p>
                @include('student.forms.partials.parent-fields', ['prefix' => 'wali', 'ortu' => $wali, 'required' => false])
            </div>
        </section>

        <div class="flex flex-col sm:flex-row gap-4">
            <button type="submit" class="flex-1 bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700">
                Simpan & Lanjut ke Konfirmasi
            </button>
            <a href="{{ route('student.form.biodata') }}" class="flex-1 bg-gray-200 text-gray-800 py-3 rounded-lg text-center hover:bg-gray-300">
                Kembali ke Biodata
            </a>
        </div>
    </form>
</div>

<script>
    const toggleWali = document.getElementById('toggle-wali');
    const waliSection = document.getElementById('wali-section');

    function setWaliFieldsEnabled(enabled) {
        waliSection?.querySelectorAll('input, select, textarea').forEach((el) => {
            el.disabled = !enabled;
            if (!enabled) {
                el.value = '';
            }
        });
    }

    function syncWaliSection() {
        const show = toggleWali?.checked;
        if (show) {
            waliSection.classList.remove('hidden');
            setWaliFieldsEnabled(true);
        } else {
            waliSection.classList.add('hidden');
            setWaliFieldsEnabled(false);
        }
    }

    toggleWali?.addEventListener('change', syncWaliSection);
    syncWaliSection();
</script>
@endsection
