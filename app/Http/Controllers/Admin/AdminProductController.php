<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Destination;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    /**
     * Display a listing of categories for a destination.
     */
    public function categories(string $destinationSlug)
    {
        $destination = Destination::where('slug', $destinationSlug)->firstOrFail();

        $categories = Category::where('destination_id', $destination->id)
            ->withCount([
                'products',
                'products as available_count' => function ($query) {
                    $query->where('status', 'available');
                },
                'products as unavailable_count' => function ($query) {
                    $query->where('status', '!=', 'available');
                },
            ])
            ->orderBy('name')
            ->get();

        return view('admin.categories', compact('destination', 'categories'));
    }

    /**
     * Display a listing of products within a category.
     */
    public function index(Request $request, string $destinationSlug, string $categorySlug)
    {
        $destination = Destination::where('slug', $destinationSlug)->firstOrFail();

        $category = Category::where('destination_id', $destination->id)
            ->where('slug', $categorySlug)
            ->firstOrFail();

        $query = Product::where('category_id', $category->id);

        // Search by title
        if ($search = $request->input('search')) {
            $query->where('title', 'like', '%' . $search . '%');
        }

        // Filter by status
        if ($status = $request->input('status')) {
            if ($status === 'available') {
                $query->where('status', 'available');
            } elseif ($status === 'unavailable') {
                $query->where('status', '!=', 'available');
            }
        }

        $products = $query->latest()->paginate(10)->withQueryString();

        // Statistics
        $totalProducts = Product::where('category_id', $category->id)->count();
        $availableCount = Product::where('category_id', $category->id)->where('status', 'available')->count();
        $unavailableCount = Product::where('category_id', $category->id)->where('status', '!=', 'available')->count();

        return view('admin.products.index', compact(
            'destination',
            'category',
            'products',
            'totalProducts',
            'availableCount',
            'unavailableCount'
        ));
    }

    /**
     * Show the form for creating a new product.
     */
    public function create(string $destinationSlug, string $categorySlug)
    {
        $destination = Destination::where('slug', $destinationSlug)->firstOrFail();
        $category = Category::where('destination_id', $destination->id)
            ->where('slug', $categorySlug)
            ->firstOrFail();

        return view('admin.products.create', compact('destination', 'category'));
    }

    /**
     * Store a newly created product.
     */
    public function store(Request $request, string $destinationSlug, string $categorySlug)
    {
        $destination = Destination::where('slug', $destinationSlug)->firstOrFail();
        $category = Category::where('destination_id', $destination->id)
            ->where('slug', $categorySlug)
            ->firstOrFail();

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'status' => 'required',
        ]);

        $input = $request->only(['title', 'description', 'price', 'status']);
        $input['category_id'] = $category->id;

        if ($image = $request->file('image')) {
            $destinationPath = 'images/' . $destinationSlug . '-products/';
            $imageName = date('YmdHis') . '.' . $image->getClientOriginalExtension();
            $image->move(public_path($destinationPath), $imageName);
            $input['image'] = '/' . $destinationPath . $imageName;
        }

        Product::create($input);

        return redirect()->route('admin.products.index', [$destinationSlug, $categorySlug])
            ->with('success', 'Product created successfully.');
    }

    /**
     * Show the form for editing a product.
     */
    public function edit(string $destinationSlug, string $categorySlug, Product $product)
    {
        $destination = Destination::where('slug', $destinationSlug)->firstOrFail();
        $category = Category::where('destination_id', $destination->id)
            ->where('slug', $categorySlug)
            ->firstOrFail();

        return view('admin.products.edit', compact('destination', 'category', 'product'));
    }

    /**
     * Update the specified product.
     */
    public function update(Request $request, string $destinationSlug, string $categorySlug, Product $product)
    {
        $destination = Destination::where('slug', $destinationSlug)->firstOrFail();
        $category = Category::where('destination_id', $destination->id)
            ->where('slug', $categorySlug)
            ->firstOrFail();

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'status' => 'required',
        ]);

        $input = $request->only(['title', 'description', 'price', 'status']);

        if ($image = $request->file('image')) {
            $destinationPath = 'images/' . $destinationSlug . '-products/';
            $imageName = date('YmdHis') . '.' . $image->getClientOriginalExtension();
            $image->move(public_path($destinationPath), $imageName);
            $input['image'] = '/' . $destinationPath . $imageName;
        }

        $product->update($input);

        return redirect()->route('admin.products.index', [$destinationSlug, $categorySlug])
            ->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified product.
     */
    public function destroy(string $destinationSlug, string $categorySlug, Product $product)
    {
        $product->delete();

        return redirect()->route('admin.products.index', [$destinationSlug, $categorySlug])
            ->with('success', 'Product deleted successfully.');
    }
}
