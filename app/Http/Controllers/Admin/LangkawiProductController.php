<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LangkawiProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LangkawiProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = LangkawiProduct::latest()->get();
        return view('admin.langkawi_products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Service Categories for dropdown
        $categories = [
            'car-rental' => 'Car Rental',
            'island-hopping' => 'Island Hopping',
            'airport-transfer' => 'Airport Transfer',
            'mangrove-tour' => 'Mangrove Tour',
            'jetski' => 'Jetski',
            'sunset-cruise' => 'Sunset Cruise',
        ];

        return view('admin.langkawi_products.create', compact('categories'));
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
            $destinationPath = 'images/langkawi-products/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move(public_path($destinationPath), $profileImage);
            $input['image'] = '/' . $destinationPath . $profileImage;
        }

        LangkawiProduct::create($input);

        return redirect()->route('langkawi-products.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LangkawiProduct $langkawiProduct)
    {
        $categories = [
            'car-rental' => 'Car Rental',
            'island-hopping' => 'Island Hopping',
            'airport-transfer' => 'Airport Transfer',
            'mangrove-tour' => 'Mangrove Tour',
            'jetski' => 'Jetski',
            'sunset-cruise' => 'Sunset Cruise',
        ];
        return view('admin.langkawi_products.edit', compact('langkawiProduct', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LangkawiProduct $langkawiProduct)
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
            $destinationPath = 'images/langkawi-products/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move(public_path($destinationPath), $profileImage);
            $input['image'] = '/' . $destinationPath . $profileImage;
        } else {
            unset($input['image']);
        }

        $langkawiProduct->update($input);

        return redirect()->route('langkawi-products.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LangkawiProduct $langkawiProduct)
    {
        $langkawiProduct->delete();

        return redirect()->route('langkawi-products.index')
            ->with('success', 'Product deleted successfully');
    }
}
