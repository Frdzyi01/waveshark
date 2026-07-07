<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Note: Data migration is handled by the Artisan Command `app:migrate-old-products`.
     */
    public function up(): void
    {
        // Left empty intentionally. Data migration is executed via Artisan Command:
        // php artisan app:migrate-old-products
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        if (Schema::hasTable('products')) {
            DB::table('products')->truncate();
        }
        if (Schema::hasTable('categories')) {
            DB::table('categories')->truncate();
        }
        if (Schema::hasTable('destinations')) {
            DB::table('destinations')->truncate();
        }
        Schema::enableForeignKeyConstraints();
    }
};
