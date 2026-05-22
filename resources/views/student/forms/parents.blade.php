@extends('layouts.app')

@section('title', 'Data Orangtua/Wali')

@section('content')
<div class="max-w-4xl mx-auto">
    <h1 class="text-3xl font-bold mb-2">Data Orang Tua / Wali</h1>
    <p class="text-gray-600 mb-2">Lengkapi data <strong>Ayah</strong> dan <strong>Ibu</strong>. Data wali hanya jika calon siswa tidak tinggal bersama orang tua.</p>
    @if ($pendaftaran ?? null)
        <p class="text-sm text-blue-700 mb-6">No. Pendaftaran: <strong>{{ $pendaftaran->nomor_pendaftaran }}</strong></p>
    @endif

    <form action="{{ route('student.form.parents') }}" method="POST" class="space-y-6">
        @csrf

        <section class="bg-white rounded-lg shadow border border-blue-100 p-6">
            <h2 class="text-lg font-bold text-blue-800 mb-4"><i class="fas fa-male"></i> Data Ayah Kandung</h2>
            @include('student.forms.partials.parent-fields', ['prefix' => 'ayah', 'ortu' => $ayah, 'required' => true])
        </section>

        <section class="bg-white rounded-lg shadow border border-pink-100 p-6">
            <h2 class="text-lg font-bold text-pink-800 mb-4"><i class="fas fa-female"></i> Data Ibu Kandung</h2>
            @include('student.forms.partials.parent-fields', ['prefix' => 'ibu', 'ortu' => $ibu, 'required' => true])
        </section>

        <section class="bg-white rounded-lg shadow border border-amber-100 p-6">
            <label class="flex items-start gap-3 cursor-pointer mb-4">
                <input type="checkbox" id="toggle-wali" class="mt-1 rounded border-gray-300"
                    {{ ($wali || old('wali.nama_lengkap')) ? 'checked' : '' }}>
                <span>
                    <span class="font-bold text-amber-900 block">Tambah Data Wali Murid</span>
                    <span class="text-sm text-gray-600">Centang jika calon siswa tidak tinggal bersama ayah/ibu</span>
                </span>
            </label>

            <div id="wali-section" class="{{ ($wali || old('wali.nama_lengkap')) ? '' : 'hidden' }}">
                <h2 class="text-lg font-bold text-amber-800 mb-4"><i class="fas fa-user-friends"></i> Data Wali Murid</h2>
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

    toggleWali?.addEventListener('change', function () {
        if (this.checked) {
            waliSection.classList.remove('hidden');
        } else {
            waliSection.classList.add('hidden');
            waliSection.querySelectorAll('input, select, textarea').forEach((el) => {
                el.value = '';
            });
        }
    });
</script>
@endsection
