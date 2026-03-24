<div class="space-y-2">
    <label class="text-sm font-semibold text-[#1E293B]" for="{{ $id }}">{{ $label }}</label>
    <input data-rule='{{ $rule }}' {{ $attributes }} value="{{ old($name) }}" name="{{ $name }}"
        class="w-full px-4 py-3 bg-white border border-[#E2E8F0] rounded-xl focus:outline-none focus:ring-2 focus:ring-[#FF6B00]/20 focus:border-[#FF6B00] transition-all placeholder:text-[#94A3B8]">
    {{ $slot }}
</div>