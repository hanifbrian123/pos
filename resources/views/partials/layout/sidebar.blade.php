<!-- Sidebar -->
<aside class="w-64 bg-white border-r border-[#E2E8F0] flex flex-col">
    {{-- Header --}}
    <div class="p-6 flex items-center gap-3">
        <div class="w-10 h-10 bg-[#FF6B00] rounded-xl flex items-center justify-center text-white font-bold text-xl">
            FC
        </div>
        <span class="font-bold text-lg tracking-tight">Fried Chicken</span>
    </div>


    {{-- Navbar --}}
    @include('partials.layout.navbar')


    {{-- Auth --}}
    <div class="p-4 border-t border-[#E2E8F0]">
        <div class="flex items-center gap-3 px-3 py-2">
            <div class="w-10 h-10 bg-[#E2E8F0] rounded-full flex items-center justify-center text-[#64748B] font-medium">
                C
            </div>
            <div>
                <div class="text-sm font-semibold">Cashier 1</div>
                <div class="text-xs text-blue-500 font-medium">Active Shift</div>
            </div>
        </div>
    </div>
</aside>