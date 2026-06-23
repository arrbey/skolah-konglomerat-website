@php
    $kenapa = $settings['kenapa'] ?? [];
    $items = json_decode($kenapa['items'] ?? '[]', true) ?: [];
    $stats = json_decode($kenapa['stats'] ?? '[]', true) ?: [];
@endphp
<section id="kenapa" class="bg-[#050D1A] px-6 py-20 md:py-28 lg:px-8">
    <div class="mx-auto max-w-7xl">
        <div class="grid gap-12 lg:grid-cols-[.9fr_1.1fr] lg:items-start">
            <div>
                <p class="font-mono text-xs uppercase tracking-[.24em] text-[#C9A84C]">Diferensiasi</p>
                <h2 class="mt-4 font-display text-4xl font-semibold leading-tight text-[#F0F4FF] md:text-6xl">{{ $kenapa['title'] ?? '' }}</h2>
                <p class="mt-6 text-lg leading-8 text-[#A8B8D0]">{{ $kenapa['subtitle'] ?? '' }}</p>
                <div class="mt-10 grid grid-cols-3 gap-3">
                    @foreach($stats as $stat)
                        <div class="rounded-2xl border border-white/10 bg-white/[.03] p-4">
                            <div class="font-mono text-2xl text-[#C9A84C]">{{ $stat['value'] ?? '' }}</div>
                            <div class="mt-2 text-xs leading-5 text-[#A8B8D0]">{{ $stat['label'] ?? '' }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="grid gap-5">
                @foreach($items as $item)
                    <article class="rounded-3xl border border-white/10 bg-[#0D1E35] p-7 shadow-2xl shadow-black/20">
                        <p class="font-mono text-xs uppercase tracking-[.2em] text-[#C9A84C]">Pilar {{ $loop->iteration }}</p>
                        <h3 class="mt-3 text-2xl font-semibold text-white">{{ $item['title'] ?? '' }}</h3>
                        <p class="mt-3 leading-7 text-[#A8B8D0]">{{ $item['description'] ?? '' }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </div>
</section>
