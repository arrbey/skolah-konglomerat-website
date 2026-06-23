@php
    $faqSettings = $settings['faq'] ?? [];
@endphp
<section id="faq" class="bg-[#050D1A] px-6 py-20 md:py-28 lg:px-8">
    <div class="mx-auto max-w-4xl">
        <div class="text-center">
            <p class="font-mono text-xs uppercase tracking-[.24em] text-[#C9A84C]">FAQ</p>
            <h2 class="mt-4 font-display text-4xl font-semibold leading-tight text-[#F0F4FF] md:text-6xl">{{ $faqSettings['title'] ?? '' }}</h2>
            <p class="mt-6 text-lg leading-8 text-[#A8B8D0]">{{ $faqSettings['subtitle'] ?? '' }}</p>
        </div>
        <div class="mt-12 divide-y divide-white/10 rounded-3xl border border-white/10 bg-[#0D1E35]" x-data="{ open: 0 }">
            @foreach($faqs as $faq)
                <div class="p-6">
                    <button type="button" class="flex min-h-11 w-full items-center justify-between gap-4 text-left text-lg font-semibold text-white focus:outline-none focus:ring-2 focus:ring-[#C9A84C]" @click="open = open === {{ $loop->index }} ? null : {{ $loop->index }}">
                        <span>{{ $faq->question }}</span>
                        <span class="text-[#C9A84C]" x-text="open === {{ $loop->index }} ? '−' : '+'"></span>
                    </button>
                    <div x-show="open === {{ $loop->index }}" x-collapse class="pt-4 text-[#A8B8D0]" @if(!$loop->first) style="display:none" @endif>
                        <p class="leading-7">{{ $faq->answer }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
