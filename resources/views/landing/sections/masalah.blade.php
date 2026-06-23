@php
    $masalah = $settings['masalah'] ?? [];
    $items = json_decode($masalah['items'] ?? '[]', true) ?: [];
@endphp
<section id="masalah" class="bg-[#091525] px-6 py-20 md:py-28 lg:px-8">
    <div class="mx-auto max-w-7xl">
        <div class="max-w-3xl">
            <p class="font-mono text-xs uppercase tracking-[.24em] text-[#C9A84C]">Masalah Utama</p>
            <h2 class="mt-4 font-display text-4xl font-semibold leading-tight text-[#F0F4FF] md:text-6xl">{{ $masalah['title'] ?? '' }}</h2>
            <p class="mt-6 text-lg leading-8 text-[#A8B8D0]">{{ $masalah['subtitle'] ?? '' }}</p>
        </div>
        <div class="mt-14 grid gap-5 md:grid-cols-2 lg:grid-cols-4">
            @foreach($items as $item)
                <article class="group rounded-2xl border border-white/10 bg-[#0D1E35]/80 p-6 transition hover:-translate-y-1 hover:border-[#C9A84C]/40 hover:bg-[#112540] motion-reduce:transform-none">
                    <div class="mb-6 flex h-12 w-12 items-center justify-center rounded-xl border border-[#C9A84C]/30 bg-[#C9A84C]/10 text-[#E8C96A]">
                        <span class="font-mono text-sm">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                    </div>
                    <h3 class="text-lg font-semibold text-white">{{ $item['title'] ?? '' }}</h3>
                    <p class="mt-3 text-sm leading-6 text-[#A8B8D0]">{{ $item['description'] ?? '' }}</p>
                </article>
            @endforeach
        </div>
    </div>
</section>
