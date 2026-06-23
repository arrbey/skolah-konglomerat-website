<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $settings['hero']['title'] ?? config('app.name') }}</title>
    <meta name="description" content="{{ $settings['hero']['subtitle'] ?? 'Website Skolah Konglomerat' }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&family=DM+Mono:wght@400;500&family=DM+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#050D1A] text-slate-100 antialiased selection:bg-[#C9A84C] selection:text-[#050D1A]">
    <main>
        @include('landing.sections.hero')
        @include('landing.sections.masalah')
        @include('landing.sections.kenapa')
        @include('landing.sections.training')
        @include('landing.sections.faq')
        @include('landing.sections.contact')
    </main>
    @include('landing.sections.footer')
</body>
</html>
