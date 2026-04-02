<?php

use App\Http\Controllers\InventoryController;
use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::resource('inventory', InventoryController::class);

Route::resources([
    'menu'=> MenuController::class,
    'inventory'=> InventoryController::class
]);


Route::get('inventory/showAjax/{id}', [InventoryController::class, 'showAjax'])->name('inventory.showAjax');