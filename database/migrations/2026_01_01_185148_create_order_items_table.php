<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
Schema::create('order_items', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->cascadeOnDelete();
    $table->foreignId('menu_id')->constrained('menus')->cascadeOnDelete();
    $table->string('nama_menu');
    $table->integer('harga');
    $table->integer('qty');
    $table->integer('subtotal');
    $table->string('status')->default('pending');
    $table->timestamps();
});
    }

    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
