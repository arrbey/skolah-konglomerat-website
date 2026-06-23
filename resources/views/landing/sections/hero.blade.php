@php
    $hero = $settings['hero'] ?? [];
@endphp
<section id="hero" class="relative isolate min-h-dvh overflow-hidden bg-[#050D1A]">
    <div class="absolute inset-0 -z-30 bg-[linear-gradient(135deg,#030711_0%,#061326_42%,#0A1830_100%)]"></div>
    <div class="hero-luxury-atmosphere absolute inset-0 -z-20"></div>
    <div class="hero-blueprint absolute inset-0 -z-10"></div>
    <div class="absolute left-1/2 top-24 -z-10 h-[520px] w-[520px] -translate-x-1/2 rounded-full bg-[#C9A84C]/10 blur-[110px]"></div>
    <div class="absolute -right-28 top-24 -z-10 h-[560px] w-[560px] rounded-full bg-[#1B6FE8]/20 blur-[120px]"></div>
    <div class="absolute bottom-0 left-0 -z-10 h-48 w-full bg-gradient-to-t from-[#050D1A] to-transparent"></div>

    <nav class="mx-auto flex max-w-7xl items-center justify-between px-6 py-6 lg:px-8">
        <a href="#hero" class="font-mono text-xs uppercase tracking-[.24em] text-[#C9A84C]">Skolah Konglomerat</a>
        <div class="hidden items-center gap-8 text-sm text-slate-300 md:flex">
            <a href="#masalah" class="hover:text-white">Masalah</a>
            <a href="#kenapa" class="hover:text-white">Kenapa</a>
            <a href="#training" class="hover:text-white">Training</a>
            <a href="#faq" class="hover:text-white">FAQ</a>
            <a href="#contact" class="hover:text-white">Contact</a>
        </div>
    </nav>

    <div class="mx-auto grid min-h-[calc(100dvh-88px)] max-w-7xl place-items-center px-6 py-20 lg:px-8">
        <div class="relative max-w-5xl text-center motion-safe:animate-[fade-up_.8s_ease-out_both]">
            <div class="mx-auto mb-8 h-px w-28 bg-gradient-to-r from-transparent via-[#C9A84C] to-transparent"></div>
            <p class="mb-6 font-mono text-xs uppercase tracking-[.32em] text-[#C9A84C]">Wealth Architecture</p>
            <h1 class="font-display text-[clamp(3.5rem,8vw,7rem)] font-semibold leading-[.95] tracking-tight text-[#F8FAFF] drop-shadow-[0_20px_70px_rgba(0,0,0,.45)]">
                {{ $hero['title'] ?? 'Bangun Imperium Bisnis Anda Seperti Konglomerat' }}
            </h1>
            <p class="mx-auto mt-8 max-w-3xl text-lg font-light leading-8 text-[#B7C5DD] md:text-xl">
                {{ $hero['subtitle'] ?? '' }}
            </p>
            <div class="mt-10 flex flex-col items-center justify-center gap-4 sm:flex-row">
                <a href="{{ $hero['cta_primary_url'] ?? '#training' }}" class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#1B6FE8] px-7 py-3 text-sm font-semibold text-white shadow-[0_0_40px_rgba(27,111,232,.25)] transition hover:bg-[#2B82FF] focus:outline-none focus:ring-2 focus:ring-[#C9A84C] focus:ring-offset-2 focus:ring-offset-[#050D1A]">
                    {{ $hero['cta_primary_text'] ?? 'Daftar Training Sekarang' }}
                </a>
                <a href="{{ $hero['cta_secondary_url'] ?? '#masalah' }}" class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#7A6228] px-7 py-3 text-sm font-semibold text-[#E8C96A] transition hover:border-[#C9A84C] hover:bg-white/5 focus:outline-none focus:ring-2 focus:ring-[#C9A84C] focus:ring-offset-2 focus:ring-offset-[#050D1A]">
                    {{ $hero['cta_secondary_text'] ?? 'Pelajari Lebih Lanjut' }}
                </a>
            </div>
        </div>
    </div>
</section>
