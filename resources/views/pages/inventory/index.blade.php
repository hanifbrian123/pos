@extends('layouts.app')

@section('content')
<!-- Header -->
<div class="flex justify-between items-start mb-8">
    <div>
        <h1 class="text-3xl font-bold text-[#0F172A]">Menu Management</h1>
        <p class="text-[#64748B] mt-1">Manage items</p>
    </div>
    <button data-open-modal='addItemModal' class="bg-[#0F172A] text-white px-5 py-2.5 rounded-lg font-semibold flex items-center gap-2 hover:bg-[#1E293B] transition-colors">
        <i data-lucide="plus" class="w-4 h-4"></i>
        Add Item
    </button>
</div>



{{-- Table --}}
<x-table.container :id="'itemTable'" :isEmptyData="$items->isEmpty()">
    {{-- Table Header --}}
    <x-table.header
    class=""
    :columns="[
        ['name'=>'Item Name', 'additionalClasses'=>''],
        ['name'=>'Actions', 'additionalClasses'=>'text-right']
    ]"
    />
    <x-table.body>
        @foreach ($items as $item)
            <tr class="hover:bg-gray-50/50 transition-colors">
                <td class="px-6 py-6 font-semibold text-[#1E293B]">{{ $item->name }}</td>
                <td class="px-6 py-6">
                    <x-table.action dataId="{{ $item->id }}" dataOpenEditModal='editItemModal' dataOpenDeleteModal='deleteItemModal'/>
                </td>
            </tr>
        @endforeach
    </x-table.body>
</x-table.container>



{{-- MODAL --}}

{{-- Add Item Modal --}}
<x-ui.modal id="addItemModal" title='Add New Item' :submitBtnText='"Add Item"' action="{{ route('inventory.store') }}">
    @csrf
    @method('POST')
    {{-- Item name --}}
    <x-form.input type='text' :name='"name"' placeholder="e.g. Paha Atas" :id="'addItemNameInput'" :label="'Item Name'" :rule='"required|min:3|max:10"'>
        @error('name', 'addItem')
            <small class="text-error text-red-500">
                {{ $message }}
            </small>
        @enderror
    </x-form.input>
</x-ui.modal>


{{-- Edit Item Modal --}}
<x-ui.modal id="editItemModal" title='Edit Item' :submitBtnText='"Update Item"' action="">
    @csrf
    @method('PUT')
    <input type="hidden" name="id" value="{{ old('id') }}">
    {{-- Item name --}}
    <x-form.input type='text' :name='"name"' placeholder="e.g. Paha Atas" :id="'addItemNameInput'" :label="'Item Name'" :rule='"max:10"'>
        @error('name', 'updateItem')
            <small class="text-error text-red-500">
                {{ $message }}
            </small>
        @enderror
    </x-form.input>
</x-ui.modal>


{{-- Delete item modal --}}
<x-ui.alert id="deleteItemModal" title='Delete Item' :message='"Apakah anda yakin ingin hapus item ini?"' :noDesc='"Cancel"' :yesDesc="'Delete'"/>

{{-- END MODAL --}}



{{-- Alert Success Created Item --}}
<x-ui.confirm  id="alertSuccessStoredItem"  :header='"Success!"' :btnText='"Ok!"'>
    {{ session('addItem.success') }}
</x-ui.confirm>

{{-- Alert Success Update Item --}}
<x-ui.confirm  id="alertSuccessUpdateItem"  :header='"Success!"' :btnText='"Ok!"'>
    {{ session('updateItem.success') }}
</x-ui.confirm>

{{-- Alert Success Update Item --}}
<x-ui.confirm  id="alertSuccessDeleteItem"  :header='"Success!"' :btnText='"Ok!"'>
    {{ session('deleteItem.success') }}
</x-ui.confirm>




<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add
        @if (session('addItem.success'))
            Modal.open('alertSuccessStoredItem');
        @endif

        @if ($errors->addItem->any())
            Modal.open('addItemModal');
        @endif
        
        // Update
        @if (session('updateItem.success'))
            Modal.open('alertSuccessUpdateItem');
        @endif

        @if ($errors->updateItem->any())
            Modal.open('editItemModal')
            const oldId = "{{ old('id') }}"
            fillFormBySelectors('#editItemModal form', 
                {}, 
                {
                    'action':`/inventory/${oldId}`
                }
            )
        @endif

        // Delete
        @if (session('deleteItem.success'))
            Modal.open('alertSuccessDeleteItem')
        @endif
    })
</script>

@endsection