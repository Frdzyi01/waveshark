<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SabahProduct;
use Illuminate\Http\Request;

class SabahProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = SabahProduct::latest()->get();
        return view('admin.sabah_products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = [
            'sunset-dinner-cruise' => 'Sunset Dinner Cruise',
            'fishing-charter' => 'Fishing Charter',
            'mount-climbing' => 'Mount Climbing',
        ];

        return view('admin.sabah_products.create', compact('categories'));
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
            $destinationPath = 'images/sabah-products/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move(public_path($destinationPath), $profileImage);
            $input['image'] = '/' . $destinationPath . $profileImage;
        }

        SabahProduct::create($input);

        return redirect()->route('sabah-products.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SabahProduct $sabahProduct)
    {
        $categories = [
            'sunset-dinner-cruise' => 'Sunset Dinner Cruise',
            'fishing-charter' => 'Fishing Charter',
            'mount-climbing' => 'Mount Climbing',
        ];
        return view('admin.sabah_products.edit', compact('sabahProduct', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SabahProduct $sabahProduct)
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
            $destinationPath = 'images/sabah-products/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move(public_path($destinationPath), $profileImage);
            $input['image'] = '/' . $destinationPath . $profileImage;
        } else {
            unset($input['image']);
        }

        $sabahProduct->update($input);

        return redirect()->route('sabah-products.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SabahProduct $sabahProduct)
    {
        $sabahProduct->delete();

        return redirect()->route('sabah-products.index')
            ->with('success', 'Product deleted successfully');
    }
}
