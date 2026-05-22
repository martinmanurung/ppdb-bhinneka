@extends('layouts.app')

@section('title', 'Data Orangtua/Wali')

@section('content')
<div class="max-w-4xl mx-auto">
    <h1 class="text-3xl font-bold mb-2">Data Orang Tua / Wali</h1>
    <p class="text-gray-600 mb-6">Lengkapi data <strong>Ayah</strong> dan <strong>Ibu</strong>. Data wali hanya diisi jika calon siswa tidak tinggal bersama orang tua.</p>

    <form action="{{ route('student.form.parents') }}" method="POST" class="space-y-6">
        @csrf

        {{-- Ayah --}}
        <section class="bg-white rounded-lg shadow border border-blue-100 p-6">
            <h2 class="text-lg font-bold text-blue-800 mb-4 flex items-center gap-2">
                <i class="fas fa-male"></i> Data Ayah Kandung
            </h2>
            @include('student.forms.partials.parent-fields', [
                'index' => 0,
                'jenisWali' => 'Ayah',
                'parent' => $ayah,
                'required' => true,
            ])
        </section>

        {{-- Ibu --}}
        <section class="bg-white rounded-lg shadow border border-pink-100 p-6">
            <h2 class="text-lg font-bold text-pink-800 mb-4 flex items-center gap-2">
                <i class="fas fa-female"></i> Data Ibu Kandung
            </h2>
            @include('student.forms.partials.parent-fields', [
                'index' => 1,
                'jenisWali' => 'Ibu',
                'parent' => $ibu,
                'required' => true,
            ])
        </section>

        {{-- Wali (opsional) --}}
        <section class="bg-white rounded-lg shadow border border-amber-100 p-6">
            <label class="flex items-start gap-3 cursor-pointer mb-4">
                <input type="checkbox" id="toggle-wali" class="mt-1 rounded border-gray-300"
                    {{ ($wali || old('parents.2.nama_lengkap')) ? 'checked' : '' }}>
                <span>
                    <span class="font-bold text-amber-900 block">Tambah Data Wali Murid</span>
                    <span class="text-sm text-gray-600">Centang jika calon siswa tidak tinggal bersama ayah/ibu</span>
                </span>
            </label>

            <div id="wali-section" class="{{ ($wali || old('parents.2.nama_lengkap')) ? '' : 'hidden' }}">
                <h2 class="text-lg font-bold text-amber-800 mb-4 flex items-center gap-2">
                    <i class="fas fa-user-friends"></i> Data Wali Murid
                </h2>
                @include('student.forms.partials.parent-fields', [
                    'index' => 2,
                    'jenisWali' => 'Wali',
                    'parent' => $wali,
                    'required' => false,
                ])
            </div>
        </section>

        <div class="flex flex-col sm:flex-row gap-4 pt-2">
            <button type="submit" class="flex-1 bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700">
                Simpan & Lanjut ke Konfirmasi
            </button>
            <a href="{{ route('student.form.biodata') }}"
                class="flex-1 bg-gray-200 text-gray-800 py-3 rounded-lg font-medium hover:bg-gray-300 text-center">
                Kembali ke Biodata
            </a>
        </div>
    </form>
</div>

<script>
    const toggleWali = document.getElementById('toggle-wali');
    const waliSection = document.getElementById('wali-section');

    function setWaliRequired(enabled) {
        waliSection.querySelectorAll('input, select, textarea').forEach((el) => {
            if (el.type === 'hidden') return;
            el.required = enabled;
            if (!enabled) {
                el.removeAttribute('required');
            }
        });
    }

    toggleWali.addEventListener('change', function () {
        if (this.checked) {
            waliSection.classList.remove('hidden');
            setWaliRequired(false);
        } else {
            waliSection.classList.add('hidden');
            waliSection.querySelectorAll('input:not([type=hidden]), select, textarea').forEach((el) => {
                el.value = '';
            });
            setWaliRequired(false);
        }
    });

    setWaliRequired(false);
</script>
@endsection
