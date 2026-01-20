<?php

namespace App\Http\Controllers\Admin;

use App\Models\TourPackage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TourPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tourPackages = TourPackage::all();
        return view('admin.tour_packages.index', compact('tourPackages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tour_packages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'page' => 'required',
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('tour_packages', 'public');
            $data['image_path'] = $path;
        }

        TourPackage::create($data);

        return redirect()->route('tour-packages.index')
            ->with('success', 'Tour Package created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TourPackage $tourPackage)
    {
        return view('admin.tour_packages.edit', compact('tourPackage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TourPackage $tourPackage)
    {
        $request->validate([
            'page' => 'required',
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($tourPackage->image_path) {
                Storage::disk('public')->delete($tourPackage->image_path);
            }
            $path = $request->file('image')->store('tour_packages', 'public');
            $data['image_path'] = $path;
        }

        $tourPackage->update($data);

        return redirect()->route('tour-packages.index')
            ->with('success', 'Tour Package updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TourPackage $tourPackage)
    {
        if ($tourPackage->image_path) {
            Storage::disk('public')->delete($tourPackage->image_path);
        }

        $tourPackage->delete();

        return redirect()->route('tour-packages.index')
            ->with('success', 'Tour Package deleted successfully');
    }
}
