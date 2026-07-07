<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Seeding Destinations, Categories, and Products...');
        Artisan::call('app:migrate-old-products', ['--source' => 'auto']);
        $this->command->line(Artisan::output());

        // Ensure default categories without initial products exist
        $sabah = \App\Models\Destination::where('slug', 'sabah')->first();
        if ($sabah) {
            \App\Models\Category::firstOrCreate(
                ['destination_id' => $sabah->id, 'slug' => 'fishing-charter'],
                ['name' => 'Fishing Charter']
            );
        }

        $stjohn = \App\Models\Destination::where('slug', 'stjohnislands')->first();
        if ($stjohn) {
            \App\Models\Category::updateOrCreate(
                ['destination_id' => $stjohn->id, 'slug' => 'stjohn-car-rental'],
                ['name' => 'LEVIATHAN 8']
            );
            \App\Models\Category::updateOrCreate(
                ['destination_id' => $stjohn->id, 'slug' => 'stjohn-island-hopping'],
                ['name' => 'OCEAN DIVA']
            );
            \App\Models\Category::updateOrCreate(
                ['destination_id' => $stjohn->id, 'slug' => 'stjohn-airport-transfer'],
                ['name' => 'SG YACHT']
            );
        }
    }
}
