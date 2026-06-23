@extends('admin.layouts.app')
@section('title', 'FAQ')
@section('content')
<div class="mb-6 flex justify-end"><a href="{{ route('admin.faq.create') }}" class="rounded-full bg-[#C9A84C] px-5 py-3 font-semibold text-[#050D1A]">Tambah FAQ</a></div>
<div class="overflow-hidden rounded-3xl border border-white/10 bg-[#0D1E35]">
<table class="w-full text-left text-sm">
<thead class="bg-white/5 text-[#A8B8D0]"><tr><th class="p-4">Pertanyaan</th><th class="p-4">Status</th><th class="p-4">Urutan</th><th class="p-4">Aksi</th></tr></thead>
<tbody class="divide-y divide-white/10">
@foreach($faqs as $faq)
<tr><td class="p-4 font-medium text-white">{{ $faq->question }}</td><td class="p-4">{{ $faq->is_active ? 'Aktif' : 'Nonaktif' }}</td><td class="p-4">{{ $faq->sort_order }}</td><td class="p-4"><div class="flex flex-wrap gap-2"><a class="text-[#C9A84C]" href="{{ route('admin.faq.edit', $faq) }}">Edit</a><form method="POST" action="{{ route('admin.faq.toggle', $faq) }}">@csrf @method('PATCH')<button class="text-blue-300">Toggle</button></form><form method="POST" action="{{ route('admin.faq.destroy', $faq) }}" onsubmit="return confirm('Hapus FAQ?')">@csrf @method('DELETE')<button class="text-red-300">Hapus</button></form></div></td></tr>
@endforeach
</tbody>
</table>
</div>
<div class="mt-6">{{ $faqs->links() }}</div>
@endsection
