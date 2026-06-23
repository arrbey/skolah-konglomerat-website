@php
    $contact = $settings['contact'] ?? [];
    $wa = preg_replace('/\D+/', '', $contact['whatsapp_number'] ?? '');
    $waUrl = $wa ? 'https://wa.me/'.$wa.'?text='.rawurlencode($contact['whatsapp_message'] ?? '') : '#';
@endphp
<section id="contact" class="bg-[#091525] px-6 py-20 md:py-28 lg:px-8">
    <div class="mx-auto grid max-w-7xl gap-10 lg:grid-cols-2 lg:items-start">
        <div>
            <p class="font-mono text-xs uppercase tracking-[.24em] text-[#C9A84C]">Contact Us</p>
            <h2 class="mt-4 font-display text-4xl font-semibold leading-tight text-[#F0F4FF] md:text-6xl">{{ $contact['title'] ?? '' }}</h2>
            <p class="mt-6 text-lg leading-8 text-[#A8B8D0]">{{ $contact['subtitle'] ?? '' }}</p>
            <div class="mt-8 space-y-3 text-[#A8B8D0]">
                @if(!empty($contact['email']))<p>Email: {{ $contact['email'] }}</p>@endif
                @if(!empty($contact['address']))<p>Alamat: {{ $contact['address'] }}</p>@endif
            </div>
            <a href="{{ $waUrl }}" target="_blank" rel="noopener" class="mt-8 inline-flex min-h-12 items-center justify-center rounded-full bg-[#1B6FE8] px-7 text-sm font-semibold text-white hover:bg-[#2B82FF] focus:outline-none focus:ring-2 focus:ring-[#C9A84C] focus:ring-offset-2 focus:ring-offset-[#091525]">Chat WhatsApp</a>
        </div>

        @if(($contact['form_enabled'] ?? '1') === '1')
            <form method="POST" action="{{ route('contact.send') }}" class="rounded-3xl border border-white/10 bg-[#0D1E35] p-6 md:p-8">
                @csrf
                @if(session('success'))
                    <div class="mb-5 rounded-2xl border border-emerald-400/30 bg-emerald-400/10 p-4 text-sm text-emerald-200">{{ session('success') }}</div>
                @endif
                <div class="space-y-5">
                    <div>
                        <label for="name" class="text-sm font-medium text-white">Nama</label>
                        <input id="name" name="name" value="{{ old('name') }}" required class="mt-2 w-full rounded-xl border-white/10 bg-[#091525] text-white focus:border-[#C9A84C] focus:ring-[#C9A84C]">
                        @error('name')<p class="mt-2 text-sm text-red-300">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label for="email" class="text-sm font-medium text-white">Email</label>
                        <input id="email" name="email" type="email" value="{{ old('email') }}" required class="mt-2 w-full rounded-xl border-white/10 bg-[#091525] text-white focus:border-[#C9A84C] focus:ring-[#C9A84C]">
                        @error('email')<p class="mt-2 text-sm text-red-300">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label for="message" class="text-sm font-medium text-white">Pesan</label>
                        <textarea id="message" name="message" rows="5" required class="mt-2 w-full rounded-xl border-white/10 bg-[#091525] text-white focus:border-[#C9A84C] focus:ring-[#C9A84C]">{{ old('message') }}</textarea>
                        @error('message')<p class="mt-2 text-sm text-red-300">{{ $message }}</p>@enderror
                    </div>
                    <button class="min-h-12 rounded-full bg-[#C9A84C] px-7 text-sm font-semibold text-[#050D1A] hover:bg-[#E8C96A] focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-[#0D1E35]">Kirim Pesan</button>
                </div>
            </form>
        @endif
    </div>
</section>
