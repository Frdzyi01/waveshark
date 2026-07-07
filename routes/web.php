<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Route::get('/', function () {
    $landingServices = \App\Models\LandingService::all();
    return view('landing', compact('landingServices'));
});

// Frontend Routes
Route::get('/langkawi', [\App\Http\Controllers\DestinasiController::class, 'langkawi']);
Route::get('/stjohnislands', [\App\Http\Controllers\DestinasiController::class, 'stjohnislands']);
Route::get('/stjohnislands', [\App\Http\Controllers\DestinasiController::class, 'stjohnislands']);
Route::get('/sabah', [\App\Http\Controllers\DestinasiController::class, 'sabah']);
Route::get('/contact', function () {
    return view('contact');
});

// Langkawi Service Pages
Route::prefix('langkawi')->group(function () {
    Route::get('/car-rental', [\App\Http\Controllers\DestinasiController::class, 'carRental']);
    Route::get('/island-hopping', [\App\Http\Controllers\DestinasiController::class, 'islandHopping']);
    Route::get('/airport-transfer', [\App\Http\Controllers\DestinasiController::class, 'airportTransfer']);
    Route::get('/mangrove-tour', [\App\Http\Controllers\DestinasiController::class, 'mangroveTour']);
    Route::get('/jetski', [\App\Http\Controllers\DestinasiController::class, 'jetski']);
    Route::get('/sunset-cruise', [\App\Http\Controllers\DestinasiController::class, 'sunsetCruise']);
});

// Sabah Service Pages
Route::prefix('sabah')->group(function () {
    Route::get('/sunset-dinner-cruise', [\App\Http\Controllers\DestinasiController::class, 'sunsetDinnerCruise']);
    Route::get('/fishing-charter', [\App\Http\Controllers\DestinasiController::class, 'fishingCharter']);
    Route::get('/mount-climbing', [\App\Http\Controllers\DestinasiController::class, 'mountClimbing']);
});

// ST John Islands Service Pages
Route::prefix('stjohnislands')->group(function () {
    Route::get('/island-hopping', [\App\Http\Controllers\DestinasiController::class, 'stJohnIslandHopping']);
    Route::get('/airport-transfer', [\App\Http\Controllers\DestinasiController::class, 'stJohnAirportTransfer']);
    Route::get('/mangrove-tour', [\App\Http\Controllers\DestinasiController::class, 'stJohnMangroveTour']);
    Route::get('/jetski', [\App\Http\Controllers\DestinasiController::class, 'stJohnJetski']);
    Route::get('/sunset-cruise', [\App\Http\Controllers\DestinasiController::class, 'stJohnSunsetCruise']);
    Route::get('/car-rental', [\App\Http\Controllers\DestinasiController::class, 'stJohnCarRental']);

    // URL Alias - Yacht branding (tampilan saja, controller tetap sama)
    // car-rental   → leviathan-8
    // island-hopping → ocean-diva
    // airport-transfer → sg-yacht
    Route::get('/leviathan-8', [\App\Http\Controllers\DestinasiController::class, 'stJohnCarRental']);
    Route::get('/ocean-diva',   [\App\Http\Controllers\DestinasiController::class, 'stJohnIslandHopping']);
    Route::get('/sg-yacht',     [\App\Http\Controllers\DestinasiController::class, 'stJohnAirportTransfer']);
});

Route::get('/dashboard', function () {
    $productCount = \App\Models\Product::count();
    return view('dashboard', compact('productCount'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admin Routes — Hierarchical: destination → category → products
    Route::prefix('admin')->group(function () {
        Route::get('/{destination}/categories', [\App\Http\Controllers\Admin\AdminProductController::class, 'categories'])
            ->name('admin.categories');
        Route::get('/{destination}/{category}/products', [\App\Http\Controllers\Admin\AdminProductController::class, 'index'])
            ->name('admin.products.index');
        Route::get('/{destination}/{category}/products/create', [\App\Http\Controllers\Admin\AdminProductController::class, 'create'])
            ->name('admin.products.create');
        Route::post('/{destination}/{category}/products', [\App\Http\Controllers\Admin\AdminProductController::class, 'store'])
            ->name('admin.products.store');
        Route::get('/{destination}/{category}/products/{product}/edit', [\App\Http\Controllers\Admin\AdminProductController::class, 'edit'])
            ->name('admin.products.edit');
        Route::put('/{destination}/{category}/products/{product}', [\App\Http\Controllers\Admin\AdminProductController::class, 'update'])
            ->name('admin.products.update');
        Route::delete('/{destination}/{category}/products/{product}', [\App\Http\Controllers\Admin\AdminProductController::class, 'destroy'])
            ->name('admin.products.destroy');
    });

    // Landing Page Services (unchanged)
    Route::resource('admin/landing-services', \App\Http\Controllers\Admin\LandingServiceController::class);
});

Route::get('/panggil', function () {
    Artisan::call('optimize:clear');

    return redirect('/')->with('success', 'Cache cleared successfully!');
});

Route::get('/storage-link', function () {
    Artisan::call('storage:link');
    return redirect('/')->with('success', 'Storage linked successfully!');
});

require __DIR__ . '/auth.php';
