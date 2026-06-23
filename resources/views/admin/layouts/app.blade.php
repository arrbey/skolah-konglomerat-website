<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin') — {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#050D1A] text-slate-100 antialiased">
<div class="min-h-dvh md:flex">
    <aside class="border-b border-white/10 bg-[#091525] p-5 md:min-h-dvh md:w-72 md:border-b-0 md:border-r">
        <a href="{{ route('admin.dashboard') }}" class="font-mono text-xs uppercase tracking-[.24em] text-[#C9A84C]">Skolah Admin</a>
        <nav class="mt-8 grid gap-2 text-sm">
            @php($links = [
                ['admin.dashboard','Dashboard'], ['admin.hero.edit','Hero'], ['admin.masalah.edit','Masalah'], ['admin.kenapa.edit','Kenapa'], ['admin.training.index','Training'], ['admin.faq.index','FAQ'], ['admin.contact.edit','Contact'], ['admin.footer.edit','Footer']
            ])
            @foreach($links as [$route, $label])
                <a href="{{ route($route) }}" class="rounded-xl px-4 py-3 {{ request()->routeIs($route) ? 'bg-[#C9A84C] text-[#050D1A]' : 'text-[#A8B8D0] hover:bg-white/5 hover:text-white' }}">{{ $label }}</a>
            @endforeach
        </nav>
    </aside>
    <div class="min-w-0 flex-1">
        <header class="flex items-center justify-between border-b border-white/10 bg-[#091525]/80 px-6 py-4">
            <div>
                <h1 class="text-xl font-semibold text-white">@yield('title', 'Admin')</h1>
                <a href="{{ route('home') }}" target="_blank" class="text-sm text-[#A8B8D0] hover:text-white">Preview landing</a>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="rounded-full border border-white/10 px-4 py-2 text-sm text-[#A8B8D0] hover:text-white">Logout</button>
            </form>
        </header>
        <main class="p-6">
            @if(session('success'))<div class="mb-6 rounded-2xl border border-emerald-400/30 bg-emerald-400/10 p-4 text-emerald-200">{{ session('success') }}</div>@endif
            @if(session('error'))<div class="mb-6 rounded-2xl border border-red-400/30 bg-red-400/10 p-4 text-red-200">{{ session('error') }}</div>@endif
            @yield('content')
        </main>
    </div>
</div>
</body>
</html>
