@php
    $ortu = $ortu ?? null;
    $prefix = $prefix;
    $required = $required ?? true;
    $reqMark = $required ? ' *' : '';
@endphp

<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
    <div class="sm:col-span-2">
        <label class="block text-sm font-medium text-gray-700">Nama Lengkap{{ $reqMark }}</label>
        <input type="text" name="{{ $prefix }}[nama_lengkap]"
            value="{{ old("{$prefix}.nama_lengkap", $ortu?->nama_lengkap) }}"
            {{ $required ? 'required' : '' }}
            class="mt-1 block w-full border border-gray-300 rounded-md p-2">
        @error("{$prefix}.nama_lengkap")
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">NIK</label>
        <input type="text" name="{{ $prefix }}[nik]"
            value="{{ old("{$prefix}.nik", $ortu?->nik) }}"
            class="mt-1 block w-full border border-gray-300 rounded-md p-2">
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Kewarganegaraan{{ $reqMark }}</label>
        <input type="text" name="{{ $prefix }}[kewarganegaraan]"
            value="{{ old("{$prefix}.kewarganegaraan", $ortu?->kewarganegaraan ?? ($required ? 'Indonesia' : '')) }}"
            {{ $required ? 'required' : '' }}
            class="mt-1 block w-full border border-gray-300 rounded-md p-2"
            placeholder="Indonesia">
        @error("{$prefix}.kewarganegaraan")
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Tempat Lahir{{ $reqMark }}</label>
        <input type="text" name="{{ $prefix }}[tempat_lahir]"
            value="{{ old("{$prefix}.tempat_lahir", $ortu?->tempat_lahir) }}"
            {{ $required ? 'required' : '' }}
            class="mt-1 block w-full border border-gray-300 rounded-md p-2">
        @error("{$prefix}.tempat_lahir")
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Tanggal Lahir{{ $reqMark }}</label>
        <input type="date" name="{{ $prefix }}[tanggal_lahir]"
            value="{{ old("{$prefix}.tanggal_lahir", $ortu?->tanggal_lahir?->format('Y-m-d')) }}"
            {{ $required ? 'required' : '' }}
            class="mt-1 block w-full border border-gray-300 rounded-md p-2">
        @error("{$prefix}.tanggal_lahir")
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Agama{{ $reqMark }}</label>
        <select name="{{ $prefix }}[agama]" {{ $required ? 'required' : '' }}
            class="mt-1 block w-full border border-gray-300 rounded-md p-2">
            <option value="">-- Pilih --</option>
            @foreach (['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha', 'Kong Hu Cu'] as $agama)
                <option value="{{ $agama }}"
                    {{ old("{$prefix}.agama", $ortu?->agama) === $agama ? 'selected' : '' }}>
                    {{ $agama }}
                </option>
            @endforeach
        </select>
        @error("{$prefix}.agama")
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Pendidikan</label>
        <input type="text" name="{{ $prefix }}[pendidikan]"
            value="{{ old("{$prefix}.pendidikan", $ortu?->pendidikan) }}"
            class="mt-1 block w-full border border-gray-300 rounded-md p-2">
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Pekerjaan{{ $reqMark }}</label>
        <input type="text" name="{{ $prefix }}[pekerjaan]"
            value="{{ old("{$prefix}.pekerjaan", $ortu?->pekerjaan) }}"
            {{ $required ? 'required' : '' }}
            class="mt-1 block w-full border border-gray-300 rounded-md p-2">
        @error("{$prefix}.pekerjaan")
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Penghasilan (Rp)</label>
        <input type="number" name="{{ $prefix }}[penghasilan]" min="0" step="1"
            value="{{ old("{$prefix}.penghasilan", $ortu?->penghasilan) }}"
            class="mt-1 block w-full border border-gray-300 rounded-md p-2">
    </div>

    @if ($prefix === 'wali')
        <div>
            <label class="block text-sm font-medium text-gray-700">Hubungan dengan Siswa</label>
            <input type="text" name="{{ $prefix }}[hubungan_kerabat]"
                value="{{ old("{$prefix}.hubungan_kerabat", $ortu?->hubungan_kerabat) }}"
                class="mt-1 block w-full border border-gray-300 rounded-md p-2"
                placeholder="Misal: Paman, Kakak, dll.">
        </div>
    @endif

    <div class="sm:col-span-2">
        <label class="block text-sm font-medium text-gray-700">Alamat{{ $reqMark }}</label>
        <textarea name="{{ $prefix }}[alamat]" rows="2" {{ $required ? 'required' : '' }}
            class="mt-1 block w-full border border-gray-300 rounded-md p-2">{{ old("{$prefix}.alamat", $ortu?->alamat) }}</textarea>
        @error("{$prefix}.alamat")
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="sm:col-span-2">
        <label class="block text-sm font-medium text-gray-700">No. Telepon / WhatsApp{{ $reqMark }}</label>
        <input type="text" name="{{ $prefix }}[no_telp]"
            value="{{ old("{$prefix}.no_telp", $ortu?->no_telp) }}"
            {{ $required ? 'required' : '' }}
            class="mt-1 block w-full border border-gray-300 rounded-md p-2">
        @error("{$prefix}.no_telp")
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
</div>
