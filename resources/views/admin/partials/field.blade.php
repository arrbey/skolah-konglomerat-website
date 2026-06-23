@props(['name', 'label', 'type' => 'text', 'value' => '', 'textarea' => false, 'helper' => null])
<div>
    <label for="{{ $name }}" class="text-sm font-medium text-white">{{ $label }}</label>
    @if($textarea)
        <textarea id="{{ $name }}" name="{{ $name }}" rows="5" class="mt-2 w-full rounded-xl border-white/10 bg-[#091525] text-white focus:border-[#C9A84C] focus:ring-[#C9A84C]">{{ old($name, $value) }}</textarea>
    @else
        <input id="{{ $name }}" name="{{ $name }}" type="{{ $type }}" value="{{ old($name, $value) }}" class="mt-2 w-full rounded-xl border-white/10 bg-[#091525] text-white focus:border-[#C9A84C] focus:ring-[#C9A84C]">
    @endif
    @if($helper)<p class="mt-1 text-xs text-[#637A96]">{{ $helper }}</p>@endif
    @error($name)<p class="mt-2 text-sm text-red-300">{{ $message }}</p>@enderror
</div>
