<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('langkawi_products', function (Blueprint $table) {
            $table->id();
            $table->string('service_category'); // e.g., 'car-rental', 'island-hopping'
            $table->string('image')->nullable();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('price')->nullable();
            $table->string('status')->default('available'); // 'available' or 'sold_out'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('langkawi_products');
    }
};
