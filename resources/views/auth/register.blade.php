@extends('layouts.app')

@section('title', 'Registrasi')

@section('content')
<div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow">
    <h1 class="text-3xl font-bold mb-6 text-center">Registrasi PPDB</h1>

    <form action="{{ route('register') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required
                class="mt-1 block w-full border border-gray-300 rounded-md p-2 @error('name') border-red-500 @enderror">
            @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required
                class="mt-1 block w-full border border-gray-300 rounded-md p-2 @error('email') border-red-500 @enderror">
            @error('email')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="whatsapp" class="block text-sm font-medium text-gray-700">Nomor WhatsApp</label>
            <input type="text" id="whatsapp" name="whatsapp" value="{{ old('whatsapp') }}"
                placeholder="08xxxxxxxxxx" required
                class="mt-1 block w-full border border-gray-300 rounded-md p-2 @error('whatsapp') border-red-500 @enderror">
            @error('whatsapp')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" id="password" name="password" required
                class="mt-1 block w-full border border-gray-300 rounded-md p-2 @error('password') border-red-500 @enderror">
            @error('password')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required
                class="mt-1 block w-full border border-gray-300 rounded-md p-2">
        </div>

        <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700">
            Daftar
        </button>
    </form>

    <p class="text-center mt-4">
        Sudah punya akun? <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Login di sini</a>
    </p>
</div>
@endsection
