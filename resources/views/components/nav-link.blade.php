@php
    $classVal = "flex items-center gap-3 px-3 py-2 rounded-lg transition-colors";
    $classVal .= ($isCurrent) ? " text-[#FF6B00] bg-[#FFF1E7]" : " text-[#64748B] hover:bg-[#F1F5F9]";
@endphp


<a href="{{ $href }}" class="{{ $classVal }}">
    <i data-lucide="{{ $dataLucide }}" class="w-5 h-5"></i>
    {{-- <span>{{ $isCurrent }}</span> --}}
    <span class="font-medium">
        {{ $slot }}
    </span>
</a>