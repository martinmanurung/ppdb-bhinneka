@php $student = $pendaftaran->student; @endphp
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Formulir {{ $pendaftaran->nomor_pendaftaran }}</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; margin: 24px; }
        h1 { font-size: 18px; margin-bottom: 4px; }
        h2 { font-size: 14px; margin: 20px 0 8px; border-bottom: 1px solid #ccc; padding-bottom: 4px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 12px; }
        td { padding: 6px 8px; vertical-align: top; }
        td.label { width: 32%; font-weight: bold; }
        .header { text-align: center; margin-bottom: 24px; }
        .meta { font-size: 11px; color: #555; }
        @media print { .no-print { display: none; } }
    </style>
</head>
<body>
    <div class="no-print" style="margin-bottom: 16px;">
        <button onclick="window.print()">Cetak</button>
        <button onclick="window.close()">Tutup</button>
    </div>

    <div class="header">
        <h1>FORMULIR PENDAFTARAN PPDB</h1>
        <p class="meta">Sekolah Bhinneka</p>
        <p class="meta">{{ $pendaftaran->nomor_pendaftaran }} | Dicetak: {{ now()->format('d/m/Y H:i') }}</p>
    </div>

    <h2>A. Data Calon Siswa</h2>
    <table>
        <tr><td class="label">Nama Lengkap</td><td>{{ $student->nama_lengkap }}</td></tr>
        <tr><td class="label">NISN</td><td>{{ $student->nisn ?? '-' }}</td></tr>
        <tr><td class="label">Jenjang</td><td>{{ $student->jenjang ?? '-' }}</td></tr>
        <tr><td class="label">TTL</td><td>{{ $student->tempat_lahir }}, {{ $student->tanggal_lahir->format('d-m-Y') }}</td></tr>
        <tr><td class="label">Alamat</td><td>{{ $student->alamat_jalan }}, {{ $student->kota_kabupaten }}, {{ $student->provinsi }}</td></tr>
        <tr><td class="label">Asal Sekolah</td><td>{{ $student->asal_sekolah }}</td></tr>
    </table>

    <h2>B. Kontak</h2>
    <table>
        <tr><td class="label">Email</td><td>{{ $pendaftaran->user->email }}</td></tr>
        <tr><td class="label">WhatsApp</td><td>{{ $pendaftaran->user->whatsapp }}</td></tr>
        <tr><td class="label">Submit Online</td><td>{{ $pendaftaran->submitted_at?->format('d/m/Y H:i') ?? '-' }}</td></tr>
    </table>

    @if ($pendaftaran->ayah)
        <h2>C. Data Ayah — {{ $pendaftaran->ayah->nama_lengkap }}</h2>
        @include('admin.applicants.partials.ortu-print', ['ortu' => $pendaftaran->ayah])
    @endif

    @if ($pendaftaran->ibu)
        <h2>D. Data Ibu — {{ $pendaftaran->ibu->nama_lengkap }}</h2>
        @include('admin.applicants.partials.ortu-print', ['ortu' => $pendaftaran->ibu])
    @endif

    @if ($pendaftaran->wali)
        <h2>E. Data Wali — {{ $pendaftaran->wali->nama_lengkap }}</h2>
        @include('admin.applicants.partials.ortu-print', ['ortu' => $pendaftaran->wali, 'isWali' => true])
    @endif

    <h2>Checklist Berkas Fisik</h2>
    <table border="1" style="border:1px solid #ccc">
        @foreach (\App\Models\Pendaftaran::REQUIRED_PHYSICAL_DOCUMENTS as $label)
            <tr><td width="40">☐</td><td>{{ $label }}</td><td width="100">Sesuai / Tidak</td></tr>
        @endforeach
    </table>
</body>
</html>
