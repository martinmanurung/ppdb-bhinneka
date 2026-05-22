<table>
    <tr><td class="label">NIK</td><td>{{ $ortu->nik ?? '-' }}</td></tr>
    <tr><td class="label">TTL</td><td>{{ $ortu->tempat_lahir }}, {{ $ortu->tanggal_lahir->format('d-m-Y') }}</td></tr>
    <tr><td class="label">Pekerjaan</td><td>{{ $ortu->pekerjaan }}</td></tr>
    <tr><td class="label">Telepon</td><td>{{ $ortu->no_telp }}</td></tr>
    @if (!empty($isWali) && $ortu->hubungan_kerabat)
        <tr><td class="label">Hubungan</td><td>{{ $ortu->hubungan_kerabat }}</td></tr>
    @endif
    <tr><td class="label">Alamat</td><td>{{ $ortu->alamat }}</td></tr>
</table>
