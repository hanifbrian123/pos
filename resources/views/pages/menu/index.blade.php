@extends('layouts.app')
@section('content')
    <!-- Header -->
    <div class="flex justify-between items-start mb-8">
        <div>
            <h1 class="text-3xl font-bold text-[#0F172A]">Menu Management</h1>
            <p class="text-[#64748B] mt-1">Manage your products, prices, and categories</p>
        </div>
        <button data-open-modal='addMenuModal'
            class="bg-[#0F172A] text-white px-5 py-2.5 rounded-lg font-semibold flex items-center gap-2 hover:bg-[#1E293B] transition-colors">
            <i data-lucide="plus" class="w-4 h-4"></i>
            Add Menu
        </button>
    </div>

    {{-- TABLE --}}
    {{-- <x-table.container id="menuTable" :isEmptyData="$menus->isEmpty()"> --}}
        {{-- <x-table.header></x-table.header> --}}
    {{-- </x-table.container> --}}



    {{-- START MODAL --}}
    <x-ui.modal id="addMenuModal" title="Add new Menu" :submitBtnText="'Add Menu'" action="{{ route('menu.store') }}">
        @csrf
        @method('POST')

        <x-form.input>
            @error('name', 'addMenu')
                <small class="text-error text-red-500">
                    {{ $message }}
                </small>
            @enderror
        </x-form.input>
    </x-ui.modal>
    {{-- END MODAL --}}
@endsection
