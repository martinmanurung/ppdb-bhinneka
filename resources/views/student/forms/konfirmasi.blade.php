@extends('layouts.app')

@section('title', 'Kirim Formulir Pendaftaran')

@section('content')
<div class="max-w-3xl mx-auto">
    <h1 class="text-3xl font-bold mb-6">Kirim Formulir Pendaftaran</h1>

    @if ($student->hasSubmittedOnline())
        <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded mb-6">
            <p class="font-bold">Formulir sudah dikirim pada {{ $student->submitted_at->format('d F Y, H:i') }} WIB</p>
            <p class="mt-2">Status: <strong>{{ $student->status_verifikasi }}</strong></p>
            <p class="mt-2 text-sm">Silakan datang ke sekolah membawa berkas persyaratan asli untuk proses verifikasi.</p>
        </div>
    @else
        <div class="bg-blue-100 border border-blue-300 text-blue-800 px-4 py-3 rounded mb-6">
            <p class="font-semibold mb-2">Setelah mengirim formulir online:</p>
            <ol class="list-decimal list-inside space-y-1 text-sm">
                <li>Status pendaftaran menjadi <strong>Menunggu Penyerahan Berkas</strong></li>
                <li>Datang ke sekolah membawa berkas persyaratan asli (lihat daftar di bawah)</li>
                <li>Admin akan mencetak formulir ini dan mencocokkan dengan berkas fisik</li>
                <li>Setelah sesuai, lakukan pembayaran administrasi di sekolah</li>
                <li>Status di website akan diubah menjadi <strong>Terverifikasi</strong></li>
            </ol>
        </div>

        <div class="bg-white rounded-lg shadow p-6 mb-6">
            <h2 class="text-xl font-bold mb-4">Ringkasan Data</h2>
            <p><strong>Nama:</strong> {{ $student->nama_lengkap }}</p>
            <p><strong>Asal Sekolah:</strong> {{ $student->asal_sekolah }}</p>
            <p><strong>Jenjang:</strong> {{ $student->jenjang ?? '-' }}</p>
        </div>

        <div class="bg-yellow-50 border border-yellow-300 rounded-lg p-6 mb-6">
            <h2 class="text-xl font-bold mb-4">Berkas yang Harus Dibawa ke Sekolah</h2>
            <ul class="list-disc list-inside space-y-2">
                @foreach ($requiredDocuments as $label)
                    <li>{{ $label }}</li>
                @endforeach
            </ul>
            <p class="mt-4 text-sm text-gray-600">Berkas diserahkan dalam bentuk <strong>fisik/asli</strong> (fotokopi sesuai ketentuan sekolah).</p>
        </div>

        <form action="{{ route('student.form.submit') }}" method="POST" class="bg-white rounded-lg shadow p-6">
            @csrf

            <label class="flex items-start gap-3 cursor-pointer">
                <input type="checkbox" name="konfirmasi" value="1" required
                    class="mt-1 rounded border-gray-300"
                    {{ old('konfirmasi') ? 'checked' : '' }}>
                <span class="text-gray-700">
                    Saya menyatakan bahwa data yang saya isi sudah benar dan siap menyerahkan berkas persyaratan ke sekolah untuk diverifikasi.
                </span>
            </label>
            @error('konfirmasi')
                <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
            @enderror

            <div class="flex gap-4 mt-6">
                <a href="{{ route('student.form.parents') }}" class="flex-1 bg-gray-400 text-white py-2 rounded text-center hover:bg-gray-500">
                    Kembali
                </a>
                <button type="submit" class="flex-1 bg-blue-600 text-white py-2 rounded hover:bg-blue-700 font-semibold">
                    Kirim Formulir Pendaftaran
                </button>
            </div>
        </form>
    @endif

    <div class="mt-4">
        <a href="{{ route('student.dashboard') }}" class="text-blue-600 hover:underline">← Kembali ke Dashboard</a>
    </div>
</div>
@endsection
