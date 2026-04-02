<div id="{{ $id }}" class="modal-backdrop fixed inset-0 bg-[#0F172A]/40 backdrop-blur-sm z-[60] flex items-center justify-center hidden">
    <form method="POST">
        @csrf
        @method('delete')
        <div class="bg-white w-full max-w-sm rounded-2xl shadow-xl p-8 flex flex-col items-center text-center animate-in fade-in zoom-in duration-200">
            <div class="w-16 h-16 bg-red-100 text-red-600 rounded-full flex items-center justify-center mb-4">
                <i data-lucide="alert-triangle" class="w-10 h-10"></i>
            </div>
            <h3 class="text-xl font-bold text-[#0F172A] mb-2">{{ $title }}</h3>
            <p class="text-[#64748B] mb-6">{{ $message }}</p>
            <div class="grid grid-cols-2 gap-3 w-full">
                <button type="button" data-close-modal='{{ $id }}' class="py-3 border border-[#E2E8F0] rounded-xl font-semibold text-[#64748B] hover:bg-[#F8FAFC] transition-colors">
                    {{ $noDesc }}
                </button>
                <button type="submit" class="py-3 bg-red-500 text-white rounded-xl font-semibold hover:bg-red-600 transition-colors">
                    {{ $yesDesc }}
                </button>
            </div>
        </div>
    </form>
</div>