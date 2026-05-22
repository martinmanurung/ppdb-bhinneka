@php
    $parent = $parent ?? null;
    $prefix = "parents[{$index}]";
    $oldPrefix = "parents.{$index}";
@endphp

<input type="hidden" name="{{ $prefix }}[jenis_wali]" value="{{ $jenisWali }}">

<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
    <div class="sm:col-span-2">
        <label class="block text-sm font-medium text-gray-700">Nama Lengkap *</label>
        <input type="text" name="{{ $prefix }}[nama_lengkap]"
            value="{{ old("{$oldPrefix}.nama_lengkap", $parent?->nama_lengkap) }}"
            {{ $required ? 'required' : '' }}
            class="mt-1 block w-full border border-gray-300 rounded-md p-2">
        @error("{$oldPrefix}.nama_lengkap")
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">NIK</label>
        <input type="text" name="{{ $prefix }}[nik]"
            value="{{ old("{$oldPrefix}.nik", $parent?->nik) }}"
            class="mt-1 block w-full border border-gray-300 rounded-md p-2">
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Kewarganegaraan *</label>
        <input type="text" name="{{ $prefix }}[kewarganegaraan]"
            value="{{ old("{$oldPrefix}.kewarganegaraan", $parent?->kewarganegaraan ?? 'Indonesia') }}"
            {{ $required ? 'required' : '' }}
            class="mt-1 block w-full border border-gray-300 rounded-md p-2"
            placeholder="Indonesia">
        @error("{$oldPrefix}.kewarganegaraan")
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Tempat Lahir *</label>
        <input type="text" name="{{ $prefix }}[tempat_lahir]"
            value="{{ old("{$oldPrefix}.tempat_lahir", $parent?->tempat_lahir) }}"
            {{ $required ? 'required' : '' }}
            class="mt-1 block w-full border border-gray-300 rounded-md p-2">
        @error("{$oldPrefix}.tempat_lahir")
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Tanggal Lahir *</label>
        <input type="date" name="{{ $prefix }}[tanggal_lahir]"
            value="{{ old("{$oldPrefix}.tanggal_lahir", $parent?->tanggal_lahir?->format('Y-m-d')) }}"
            {{ $required ? 'required' : '' }}
            class="mt-1 block w-full border border-gray-300 rounded-md p-2">
        @error("{$oldPrefix}.tanggal_lahir")
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Agama *</label>
        <select name="{{ $prefix }}[agama]" {{ $required ? 'required' : '' }}
            class="mt-1 block w-full border border-gray-300 rounded-md p-2">
            <option value="">-- Pilih --</option>
            @foreach (['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha', 'Kong Hu Cu'] as $agama)
                <option value="{{ $agama }}"
                    {{ old("{$oldPrefix}.agama", $parent?->agama) === $agama ? 'selected' : '' }}>
                    {{ $agama }}
                </option>
            @endforeach
        </select>
        @error("{$oldPrefix}.agama")
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Pendidikan</label>
        <input type="text" name="{{ $prefix }}[pendidikan]"
            value="{{ old("{$oldPrefix}.pendidikan", $parent?->pendidikan) }}"
            class="mt-1 block w-full border border-gray-300 rounded-md p-2">
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Pekerjaan *</label>
        <input type="text" name="{{ $prefix }}[pekerjaan]"
            value="{{ old("{$oldPrefix}.pekerjaan", $parent?->pekerjaan) }}"
            {{ $required ? 'required' : '' }}
            class="mt-1 block w-full border border-gray-300 rounded-md p-2 parent-job">
        @error("{$oldPrefix}.pekerjaan")
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Penghasilan (Rp)</label>
        <input type="number" name="{{ $prefix }}[penghasilan]" min="0" step="1"
            value="{{ old("{$oldPrefix}.penghasilan", $parent?->penghasilan) }}"
            class="mt-1 block w-full border border-gray-300 rounded-md p-2">
    </div>

    <div class="sm:col-span-2">
        <label class="block text-sm font-medium text-gray-700">Alamat *</label>
        <textarea name="{{ $prefix }}[alamat]" rows="2" {{ $required ? 'required' : '' }}
            class="mt-1 block w-full border border-gray-300 rounded-md p-2">{{ old("{$oldPrefix}.alamat", $parent?->alamat) }}</textarea>
        @error("{$oldPrefix}.alamat")
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="sm:col-span-2">
        <label class="block text-sm font-medium text-gray-700">No. Telepon / WhatsApp *</label>
        <input type="text" name="{{ $prefix }}[no_telp]"
            value="{{ old("{$oldPrefix}.no_telp", $parent?->no_telp) }}"
            {{ $required ? 'required' : '' }}
            class="mt-1 block w-full border border-gray-300 rounded-md p-2">
        @error("{$oldPrefix}.no_telp")
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
</div>
