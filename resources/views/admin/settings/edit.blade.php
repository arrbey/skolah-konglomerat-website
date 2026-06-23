@extends('admin.layouts.app')
@section('title', $title)
@section('content')
<form method="POST" action="{{ route('admin.'.$section.'.update') }}" enctype="multipart/form-data" class="max-w-4xl rounded-3xl border border-white/10 bg-[#0D1E35] p-6">
    @csrf
    @method('PUT')
    <div class="grid gap-5">
        @foreach($fields as $name => $meta)
            @include('admin.partials.field', [
                'name' => $name,
                'label' => $meta['label'] ?? $name,
                'type' => $meta['type'] ?? 'text',
                'textarea' => $meta['textarea'] ?? false,
                'value' => $values[$name] ?? '',
                'helper' => $meta['helper'] ?? null,
            ])
        @endforeach
        @if($section === 'hero')
            <div>
                <label for="background_image" class="text-sm font-medium text-white">Background Image</label>
                <input id="background_image" name="background_image" type="file" accept="image/*" class="mt-2 w-full rounded-xl border border-white/10 bg-[#091525] p-3 text-white">
                @error('background_image')<p class="mt-2 text-sm text-red-300">{{ $message }}</p>@enderror
                @if(!empty($values['background_image']))<p class="mt-2 text-xs text-[#A8B8D0]">Current: {{ $values['background_image'] }}</p>@endif
            </div>
        @endif
        <button class="mt-3 min-h-12 rounded-full bg-[#C9A84C] px-7 font-semibold text-[#050D1A] hover:bg-[#E8C96A]">Simpan</button>
    </div>
</form>
@endsection
