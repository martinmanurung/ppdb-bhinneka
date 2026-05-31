@props([
    'documents' => \App\Models\Pendaftaran::REQUIRED_PHYSICAL_DOCUMENTS,
    'variant' => 'default',
    'showDownload' => false,
])

@if ($variant === 'print')
    <table border="1" style="border:1px solid #ccc; width:100%; border-collapse:collapse">
        <thead>
            <tr>
                <th width="40" style="padding:6px">☐</th>
                <th style="padding:6px;text-align:left">Berkas</th>
                <th width="100" style="padding:6px">Cek</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($documents as $doc)
                <tr>
                    <td style="padding:6px;text-align:center">☐</td>
                    <td style="padding:6px">
                        <strong>{{ strtoupper($doc['letter']) }}.</strong>
                        {{ $doc['label'] }}
                        @if (! empty($doc['note']))
                            <em>({{ $doc['note'] }})</em>
                        @endif
                    </td>
                    <td style="padding:6px">Sesuai / Tidak</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <ul {{ $attributes->merge(['class' => 'space-y-3 text-sm']) }}>
        @foreach ($documents as $doc)
            <li class="flex gap-3 {{ $variant === 'compact' ? 'items-start' : '' }}">
                <span class="shrink-0 w-7 h-7 rounded-lg bg-teal-100 text-teal-800 font-bold text-xs flex items-center justify-center uppercase">
                    {{ $doc['letter'] }}
                </span>
                <span class="{{ $variant === 'amber' ? 'text-amber-900' : 'text-slate-700' }}">
                    <span class="font-medium">{{ $doc['label'] }}</span>
                    @if (! empty($doc['note']))
                        <span class="block text-xs mt-0.5 {{ $variant === 'amber' ? 'text-amber-700' : 'text-slate-500' }}">{{ $doc['note'] }}</span>
                    @endif
                </span>
            </li>
        @endforeach
    </ul>
    @if ($showDownload)
        <a href="{{ route('student.surat-pernyataan') }}"
            class="inline-flex items-center gap-2 mt-4 text-sm font-semibold text-teal-700 hover:text-teal-800">
            <i class="fas fa-file-pdf"></i> Unduh template surat pernyataan
        </a>
    @endif
@endif
