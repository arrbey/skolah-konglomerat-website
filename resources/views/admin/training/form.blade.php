@extends('admin.layouts.app')
@section('title', $training->exists ? 'Edit Training' : 'Tambah Training')
@section('content')
<form method="POST" action="{{ $training->exists ? route('admin.training.update', $training) : route('admin.training.store') }}" enctype="multipart/form-data" class="max-w-3xl rounded-3xl border border-white/10 bg-[#0D1E35] p-6">
@csrf
@if($training->exists) @method('PUT') @endif
<div class="grid gap-5">
@include('admin.partials.field', ['name'=>'title','label'=>'Judul Training','value'=>$training->title])
@include('admin.partials.field', ['name'=>'description','label'=>'Deskripsi','textarea'=>true,'value'=>$training->description])
<div><label class="text-sm font-medium text-white" for="image">Gambar Brosur</label><input id="image" name="image" type="file" accept="image/*" class="mt-2 w-full rounded-xl border border-white/10 bg-[#091525] p-3 text-white">@error('image')<p class="mt-2 text-sm text-red-300">{{ $message }}</p>@enderror @if($training->image_path)<p class="mt-2 text-xs text-[#A8B8D0]">Current: {{ $training->image_path }}</p>@endif</div>
@include('admin.partials.field', ['name'=>'cta_text','label'=>'Teks CTA','value'=>$training->cta_text ?: 'Daftar Sekarang'])
@include('admin.partials.field', ['name'=>'cta_url','label'=>'URL CTA','type'=>'url','value'=>$training->cta_url])
@include('admin.partials.field', ['name'=>'sort_order','label'=>'Urutan','type'=>'number','value'=>$training->sort_order ?? 0])
<label class="flex items-center gap-3"><input type="checkbox" name="is_active" value="1" @checked(old('is_active', $training->exists ? $training->is_active : true)) class="rounded border-white/10 bg-[#091525] text-[#C9A84C] focus:ring-[#C9A84C]"><span>Aktif</span></label>
<button class="min-h-12 rounded-full bg-[#C9A84C] px-7 font-semibold text-[#050D1A]">Simpan</button>
</div>
</form>
@endsection
