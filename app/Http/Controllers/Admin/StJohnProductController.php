<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StJohnProduct;
use Illuminate\Http\Request;

class StJohnProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = StJohnProduct::latest()->get();
        return view('admin.stjohn_products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = [
            'stjohn-island-hopping' => 'Island Hopping',
            'stjohn-airport-transfer' => 'Airport Transfer',
            'stjohn-mangrove-tour' => 'Mangrove Tour',
            'stjohn-jetski' => 'Jetski',
            'stjohn-sunset-cruise' => 'Sunset Cruise',
            'stjohn-car-rental' => 'Car Rental',
        ];

        return view('admin.stjohn_products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'service_category' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'status' => 'required'
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/stjohn-products/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move(public_path($destinationPath), $profileImage);
            $input['image'] = '/' . $destinationPath . $profileImage;
        }

        StJohnProduct::create($input);

        return redirect()->route('stjohn-products.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StJohnProduct $stjohnProduct)
    {
        // Use the parameter name derived from route model binding: 'stjohn_product' usually,
        // but let's check the route definition or just use generic variable if unsure.
        // Route::resource uses {stjohn_product} by default.
        // But I will stick to explicit typing if I can.

        $categories = [
            'stjohn-island-hopping' => 'Island Hopping',
            'stjohn-airport-transfer' => 'Airport Transfer',
            'stjohn-mangrove-tour' => 'Mangrove Tour',
            'stjohn-jetski' => 'Jetski',
            'stjohn-sunset-cruise' => 'Sunset Cruise',
            'stjohn-car-rental' => 'Car Rental',
        ];

        return view('admin.stjohn_products.edit', compact('stjohnProduct', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StJohnProduct $stjohnProduct)
    {
        $request->validate([
            'service_category' => 'required',
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'status' => 'required'
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/stjohn-products/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move(public_path($destinationPath), $profileImage);
            $input['image'] = '/' . $destinationPath . $profileImage;
        } else {
            unset($input['image']);
        }

        $stjohnProduct->update($input);

        return redirect()->route('stjohn-products.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StJohnProduct $stjohnProduct)
    {
        $stjohnProduct->delete();

        return redirect()->route('stjohn-products.index')
            ->with('success', 'Product deleted successfully');
    }
}
