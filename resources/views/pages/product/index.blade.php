@extends('layouts.app')

@section('content')
<!-- Header -->
<div class="flex justify-between items-start mb-8">
    <div>
        <h1 class="text-3xl font-bold text-[#0F172A]">Management Produk</h1>
        <p class="text-[#64748B] mt-1">Kelola data produk dan kategori</p>
    </div>
    <button data-open-modal='addProductModal' class="bg-[#0F172A] text-white px-5 py-2.5 rounded-lg font-semibold flex items-center gap-2 hover:bg-[#1E293B] transition-colors">
        <i data-lucide="plus" class="w-4 h-4"></i>
        Tambah Produk
    </button>
</div>

{{-- Table --}}
<x-table.container :id="'productTable'" :isEmptyData="$products->isEmpty()">
    {{-- Table Header --}}
    <x-table.header
    class=""
    :columns="[
        ['name'=>'Nama Produk', 'additionalClasses'=>''],
        ['name'=>'Kategori', 'additionalClasses'=>''],
        ['name'=>'Aksi', 'additionalClasses'=>'text-right']
    ]"
    />
    <x-table.body>
        @foreach ($products as $product)
            <tr class="hover:bg-gray-50/50 transition-colors">
                <td class="px-6 py-4 font-semibold text-[#1E293B]">{{ $product->name }}</td>
                <td class="px-6 py-4 text-[#64748B]">{{ $product->category->name ?? '-' }}</td>
                <td class="px-6 py-4">
                    <x-table.action dataId="{{ $product->id }}" dataOpenEditModal='editProductModal' dataOpenDeleteModal='deleteProductModal'/>
                </td>
            </tr>
        @endforeach
    </x-table.body>
</x-table.container>

{{-- MODAL --}}

{{-- Add Product Modal --}}
<x-ui.modal id="addProductModal" title='Tambah Produk Baru' :submitBtnText='"Tambah Produk"' action="{{ route('product.store') }}">
    @csrf
    @method('POST')
    <x-form.input type='text' :name='"name"' placeholder="Contoh: Paha Atas" :id="'addProductNameInput'" :label="'Nama Produk'" :rule='"required|min:3"'>
        @error('name', 'addProduct')
            <small class="text-error text-red-500">{{ $message }}</small>
        @enderror
    </x-form.input>

    <x-form.select :name='"category_id"' :label="'Kategori'" :options="$categories" :id="'addProductCategorySelect'">
        @error('category_id', 'addProduct')
            <small class="text-error text-red-500">{{ $message }}</small>
        @enderror
    </x-form.select>
</x-ui.modal>

{{-- Edit Product Modal --}}
<x-ui.modal id="editProductModal" title='Edit Produk' :submitBtnText='"Simpan Perubahan"' action="">
    @csrf
    @method('PUT')
    <input type="hidden" name="id" value="{{ old('id') }}">
    <x-form.input type='text' :name='"name"' placeholder="Contoh: Paha Atas" :id="'editProductNameInput'" :label="'Nama Produk'" :rule='"required|min:3"'>
        @error('name', 'updateProduct')
            <small class="text-error text-red-500">{{ $message }}</small>
        @enderror
    </x-form.input>

    <x-form.select :name='"category_id"' :label="'Kategori'" :options="$categories" :id="'editProductCategorySelect'">
        @error('category_id', 'updateProduct')
            <small class="text-error text-red-500">{{ $message }}</small>
        @enderror
    </x-form.select>
</x-ui.modal>

{{-- Delete product modal --}}
<x-ui.alert id="deleteProductModal" title='Hapus Produk' :message='"Apakah anda yakin ingin menghapus produk ini?"' :noDesc='"Batal"' :yesDesc="'Hapus'"/>

{{-- Alert Success --}}
<x-ui.confirm id="alertSuccessStoredProduct" :header='"Berhasil!"' :btnText='"Tutup"'>
    {{ session('addProduct.success') }}
</x-ui.confirm>

<x-ui.confirm id="alertSuccessUpdateProduct" :header='"Berhasil!"' :btnText='"Tutup"'>
    {{ session('updateProduct.success') }}
</x-ui.confirm>

<x-ui.confirm id="alertSuccessDeleteProduct" :header='"Berhasil!"' :btnText='"Tutup"'>
    {{ session('deleteProduct.success') }}
</x-ui.confirm>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Success Alerts
        @if (session('addProduct.success'))
            Modal.open('alertSuccessStoredProduct');
        @endif
        @if (session('updateProduct.success'))
            Modal.open('alertSuccessUpdateProduct');
        @endif
        @if (session('deleteProduct.success'))
            Modal.open('alertSuccessDeleteProduct');
        @endif

        // Validation Errors
        @if ($errors->addProduct->any())
            Modal.open('addProductModal');
        @endif
        @if ($errors->updateProduct->any())
            Modal.open('editProductModal');
        @endif

        // Action Handlers
        window.addEventListener('openEditModal', async (e) => {
            const id = e.detail.id;
            const res = await fetch(`{{ url('product/showAjax') }}/${id}`);
            const data = await res.json();
            
            const modal = document.getElementById('editProductModal');
            modal.querySelector('form').action = `{{ url('product') }}/${id}`;
            document.getElementById('editProductId').value = data.id;
            document.getElementById('editProductNameInput').value = data.name;
            document.getElementById('editProductCategorySelect').value = data.category_id;
            
            Modal.open('editProductModal');
        });

        window.addEventListener('openDeleteModal', (e) => {
            const id = e.detail.id;
            const modal = document.getElementById('deleteProductModal');
            modal.querySelector('form').action = `{{ url('product') }}/${id}`;
            Modal.open('deleteProductModal');
        });
    });
</script>
@endsection
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