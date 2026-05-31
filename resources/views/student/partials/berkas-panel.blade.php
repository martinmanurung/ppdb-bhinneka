@props([
    'compact' => false,
    'showDownload' => true,
    'variant' => 'default',
])

<div {{ $attributes->merge(['class' => 'rounded-2xl border ' . ($variant === 'amber' ? 'bg-amber-50 border-amber-200' : 'bg-white border-slate-100 shadow-sm') . ' p-5']) }}>
    <div class="flex flex-wrap items-start justify-between gap-3 mb-4">
        <div>
            <h2 class="font-bold {{ $variant === 'amber' ? 'text-amber-900' : 'text-slate-800' }} text-base flex items-center gap-2">
                <i class="fas fa-folder-open"></i>
                Berkas yang Perlu Dibawa ke Sekolah
            </h2>
            @unless ($compact)
                <p class="text-xs {{ $variant === 'amber' ? 'text-amber-700' : 'text-slate-500' }} mt-1">
                    Siapkan semua berkas berikut untuk penyerahan ke sekolah setelah formulir online dikirim.
                </p>
            @endunless
        </div>
        @if ($compact)
            <a href="{{ route('student.berkas') }}" class="text-xs font-semibold text-teal-600 hover:text-teal-700 whitespace-nowrap">
                Lihat lengkap <i class="fas fa-arrow-right ml-1"></i>
            </a>
        @endif
    </div>

    @if ($compact)
        <ol class="text-sm space-y-2 {{ $variant === 'amber' ? 'text-amber-900' : 'text-slate-600' }}">
            @foreach (\App\Models\Pendaftaran::REQUIRED_PHYSICAL_DOCUMENTS as $doc)
                <li class="flex gap-2">
                    <span class="font-bold uppercase text-teal-600 shrink-0">{{ $doc['letter'] }}.</span>
                    <span>{{ $doc['label'] }}@if (! empty($doc['note'])) <span class="text-xs opacity-80">({{ $doc['note'] }})</span>@endif</span>
                </li>
            @endforeach
        </ol>
    @else
        <x-berkas-fisik-list :variant="$variant === 'amber' ? 'amber' : 'default'" :show-download="$showDownload" />
    @endif
</div>
