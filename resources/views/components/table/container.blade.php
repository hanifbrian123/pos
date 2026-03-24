<!-- Table Container -->
<div class="bg-white rounded-2xl border border-[#E2E8F0] shadow-sm">
    
    <x-ui.search-input></x-ui.search-input>

    <!-- Table -->
    <table id="{{ $id }}" class="w-full text-left">
        {{ $slot }}
    </table>
    
    <!-- Empty space for table to look like the image height -->
    <div class="h-32"></div>
</div>