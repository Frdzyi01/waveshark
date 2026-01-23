<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LandingServiceController extends Controller
{
    public function index()
    {
        $services = \App\Models\LandingService::all();
        return view('admin.landing_services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.landing_services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required',
            'description' => 'required',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/services'), $imageName);
            $imagePath = 'images/services/' . $imageName;
        }

        \App\Models\LandingService::create([
            'image' => $imagePath,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('landing-services.index')->with('success', 'Service created successfully.');
    }

    public function edit($id)
    {
        $service = \App\Models\LandingService::findOrFail($id);
        return view('admin.landing_services.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required',
            'description' => 'required',
        ]);

        $service = \App\Models\LandingService::findOrFail($id);

        $imagePath = $service->image;
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($service->image && file_exists(public_path($service->image))) {
                unlink(public_path($service->image));
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/services'), $imageName);
            $imagePath = 'images/services/' . $imageName;
        }

        $service->update([
            'image' => $imagePath,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('landing-services.index')->with('success', 'Service updated successfully.');
    }

    public function destroy($id)
    {
        $service = \App\Models\LandingService::findOrFail($id);
        if ($service->image && file_exists(public_path($service->image))) {
            unlink(public_path($service->image));
        }
        $service->delete();

        return redirect()->route('landing-services.index')->with('success', 'Service deleted successfully.');
    }
}
