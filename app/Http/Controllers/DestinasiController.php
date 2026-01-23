<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



class DestinasiController extends Controller
{
    // SIMULATED ADMIN DATABASE (MOCK DATA)
    // In a real scenario, this would be fetched from the 'services' and 'products' tables.
    private function getServiceData($category)
    {
        // Default static data for fallback (Titles/Descriptions)
        $defaults = [
            'car-rental' => [
                'title' => 'Car Rental',
                'description' => 'Explore Langkawi at your own pace with our premium fleet of vehicles.',
                'hero_image' => 'https://plus.unsplash.com/premium_photo-1661293818249-f3195d5ad129?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            ],
            'island-hopping' => [
                'title' => 'Island Hopping',
                'description' => 'Discover the jewels of the Andaman Sea with our guided island tours.',
                'hero_image' => 'https://images.unsplash.com/photo-1596423126838-895116740660?q=80&w=2755&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            ],
            'airport-transfer' => [
                'title' => 'Airport Transfer',
                'description' => 'Seamless transfers from Langkawi International Airport to your hotel.',
                'hero_image' => 'https://images.unsplash.com/photo-1455383566085-e01e68078e87?q=80&w=2806&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            ],
            'mangrove-tour' => [
                'title' => 'Mangrove Tour',
                'description' => 'Explore the Kilim Karst Geoforest Park, a UNESCO World Heritage site.',
                'hero_image' => 'https://images.unsplash.com/photo-1440557653067-27083b9fcecd?q=80&w=2910&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            ],
            'jetski' => [
                'title' => 'Jetski Tour',
                'description' => 'High-octane adventure hopping between islands on a powerful Jetski.',
                'hero_image' => 'https://images.unsplash.com/photo-1605799307221-396df876b50e?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            ],
            'sunset-cruise' => [
                'title' => 'Sunset Cruise',
                'description' => 'Sail into the sunset with dinner, drinks, and the seawater Jacuzzi.',
                'hero_image' => 'https://images.unsplash.com/photo-1520023030372-e56a47a11075?q=80&w=2832&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            ],
            // SABAH SERVICES
            'sunset-dinner-cruise' => [
                'title' => 'Sunset Dinner Cruise',
                'description' => 'Experience a magical evening with a gourmet dinner while cruising the beautiful waters of Sabah at sunset.',
                'hero_image' => 'https://images.unsplash.com/photo-1534954495914-118c7edabd88?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3',
            ],
            'fishing-charter' => [
                'title' => 'Fishing Charter',
                'description' => 'Embark on an exciting deep-sea fishing adventure with our experienced captains and fully equipped boats.',
                'hero_image' => 'https://images.unsplash.com/photo-1544552866-d3ed42536cfd?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3',
            ],
            'mount-climbing' => [
                'title' => 'Mount Climbing',
                'description' => 'Challenge yourself with a climb up Mount Kinabalu, one of Southeast Asia’s highest peaks, and witness breathtaking views.',
                'hero_image' => 'https://images.unsplash.com/photo-1577947137599-231548232924?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3',
            ],
        ];

        // Fetch products from database
        // Determine model based on category
        $sabahServices = ['sunset-dinner-cruise', 'fishing-charter', 'mount-climbing'];

        if (in_array($category, $sabahServices)) {
            $products = \App\Models\SabahProduct::where('service_category', $category)->get();
        } else {
            $products = \App\Models\LangkawiProduct::where('service_category', $category)->get();
        }

        // Convert db products to array format compatible with view
        $productsData = $products->map(function ($product) {
            return [
                'title' => $product->title,
                'description' => $product->description,
                'price' => $product->price,
                'image' => $product->image,
                'status' => $product->status, // Pass status to view
            ];
        })->toArray();

        return [
            'title' => $defaults[$category]['title'],
            'description' => $defaults[$category]['description'],
            'hero_image' => $defaults[$category]['hero_image'],
            'products' => $productsData
        ];
    }

    public function carRental()
    {
        $data = $this->getServiceData('car-rental');
        return view('destinasi.langkawi-services.car-rental', compact('data'));
    }

    public function islandHopping()
    {
        $data = $this->getServiceData('island-hopping');
        return view('destinasi.langkawi-services.islands-hopping', compact('data'));
    }

    public function airportTransfer()
    {
        $data = $this->getServiceData('airport-transfer');
        return view('destinasi.langkawi-services.airport-transfer', compact('data'));
    }

    public function mangroveTour()
    {
        $data = $this->getServiceData('mangrove-tour');
        return view('destinasi.langkawi-services.mangrove-tour', compact('data'));
    }

    public function jetski()
    {
        $data = $this->getServiceData('jetski');
        return view('destinasi.langkawi-services.jetski', compact('data'));
    }

    public function sunsetCruise()
    {
        $data = $this->getServiceData('sunset-cruise');
        return view('destinasi.langkawi-services.sunset-cruise', compact('data'));
    }

    public function langkawi()
    {
        $services = [];
        $tourPackages = [];
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

    public function sunsetDinnerCruise()
    {
        $data = $this->getServiceData('sunset-dinner-cruise');
        return view('destinasi.sabah-services.sunset-dinner-cruise', compact('data'));
    }

    public function fishingCharter()
    {
        $data = $this->getServiceData('fishing-charter');
        return view('destinasi.sabah-services.fishing-charter', compact('data'));
    }

    public function mountClimbing()
    {
        $data = $this->getServiceData('mount-climbing');
        return view('destinasi.sabah-services.mount-climbing', compact('data'));
    }
}
