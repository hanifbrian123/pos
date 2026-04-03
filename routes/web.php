<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::resource('inventory', InventoryController::class);

Route::resources([
    'product'=> ProductController::class,
]);

Route::get('product/showAjax/{id}', [ProductController::class, 'showAjax'])->name('product.showAjax');