<dl class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
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
    ] as $label => $value)
        <div>
            <dt class="text-slate-400 text-xs">{{ $label }}</dt>
            <dd class="font-medium text-slate-900 mt-1">{{ $value }}</dd>
        </div>
    @endforeach
    <div class="sm:col-span-2">
        <dt class="text-slate-400 text-xs">Alamat</dt>
        <dd class="font-medium text-slate-900 mt-1">{{ $student->alamat_jalan }}, {{ $student->kota_kabupaten }}, {{ $student->provinsi }}</dd>
    </div>
</dl>
