<!-- Table Container -->
<div class="bg-white rounded-2xl border border-[#E2E8F0] shadow-sm">
    
    <x-ui.search-input id="{{ $id }}"></x-ui.search-input>

    <!-- Table -->
    <table id="{{ $id }}" class="w-full text-left">
        {{ $slot }}
    </table>
    
    <!-- Empty space for table to look like the image height -->
    @if ($isEmptyData)
        <div class="h-32 text-center flex flex-col justify-center">
            <p class="font-bold text-gray-700 pb-1 text-xl">Data Kosong :)</p>
            <p class="text-gray-500">Silahkan tambah Data</p>
        </div>
    @endif
</div>