<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Service;
use App\Models\TourPackage;

class BookingController extends Controller
{
    public function langkawi()
    {
        $services = Service::where('page', 'booking-langkawi')->get();
        $tourPackages = TourPackage::where('page', 'booking-langkawi')->get();
        return view('booking.booking-langkawi', compact('services', 'tourPackages'));
    }

    public function stjohnislands()
    {
        $services = Service::where('page', 'booking-stjohnislands')->get();
        $tourPackages = TourPackage::where('page', 'booking-stjohnislands')->get();
        return view('booking.booking-stjohnislands', compact('services', 'tourPackages'));
    }

    public function sabah()
    {
        $services = Service::where('page', 'booking-sabah')->get();
        $tourPackages = TourPackage::where('page', 'booking-sabah')->get();
        return view('booking.booking-sabah', compact('services', 'tourPackages'));
    }
}
