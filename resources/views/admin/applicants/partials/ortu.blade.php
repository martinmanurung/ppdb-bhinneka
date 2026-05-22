<dl class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
    <div><dt class="text-slate-400 text-xs">NIK</dt><dd class="font-medium mt-1">{{ $ortu->nik ?? '-' }}</dd></div>
    <div><dt class="text-slate-400 text-xs">Kewarganegaraan</dt><dd class="font-medium mt-1">{{ $ortu->kewarganegaraan }}</dd></div>
    <div><dt class="text-slate-400 text-xs">Tempat Lahir</dt><dd class="font-medium mt-1">{{ $ortu->tempat_lahir }}</dd></div>
    <div><dt class="text-slate-400 text-xs">Tanggal Lahir</dt><dd class="font-medium mt-1">{{ $ortu->tanggal_lahir->format('d-m-Y') }}</dd></div>
    <div><dt class="text-slate-400 text-xs">Pekerjaan</dt><dd class="font-medium mt-1">{{ $ortu->pekerjaan }}</dd></div>
    <div><dt class="text-slate-400 text-xs">Telepon</dt><dd class="font-medium mt-1">{{ $ortu->no_telp }}</dd></div>
    @if (!empty($isWali) && $ortu->hubungan_kerabat)
        <div><dt class="text-slate-400 text-xs">Hubungan</dt><dd class="font-medium mt-1">{{ $ortu->hubungan_kerabat }}</dd></div>
    @endif
    <div class="sm:col-span-2"><dt class="text-slate-400 text-xs">Alamat</dt><dd class="font-medium mt-1">{{ $ortu->alamat }}</dd></div>
</dl>
