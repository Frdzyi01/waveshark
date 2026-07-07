<?php

namespace Database\Seeders;

use App\Models\LandingService;
use Illuminate\Database\Seeder;

class LandingServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'id' => 1,
                'image' => 'images/services/1769194982.jpg',
                'title' => 'JET SKI',
                'description' => 'Jet ski adventures in Langkawi range from short rentals. Travelers can operate high-performance watercraft (often SeaDoo or Yamaha models) after a safety briefing, with options to ride solo or with a partner.',
                'created_at' => '2026-01-23 12:03:02',
                'updated_at' => '2026-01-28 06:43:22',
            ],
            [
                'id' => 2,
                'image' => 'images/services/1769195510.jpg',
                'title' => 'AIRPORT TRANSFER',
                'description' => 'Langkawi airport transfer services provide a seamless transition between Langkawi International Airport (LGK) and your accommodation.',
                'created_at' => '2026-01-23 12:11:50',
                'updated_at' => '2026-01-28 06:41:47',
            ],
            [
                'id' => 3,
                'image' => 'images/services/1769195528.jpg',
                'title' => 'SUNSET CRUISE',
                'description' => 'A Langkawi sunset cruise offers an enchanting evening on the Andaman Sea, where you can glide past majestic limestone karsts and silhouetted islands as the horizon ignites in a breathtaking display of gold and crimson.',
                'created_at' => '2026-01-23 12:12:08',
                'updated_at' => '2026-01-28 06:47:08',
            ],
            [
                'id' => 4,
                'image' => 'images/services/1769195555.jpg',
                'title' => 'MANGROVE TOUR',
                'description' => 'Mangrove tours in Langkawi primarily center around the Kilim Karst Geoforest Park, a UNESCO-recognized site featuring a 500-million-year-old geological landscape of limestone formations and ancient coral.',
                'created_at' => '2026-01-23 12:12:35',
                'updated_at' => '2026-01-28 06:44:09',
            ],
            [
                'id' => 5,
                'image' => 'images/services/1769652780.jpg',
                'title' => 'ISLAND HOPPING',
                'description' => "Langkawi island hopping is the island's most iconic nautical adventure, typically spanning 3.5 to 4 hours as it whisks travelers across the turquoise waters of the Andaman Sea to explore the southern archipelago of the UNESCO Global Geopark.",
                'created_at' => '2026-01-23 12:18:22',
                'updated_at' => '2026-01-28 19:13:00',
            ],
            [
                'id' => 6,
                'image' => 'images/services/1782200188.jpg',
                'title' => 'ISLAND B',
                'description' => 'Introducing Island B, Singapore’s newest 100-foot superyacht — a masterpiece of modern luxury and Italian design. Perfect for both private and corporate events, Island B can host up to 50 guests in ultimate comfort. With spacious decks, elegant interiors, and premium amenities including BBQ dining, water toys, and karaoke, this stunning vessel promises an unforgettable experience on the waters of Singapore.',
                'created_at' => '2026-06-23 00:36:28',
                'updated_at' => '2026-06-23 00:36:28',
            ],
            [
                'id' => 7,
                'image' => 'images/services/1782200190.jpg',
                'title' => 'ISLAND B',
                'description' => 'Introducing Island B, Singapore’s newest 100-foot superyacht — a masterpiece of modern luxury and Italian design. Perfect for both private and corporate events, Island B can host up to 50 guests in ultimate comfort. With spacious decks, elegant interiors, and premium amenities including BBQ dining, water toys, and karaoke, this stunning vessel promises an unforgettable experience on the waters of Singapore.',
                'created_at' => '2026-06-23 00:36:30',
                'updated_at' => '2026-06-23 00:36:30',
            ],
        ];

        foreach ($services as $service) {
            LandingService::updateOrCreate(
                ['id' => $service['id']],
                $service
            );
        }
    }
}
