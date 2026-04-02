<nav class="flex-1 px-4 py-4 space-y-1">
    <x-nav-link
        :isCurrent="request()->is('/')"
        href="/" 
        :dataLucide="'shopping-cart'">
        Point Of Sale
    </x-nav-link>

    <x-nav-link 
        :isCurrent="request()->is('menu')"
        href="menu" 
        :dataLucide="'utensils-crossed'">
        Menu
    </x-nav-link>

    <x-nav-link 
        :isCurrent="request()->is('inventory')"
        href="inventory" 
        :dataLucide="'box'">
        Inventory
    </x-nav-link>

    <x-nav-link 
        :isCurrent="request()->is('report')"
        href="report" 
        :dataLucide="'bar-chart-3'">
        Reports
    </x-nav-link>



{{-- 

    <a href="#" class="flex items-center gap-3 px-3 py-2 text-[#64748B] hover:bg-[#F1F5F9] rounded-lg transition-colors">
        <i data-lucide="shopping-cart" class="w-5 h-5"></i>
        <span class="font-medium">Point of Sale</span>
    </a>
    <a href="#" class="flex items-center gap-3 px-3 py-2 text-[#FF6B00] bg-[#FFF1E7] rounded-lg transition-colors">
        <i data-lucide="utensils-crossed" class="w-5 h-5"></i>
        <span class="font-medium">Menu</span>
    </a>
    <a href="#" class="flex items-center gap-3 px-3 py-2 text-[#64748B] hover:bg-[#F1F5F9] rounded-lg transition-colors">
        <i data-lucide="box" class="w-5 h-5"></i>
        <span class="font-medium">Inventory</span>
    </a>
    <a href="#" class="flex items-center gap-3 px-3 py-2 text-[#64748B] hover:bg-[#F1F5F9] rounded-lg transition-colors">
        <i data-lucide="bar-chart-3" class="w-5 h-5"></i>
        <span class="font-medium">Reports</span>
    </a> --}}
</nav>