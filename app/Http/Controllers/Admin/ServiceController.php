<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::get()->all();
        return view('admin.services.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'icon'=>'image|mimes:png,jpg,jpeg|max:2048'
        ]);

        $data = $request->except(['_token', 'icon']);

        if ($request->hasFile('icon')) {
            // dd($request->image->extension());
            $imageName = time() . '_' . uniqid() . '.' . $request->icon->extension();
            $request->icon->move(public_path('uploads/services'), $imageName);
            $data['icon'] = $imageName;
        }
        // if ($request->hasFile('images')) {
        //     foreach ($request->file('images') as $image) {
        //         $imageName = time() . '_' . uniqid() . '.' . $image->extension();
        //         $image->move(public_path('uploads/projects'), $imageName);
        //     }
        // }
        // dd($data);
        Service::create($data);

        return redirect()->route('admin.services.index')
        ->with('type', 'success')
        ->with('msg', 'Service Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        return view('admin.services.edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'icon' => 'nullable|image'
        ]);

        if ($request->hasFile('icon')) {
            if ($service->icon && File::exists(public_path('uploads/services/' . $service->icon))) {
                unlink(public_path('uploads/services/' . $service->icon));
            }

            $imageName = time() . '_' . uniqid() . '.' . $request->icon->extension();
            $request->icon->move(public_path('uploads/services'), $imageName);

            $data['icon'] = $imageName;
        }

        $service->update($data);

        return redirect()->route('admin.services.index')
        ->with('type', 'success')
        ->with('msg', 'Service Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        if ($service->icon && File::exists(public_path('uploads/services/' . $service->icon))) {
            unlink(public_path('uploads/services/' . $service->icon));
        }

        $service->delete();

        return redirect()->route('admin.services.index')->with('success', 'Service Deleted');
    }
}
