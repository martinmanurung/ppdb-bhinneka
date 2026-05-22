<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir PPDB - {{ $student->nama_lengkap }}</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; color: #111; margin: 24px; }
        h1 { font-size: 18px; margin-bottom: 4px; }
        h2 { font-size: 14px; margin: 20px 0 8px; border-bottom: 1px solid #ccc; padding-bottom: 4px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 12px; }
        td { padding: 6px 8px; vertical-align: top; }
        td.label { width: 32%; font-weight: bold; }
        .header { text-align: center; margin-bottom: 24px; }
        .meta { font-size: 11px; color: #555; }
        @media print {
            .no-print { display: none; }
            body { margin: 12px; }
        }
    </style>
</head>
<body>
    <div class="no-print" style="margin-bottom: 16px;">
        <button onclick="window.print()" style="padding: 8px 16px; cursor: pointer;">Cetak Formulir</button>
        <button onclick="window.close()" style="padding: 8px 16px; cursor: pointer; margin-left: 8px;">Tutup</button>
    </div>

    <div class="header">
        <h1>FORMULIR PENDAFTARAN PPDB</h1>
        <p class="meta">Sekolah Bhinneka</p>
        <p class="meta">Dicetak: {{ now()->format('d/m/Y H:i') }} | No. Reg: PPDB-{{ str_pad($student->id, 5, '0', STR_PAD_LEFT) }}</p>
    </div>

    <h2>A. Data Calon Siswa</h2>
    <table>
        <tr><td class="label">Nama Lengkap</td><td>{{ $student->nama_lengkap }}</td></tr>
        <tr><td class="label">Nama Panggilan</td><td>{{ $student->nama_panggilan ?? '-' }}</td></tr>
        <tr><td class="label">NISN</td><td>{{ $student->nisn ?? '-' }}</td></tr>
        <tr><td class="label">Jenjang</td><td>{{ $student->jenjang ?? '-' }}</td></tr>
        <tr><td class="label">Tempat, Tanggal Lahir</td><td>{{ $student->tempat_lahir }}, {{ $student->tanggal_lahir->format('d-m-Y') }}</td></tr>
        <tr><td class="label">Jenis Kelamin</td><td>{{ $student->jenis_kelamin }}</td></tr>
        <tr><td class="label">Agama</td><td>{{ $student->agama }}</td></tr>
        <tr><td class="label">Kewarganegaraan</td><td>{{ $student->kewarganegaraan ?? 'Indonesia' }}</td></tr>
        <tr><td class="label">Alamat</td><td>{{ $student->alamat_jalan }}, {{ $student->kota_kabupaten }}, {{ $student->provinsi }}</td></tr>
        <tr><td class="label">Asal Sekolah</td><td>{{ $student->asal_sekolah }}</td></tr>
        <tr><td class="label">Anak Ke / Saudara</td><td>{{ $student->anak_ke ?? '-' }} / {{ $student->jumlah_saudara_kandung ?? '-' }}</td></tr>
    </table>

    <h2>B. Kontak Pendaftar</h2>
    <table>
        <tr><td class="label">Email</td><td>{{ $student->user->email }}</td></tr>
        <tr><td class="label">WhatsApp</td><td>{{ $student->user->whatsapp }}</td></tr>
        <tr><td class="label">Tanggal Submit Online</td><td>{{ $student->submitted_at?->format('d/m/Y H:i') ?? '-' }}</td></tr>
    </table>

    @foreach ($student->parents as $parent)
        <h2>C. Data {{ $parent->jenis_wali }} — {{ $parent->nama_lengkap }}</h2>
        <table>
            <tr><td class="label">NIK</td><td>{{ $parent->nik ?? '-' }}</td></tr>
            <tr><td class="label">Tempat, Tanggal Lahir</td><td>{{ $parent->tempat_lahir }}, {{ $parent->tanggal_lahir->format('d-m-Y') }}</td></tr>
            <tr><td class="label">Agama</td><td>{{ $parent->agama }}</td></tr>
            <tr><td class="label">Pendidikan</td><td>{{ $parent->pendidikan ?? '-' }}</td></tr>
            <tr><td class="label">Pekerjaan</td><td>{{ $parent->pekerjaan }}</td></tr>
            <tr><td class="label">Penghasilan</td><td>{{ $parent->penghasilan ? 'Rp ' . number_format($parent->penghasilan, 0, ',', '.') : '-' }}</td></tr>
            <tr><td class="label">No. Telepon</td><td>{{ $parent->no_telp }}</td></tr>
            @if ($parent->jenis_wali === 'Wali')
                <tr><td class="label">Hubungan</td><td>{{ $parent->hubungan_wali ?? '-' }}</td></tr>
            @endif
        </table>
    @endforeach

    <h2>D. Checklist Berkas Fisik (Verifikasi di Sekolah)</h2>
    <table border="1" style="border: 1px solid #ccc;">
        @foreach (\App\Models\Student::REQUIRED_PHYSICAL_DOCUMENTS as $label)
            <tr>
                <td style="width: 40px; text-align: center;">☐</td>
                <td>{{ $label }}</td>
                <td style="width: 120px;">Sesuai / Tidak</td>
            </tr>
        @endforeach
    </table>

    <h2>E. Verifikasi & Pembayaran (Diisi Admin)</h2>
    <table>
        <tr><td class="label">Data formulir sesuai berkas fisik</td><td>☐ Ya &nbsp;&nbsp; ☐ Tidak</td></tr>
        <tr><td class="label">Pembayaran administrasi</td><td>☐ Sudah dibayar &nbsp;&nbsp; Tanggal: _______________</td></tr>
        <tr><td class="label">Paraf Petugas</td><td style="height: 60px;"></td></tr>
    </table>

    <p class="meta" style="margin-top: 24px;">Formulir ini dicetak dari data pendaftaran online. Cocokkan setiap isian dengan berkas asli sebelum mengubah status menjadi Terverifikasi di sistem.</p>
</body>
</html>
