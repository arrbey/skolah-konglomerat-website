@extends('admin.layouts.app')
@section('title', $faq->exists ? 'Edit FAQ' : 'Tambah FAQ')
@section('content')
<form method="POST" action="{{ $faq->exists ? route('admin.faq.update', $faq) : route('admin.faq.store') }}" class="max-w-3xl rounded-3xl border border-white/10 bg-[#0D1E35] p-6">
@csrf
@if($faq->exists) @method('PUT') @endif
<div class="grid gap-5">
@include('admin.partials.field', ['name'=>'question','label'=>'Pertanyaan','value'=>$faq->question])
@include('admin.partials.field', ['name'=>'answer','label'=>'Jawaban','textarea'=>true,'value'=>$faq->answer])
@include('admin.partials.field', ['name'=>'sort_order','label'=>'Urutan','type'=>'number','value'=>$faq->sort_order ?? 0])
<label class="flex items-center gap-3"><input type="checkbox" name="is_active" value="1" @checked(old('is_active', $faq->exists ? $faq->is_active : true)) class="rounded border-white/10 bg-[#091525] text-[#C9A84C] focus:ring-[#C9A84C]"><span>Aktif</span></label>
<button class="min-h-12 rounded-full bg-[#C9A84C] px-7 font-semibold text-[#050D1A]">Simpan</button>
</div>
</form>
@endsection
