@php
    $trainingSettings = $settings['training'] ?? [];
@endphp
<section id="training" class="bg-[#091525] px-6 py-20 md:py-28 lg:px-8" x-data="{ image: null }">
    <div class="mx-auto max-w-7xl">
        <div class="mx-auto max-w-3xl text-center">
            <p class="font-mono text-xs uppercase tracking-[.24em] text-[#C9A84C]">Program Kami</p>
            <h2 class="mt-4 font-display text-4xl font-semibold leading-tight text-[#F0F4FF] md:text-6xl">{{ $trainingSettings['title'] ?? '' }}</h2>
            <p class="mt-6 text-lg leading-8 text-[#A8B8D0]">{{ $trainingSettings['subtitle'] ?? '' }}</p>
        </div>
        <div class="mt-14 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @forelse($trainings as $training)
                <article class="overflow-hidden rounded-3xl border border-white/10 bg-[#0D1E35] transition hover:-translate-y-1 hover:border-[#C9A84C]/40 motion-reduce:transform-none">
                    <button type="button" class="block aspect-[4/5] w-full bg-[#112540] text-left focus:outline-none focus:ring-2 focus:ring-[#C9A84C]" @click="image = '{{ $training->image_url }}'" @disabled(!$training->image_url)>
                        @if($training->image_url)
                            <img src="{{ $training->image_url }}" alt="Brosur {{ $training->title }}" class="h-full w-full object-cover" loading="lazy">
                        @else
                            <div class="flex h-full items-center justify-center p-8 text-center text-[#A8B8D0]">Brosur segera hadir</div>
                        @endif
                    </button>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-white">{{ $training->title }}</h3>
                        <p class="mt-3 min-h-16 text-sm leading-6 text-[#A8B8D0]">{{ $training->description }}</p>
                        @if($training->cta_url)
                            <a href="{{ $training->cta_url }}" target="_blank" rel="noopener" class="mt-6 inline-flex min-h-11 items-center justify-center rounded-full bg-[#1B6FE8] px-5 text-sm font-semibold text-white hover:bg-[#2B82FF] focus:outline-none focus:ring-2 focus:ring-[#C9A84C] focus:ring-offset-2 focus:ring-offset-[#0D1E35]">{{ $training->cta_text }}</a>
                        @endif
                    </div>
                </article>
            @empty
                <div class="col-span-full rounded-3xl border border-dashed border-white/15 p-10 text-center text-[#A8B8D0]">Program training segera tersedia.</div>
            @endforelse
        </div>
    </div>

    <div x-show="image" x-transition.opacity class="fixed inset-0 z-50 grid place-items-center bg-black/80 p-4" @keydown.escape.window="image = null" style="display:none">
        <button type="button" class="absolute right-5 top-5 min-h-11 rounded-full border border-white/20 px-4 text-white" @click="image = null">Tutup</button>
        <img :src="image" alt="Preview brosur training" class="max-h-[86dvh] max-w-full rounded-2xl object-contain shadow-2xl">
    </div>
</section>
