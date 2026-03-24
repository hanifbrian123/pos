<div  class="modal-backdrop fixed inset-0 bg-[#0F172A]/40 backdrop-blur-sm z-[60] flex items-center justify-center">
    <div class="bg-white w-full max-w-sm rounded-2xl shadow-xl p-8 flex flex-col items-center text-center animate-in fade-in zoom-in duration-200">
        <div class="w-16 h-16 bg-yellow-100 text-yellow-600 rounded-full flex items-center justify-center mb-4 text-3xl">
            <i data-lucide="message-square-warning" class="w-10 h-10"></i>
        </div>
        <h3 class="text-xl font-bold text-[#0F172A] mb-2">{{ $header }}</h3>
        <p class="text-[#64748B] mb-6">{{ $message }}</p>
        <button class="w-full py-3 bg-[#0F172A] text-white rounded-xl font-semibold hover:bg-[#1E293B] transition-colors">
            {{ $btnText }}
        </button>
    </div>
</div>
