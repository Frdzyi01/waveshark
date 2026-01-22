<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



class DestinasiController extends Controller
{
    // SIMULATED ADMIN DATABASE (MOCK DATA)
    // In a real scenario, this would be fetched from the 'services' and 'products' tables.
    private $langkawiServicesData = [
        'car-rental' => [
            'title' => 'Car Rental',
            'description' => 'Explore Langkawi at your own pace with our premium fleet of vehicles.',
            'hero_image' => 'https://plus.unsplash.com/premium_photo-1661293818249-f3195d5ad129?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', // Placeholder
            'products' => [
                [
                    'title' => 'Compact Sedan (Axia/Myvi)',
                    'description' => 'Perfect for couples or small families. Fuel efficient and easy to park.',
                    'price' => 'RM 80',
                    'image' => 'https://images.unsplash.com/photo-1549317661-bd32c8ce0db2?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
                ],
                [
                    'title' => 'Luxury MPV (Vellfire/Alphard)',
                    'description' => 'Travel in style and comfort. Spacious seating for VIPs and large groups.',
                    'price' => 'RM 350',
                    'image' => 'https://images.unsplash.com/photo-1617788138017-80ad40651399?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
                ],
                [
                    'title' => 'SUV (X70/CRV)',
                    'description' => 'Robust and comfortable for touring the island hills and beaches.',
                    'price' => 'RM 200',
                    'image' => 'https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
                ],
            ]
        ],
        'island-hopping' => [
            'title' => 'Island Hopping',
            'description' => 'Discover the jewels of the Andaman Sea with our guided island tours.',
            'hero_image' => 'https://images.unsplash.com/photo-1596423126838-895116740660?q=80&w=2755&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'products' => [
                [
                    'title' => 'Standard Island Hopping (Shared)',
                    'description' => 'Visit pregnant maiden island, eagle feeding, and beras basah island.',
                    'price' => 'RM 35',
                    'image' => 'https://images.unsplash.com/photo-1552422558-87425164f9b8?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
                ],
                [
                    'title' => 'Private Boat Charter',
                    'description' => 'Exclusive boat for your group only. Flexible timing and privacy.',
                    'price' => 'RM 300',
                    'image' => 'https://images.unsplash.com/photo-1544253132-70b1382405a2?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
                ]
            ]
        ],
        'airport-transfer' => [
            'title' => 'Airport Transfer',
            'description' => 'Seamless transfers from Langkawi International Airport to your hotel.',
            'hero_image' => 'https://images.unsplash.com/photo-1455383566085-e01e68078e87?q=80&w=2806&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'products' => [
                [
                    'title' => 'Sedan Transfer (1-3 Pax)',
                    'description' => 'Direct transfer to Pantai Cenang or Kuah Town.',
                    'price' => 'RM 40',
                    'image' => 'https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
                ],
                [
                    'title' => 'Van Transfer (4-10 Pax)',
                    'description' => 'Spacious van for larger groups and luggage.',
                    'price' => 'RM 80',
                    'image' => 'https://images.unsplash.com/photo-1464219789935-c2d9d9aba644?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
                ]
            ]
        ],
        'mangrove-tour' => [
            'title' => 'Mangrove Tour',
            'description' => 'Explore the Kilim Karst Geoforest Park, a UNESCO World Heritage site.',
            'hero_image' => 'https://images.unsplash.com/photo-1440557653067-27083b9fcecd?q=80&w=2910&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'products' => [
                [
                    'title' => 'Shared Mangrove Tour (4 Hours)',
                    'description' => 'Includes bat cave, fish farm, eagle feeding, and lunch.',
                    'price' => 'RM 90',
                    'image' => 'https://images.unsplash.com/photo-1569930777085-5a2123861214?q=80&w=2948&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
                ],
                [
                    'title' => 'Private Boat (Kilim Geoforest)',
                    'description' => 'Private exploration of the mangroves at your own pace.',
                    'price' => 'RM 250',
                    'image' => 'https://images.unsplash.com/photo-1543152579-d5c22e47e5b1?q=80&w=2817&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
                ]
            ]
        ],
        'jetski' => [
            'title' => 'Jetski Tour',
            'description' => 'High-octane adventure hopping between islands on a powerful Jetski.',
            'hero_image' => 'https://images.unsplash.com/photo-1605799307221-396df876b50e?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'products' => [
                [
                    'title' => 'Mega Water Sports Tour 1',
                    'description' => '4 Hours tour covering Dayang Bunting & 8 islands.',
                    'price' => 'RM 700',
                    'image' => 'https://images.unsplash.com/photo-1582294154823-7a916327ab20?q=80&w=2576&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
                ],
                [
                    'title' => 'Sunset Jetski Ride',
                    'description' => 'Witness the golden hour from the open sea.',
                    'price' => 'RM 400',
                    'image' => 'https://images.unsplash.com/photo-1622320707769-b5f3a0db2115?q=80&w=2942&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
                ]
            ]
        ],
        'sunset-cruise' => [
            'title' => 'Sunset Cruise',
            'description' => 'Sail into the sunset with dinner, drinks, and the seawater Jacuzzi.',
            'hero_image' => 'https://images.unsplash.com/photo-1520023030372-e56a47a11075?q=80&w=2832&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'products' => [
                [
                    'title' => 'Premium Sunset Dinner Cruise',
                    'description' => 'Buffet dinner, free flow drinks, and salt water jacuzzi net.',
                    'price' => 'RM 220',
                    'image' => 'https://images.unsplash.com/photo-1502931599813-255d496a928e?q=80&w=2942&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
                ],
                [
                    'title' => 'Private Catamaran Charter',
                    'description' => 'Luxury private yacht for your special occasion.',
                    'price' => 'RM 3500',
                    'image' => 'https://images.unsplash.com/photo-1599640845513-5c65d6c8e31a?q=80&w=2884&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
                ]
            ]
        ]
    ];

    public function langkawi()
    {
        $services = []; // Replaced dynamic data with empty array or static data as needed
        $tourPackages = []; // Replaced dynamic data with empty array or static data as needed
        return view('destinasi.langkawi', compact('services', 'tourPackages'));
    }

    public function stjohnislands()
    {
        $services = [];
        $tourPackages = [];
        return view('destinasi.stjohnislands', compact('services', 'tourPackages'));
    }

    public function sabah()
    {
        $services = [];
        $tourPackages = [];
        return view('destinasi.sabah', compact('services', 'tourPackages'));
    }

    // --- LANGKAWI SERVICE PAGES ---

    public function carRental()
    {
        $data = $this->langkawiServicesData['car-rental'];
        return view('destinasi.langkawi-services.car-rental', compact('data'));
    }

    public function islandHopping()
    {
        $data = $this->langkawiServicesData['island-hopping'];
        return view('destinasi.langkawi-services.islands-hopping', compact('data'));
    }

    public function airportTransfer()
    {
        $data = $this->langkawiServicesData['airport-transfer'];
        return view('destinasi.langkawi-services.airport-transfer', compact('data'));
    }

    public function mangroveTour()
    {
        $data = $this->langkawiServicesData['mangrove-tour'];
        return view('destinasi.langkawi-services.mangrove-tour', compact('data'));
    }

    public function jetski()
    {
        $data = $this->langkawiServicesData['jetski'];
        return view('destinasi.langkawi-services.jetski', compact('data'));
    }

    public function sunsetCruise()
    {
        $data = $this->langkawiServicesData['sunset-cruise'];
        return view('destinasi.langkawi-services.sunset-cruise', compact('data'));
    }
}
