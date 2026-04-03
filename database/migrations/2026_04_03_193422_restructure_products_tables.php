<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Drop foreign key first
        Schema::table('transaction_details', function (Blueprint $table) {
            $table->dropForeign(['menu_id']);
        });

        // 2. Rename menus table -> products
        Schema::rename('menus', 'products');

        // 3. Rename column menu_id -> product_id
        Schema::table('transaction_details', function (Blueprint $table) {
            $table->renameColumn('menu_id', 'product_id');
        });

        // 4. add new foreign key
        Schema::table('transaction_details', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });

        // 5. drop tabel pivot & items
        Schema::dropIfExists('item_menu');
        Schema::dropIfExists('items');
    }

    public function down(): void
    {
        // rollback
        Schema::table('transaction_details', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
        });

        Schema::table('transaction_details', function (Blueprint $table) {
            $table->renameColumn('product_id', 'menu_id');
        });

        Schema::rename('products', 'menus');

        Schema::table('transaction_details', function (Blueprint $table) {
            $table->foreign('menu_id')->references('id')->on('menus');
        });

        // recreate items
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('item_menu', function (Blueprint $table) {
            $table->id();
            $table->string('unit');
            $table->foreignId('menu_id');
            $table->foreignId('item_id');
            $table->timestamps();
        });
    }
};