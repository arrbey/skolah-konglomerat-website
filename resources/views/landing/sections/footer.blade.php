@php
    $footer = $settings['footer'] ?? [];
@endphp
<footer class="bg-[#050D1A] px-6 py-10 lg:px-8">
    <div class="mx-auto flex max-w-7xl flex-col gap-6 border-t border-white/10 pt-8 md:flex-row md:items-center md:justify-between">
        <div>
            <p class="font-mono text-xs uppercase tracking-[.24em] text-[#C9A84C]">Skolah Konglomerat</p>
            <p class="mt-3 max-w-md text-sm leading-6 text-[#A8B8D0]">{{ $footer['tagline'] ?? '' }}</p>
        </div>
        <div class="flex flex-wrap gap-5 text-sm text-[#A8B8D0]">
            <a href="#hero" class="hover:text-white">Home</a>
            <a href="#training" class="hover:text-white">Training</a>
            <a href="#faq" class="hover:text-white">FAQ</a>
            <a href="#contact" class="hover:text-white">Contact</a>
        </div>
        <p class="text-sm text-[#637A96]">{{ $footer['copyright_text'] ?? '' }}</p>
    </div>
</footer>
