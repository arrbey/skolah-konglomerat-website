@extends('admin.layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="grid gap-5 md:grid-cols-3">
    <div class="rounded-3xl border border-white/10 bg-[#0D1E35] p-6"><p class="text-sm text-[#A8B8D0]">Training Aktif</p><p class="mt-3 font-mono text-4xl text-[#C9A84C]">{{ $activeTrainings }}</p></div>
    <div class="rounded-3xl border border-white/10 bg-[#0D1E35] p-6"><p class="text-sm text-[#A8B8D0]">FAQ Aktif</p><p class="mt-3 font-mono text-4xl text-[#C9A84C]">{{ $activeFaqs }}</p></div>
    <div class="rounded-3xl border border-white/10 bg-[#0D1E35] p-6"><p class="text-sm text-[#A8B8D0]">Pesan Belum Dibaca</p><p class="mt-3 font-mono text-4xl text-[#C9A84C]">{{ $unreadMessages }}</p></div>
</div>
<div class="mt-8 rounded-3xl border border-white/10 bg-[#0D1E35] p-6">
    <h2 class="text-lg font-semibold">Checklist Konten</h2>
    <div class="mt-4 grid gap-3 md:grid-cols-2">
        @foreach($warnings as $warning)
            <div class="rounded-xl border border-amber-400/20 bg-amber-400/10 p-4 text-sm text-amber-100">{{ $warning }}</div>
        @endforeach
        @if(empty($warnings))
            <div class="rounded-xl border border-emerald-400/20 bg-emerald-400/10 p-4 text-sm text-emerald-100">Semua konten utama sudah terisi.</div>
        @endif
    </div>
</div>
@endsection
