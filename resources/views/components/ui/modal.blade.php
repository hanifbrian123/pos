<!-- Modal Backdrop -->
<div id="{{ $id }}" class="modal-backdrop fixed inset-0 bg-[#0F172A]/40 backdrop-blur-sm z-50 items-center justify-center flex hidden">
    <!-- Modal Content -->
    <div class="bg-white w-full max-w-md rounded-2xl shadow-xl overflow-hidden animate-in fade-in zoom-in duration-200">
        <div class="px-6 py-5 flex items-center justify-between border-b border-[#E2E8F0]">
            <h2 class="text-xl font-bold text-[#0F172A]">{{ $title }}</h2>
            <button data-close-modal='{{ $id }}' class="p-2 hover:bg-[#F1F5F9] rounded-lg transition-colors text-[#94A3B8]">
                <i data-lucide="x" class="w-5 h-5"></i>
            </button>
        </div>

        <form class="p-6 space-y-6" method="POST" action="{{ $action }}">


            {{ $slot }}

            <!-- Footer Buttons -->
            <div class="grid grid-cols-2 gap-4 pt-4">
                <button data-close-modal='{{ $id }}' type="button" class="px-6 py-3 border border-[#E2E8F0] rounded-xl font-semibold text-[#64748B] hover:bg-[#F8FAFC] transition-colors">
                    Cancel
                </button>
                <button type="submit" class="px-6 py-3 bg-[#FF6B00] text-white rounded-xl font-semibold hover:bg-[#E66000] transition-colors shadow-lg shadow-[#FF6B00]/20">
                    {{ $submitBtnText }}
                </button>
            </div>
        </form>
    </div>
</div>




{{-- Reference that can be used in future --}}
{{-- <!-- Item Name -->
<div class="space-y-2">
    <label class="text-sm font-semibold text-[#1E293B]">Item Name</label>
    <input type="text" placeholder="e.g. Spicy Fried Chicken" class="w-full px-4 py-3 bg-white border border-[#E2E8F0] rounded-xl focus:outline-none focus:ring-2 focus:ring-[#FF6B00]/20 focus:border-[#FF6B00] transition-all placeholder:text-[#94A3B8]">
</div>

<!-- Category -->
<div class="space-y-2">
    <label class="text-sm font-semibold text-[#1E293B]">Category</label>
    <div class="relative">
        <select class="w-full appearance-none px-4 py-3 bg-white border border-[#E2E8F0] rounded-xl focus:outline-none focus:ring-2 focus:ring-[#FF6B00]/20 focus:border-[#FF6B00] transition-all text-[#1E293B]">
            <option>Fried Chicken</option>
            <option>Side Menu</option>
            <option>Drinks</option>
            <option>Packages</option>
        </select>
        <i data-lucide="chevron-down" class="absolute right-4 top-1/2 -translate-y-1/2 w-5 h-5 text-[#94A3B8] pointer-events-none"></i>
    </div>
</div>

<!-- Price -->
<div class="space-y-2">
    <label class="text-sm font-semibold text-[#1E293B]">Price (IDR)</label>
    <input type="text" placeholder="e.g. 15000" class="w-full px-4 py-3 bg-white border border-[#E2E8F0] rounded-xl focus:outline-none focus:ring-2 focus:ring-[#FF6B00]/20 focus:border-[#FF6B00] transition-all placeholder:text-[#94A3B8]">
</div> --}}
