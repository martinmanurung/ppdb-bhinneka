@extends('layouts.student')

@section('title', 'Biodata Siswa')

@section('content')
<div>
    <h1 class="text-2xl font-bold text-slate-900 mb-1">Biodata Calon Siswa</h1>
    <p class="text-slate-600 text-sm mb-6">Lengkapi data diri calon siswa dengan benar sesuai dokumen resmi.</p>

    @include('student.partials.berkas-panel', ['compact' => true, 'showDownload' => false, 'class' => 'mb-6'])

    <form action="{{ route('student.form.biodata') }}" method="POST" class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 space-y-4">
        @csrf

        <div>
            <label for="nama_lengkap" class="block text-sm font-medium text-gray-700">Nama Lengkap *</label>
            <input type="text" id="nama_lengkap" name="nama_lengkap"
                value="{{ old('nama_lengkap', $student->nama_lengkap ?? '') }}" required
                class="mt-1 block w-full border border-gray-300 rounded-md p-2 @error('nama_lengkap') border-red-500 @enderror">
            @error('nama_lengkap')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="nama_panggilan" class="block text-sm font-medium text-gray-700">Nama Panggilan</label>
            <input type="text" id="nama_panggilan" name="nama_panggilan"
                value="{{ old('nama_panggilan', $student->nama_panggilan ?? '') }}"
                class="mt-1 block w-full border border-gray-300 rounded-md p-2">
        </div>

        <div>
            <label for="nisn" class="block text-sm font-medium text-gray-700">NISN (jika ada)</label>
            <input type="text" id="nisn" name="nisn"
                value="{{ old('nisn', $student->nisn ?? '') }}"
                class="mt-1 block w-full border border-gray-300 rounded-md p-2">
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="tempat_lahir" class="block text-sm font-medium text-gray-700">Tempat Lahir *</label>
                <input type="text" id="tempat_lahir" name="tempat_lahir"
                    value="{{ old('tempat_lahir', $student->tempat_lahir ?? '') }}" required
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2 @error('tempat_lahir') border-red-500 @enderror">
                @error('tempat_lahir')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700">Tanggal Lahir *</label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir"
                    value="{{ old('tanggal_lahir', $student->tanggal_lahir ?? '') }}" required
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2 @error('tanggal_lahir') border-red-500 @enderror">
                @error('tanggal_lahir')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700">Jenis Kelamin *</label>
                <select id="jenis_kelamin" name="jenis_kelamin" required
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2 @error('jenis_kelamin') border-red-500 @enderror">
                    <option value="">-- Pilih --</option>
                    <option value="Laki-laki" {{ old('jenis_kelamin', $student->jenis_kelamin ?? '') === 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ old('jenis_kelamin', $student->jenis_kelamin ?? '') === 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
                @error('jenis_kelamin')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="agama" class="block text-sm font-medium text-gray-700">Agama *</label>
                <select id="agama" name="agama" required
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2 @error('agama') border-red-500 @enderror">
                    <option value="">-- Pilih --</option>
                    <option value="Islam" {{ old('agama', $student->agama ?? '') === 'Islam' ? 'selected' : '' }}>Islam</option>
                    <option value="Kristen" {{ old('agama', $student->agama ?? '') === 'Kristen' ? 'selected' : '' }}>Kristen</option>
                    <option value="Katolik" {{ old('agama', $student->agama ?? '') === 'Katolik' ? 'selected' : '' }}>Katolik</option>
                    <option value="Hindu" {{ old('agama', $student->agama ?? '') === 'Hindu' ? 'selected' : '' }}>Hindu</option>
                    <option value="Budha" {{ old('agama', $student->agama ?? '') === 'Budha' ? 'selected' : '' }}>Budha</option>
                    <option value="Kong Hu Cu" {{ old('agama', $student->agama ?? '') === 'Kong Hu Cu' ? 'selected' : '' }}>Kong Hu Cu</option>
                </select>
                @error('agama')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div>
            <label for="alamat_jalan" class="block text-sm font-medium text-gray-700">Alamat Jalan *</label>
            <textarea id="alamat_jalan" name="alamat_jalan" required rows="2"
                class="mt-1 block w-full border border-gray-300 rounded-md p-2 @error('alamat_jalan') border-red-500 @enderror">{{ old('alamat_jalan', $student->alamat_jalan ?? '') }}</textarea>
            @error('alamat_jalan')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="kota_kabupaten" class="block text-sm font-medium text-gray-700">Kota/Kabupaten *</label>
                <input type="text" id="kota_kabupaten" name="kota_kabupaten"
                    value="{{ old('kota_kabupaten', $student->kota_kabupaten ?? '') }}" required
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2 @error('kota_kabupaten') border-red-500 @enderror">
                @error('kota_kabupaten')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="provinsi" class="block text-sm font-medium text-gray-700">Provinsi *</label>
                <input type="text" id="provinsi" name="provinsi"
                    value="{{ old('provinsi', $student->provinsi ?? '') }}" required
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2 @error('provinsi') border-red-500 @enderror">
                @error('provinsi')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div>
            <label for="asal_sekolah" class="block text-sm font-medium text-gray-700">Asal Sekolah *</label>
            <input type="text" id="asal_sekolah" name="asal_sekolah"
                value="{{ old('asal_sekolah', $student->asal_sekolah ?? '') }}" required
                class="mt-1 block w-full border border-gray-300 rounded-md p-2 @error('asal_sekolah') border-red-500 @enderror">
            @error('asal_sekolah')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mt-4">
            <label for="jenjang" class="block text-sm font-medium text-gray-700">Jenjang Pendidikan *</label>
            <select id="jenjang" name="jenjang" required
                class="mt-1 block w-full border border-gray-300 rounded-md p-2 @error('jenjang') border-red-500 @enderror">
                <option value="">-- Pilih --</option>
                <option value="TK" {{ old('jenjang', $student->jenjang ?? '') === 'TK' ? 'selected' : '' }}>TK</option>
                <option value="SD" {{ old('jenjang', $student->jenjang ?? '') === 'SD' ? 'selected' : '' }}>SD</option>
                <option value="SMP" {{ old('jenjang', $student->jenjang ?? '') === 'SMP' ? 'selected' : '' }}>SMP</option>
            </select>
            @error('jenjang')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="kewarganegaraan" class="block text-sm font-medium text-gray-700">Kewarganegaraan *</label>
            <select id="kewarganegaraan" name="kewarganegaraan" required
                class="mt-1 block w-full border border-gray-300 rounded-md p-2 @error('kewarganegaraan') border-red-500 @enderror">
                <option value="Indonesia" {{ old('kewarganegaraan', $student->kewarganegaraan ?? 'Indonesia') === 'Indonesia' ? 'selected' : '' }}>Indonesia</option>
                <option value="WNA" {{ old('kewarganegaraan', $student->kewarganegaraan ?? '') === 'WNA' ? 'selected' : '' }}>WNA</option>
            </select>
            @error('kewarganegaraan')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="anak_ke" class="block text-sm font-medium text-gray-700">Anak ke-</label>
                <input type="number" id="anak_ke" name="anak_ke" min="1"
                    value="{{ old('anak_ke', $student->anak_ke ?? '') }}"
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2">
            </div>

            <div>
                <label for="jumlah_saudara_kandung" class="block text-sm font-medium text-gray-700">Jumlah Saudara Kandung</label>
                <input type="number" id="jumlah_saudara_kandung" name="jumlah_saudara_kandung" min="0"
                    value="{{ old('jumlah_saudara_kandung', $student->jumlah_saudara_kandung ?? '') }}"
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2">
            </div>
        </div>

        <div class="flex gap-4 pt-4">
            <button type="submit" class="flex-1 bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
                Lanjutkan ke Data Orangtua
            </button>
            <a href="{{ route('student.dashboard') }}" class="flex-1 bg-gray-400 text-white py-2 rounded hover:bg-gray-500 text-center">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
