<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = SiteSetting::first();
        return view('admin.settings.index', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(SiteSetting::count() > 0){
            return redirect()->route('admin.settings.index');

        }
        return view('admin.settings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
        'name' => 'required|string',
        'phone' => 'required|string',
        'email' => 'required|string',
        'address' => 'required|string',
        'logo' => 'nullable|image',
        'facebook' => 'nullable|string',
        'instgram' => 'nullable|string',
        'x' => 'nullable|string',
        'ln' => 'nullable|string',
        ]);

        // facebook	instgram	x	ln	

        // dd($data);
        if ($request->hasFile('logo')) {
            $imageName = time().'.'.$request->logo->extension();
            $request->logo->move(public_path('uploads/settings'), $imageName);
            $data['logo'] = $imageName;
        }

        SiteSetting::create($data);

        return redirect()->route('admin.settings.index')
        ->with('msg', 'settings created successfully')
        ->with('type', 'success');
    
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
    public function edit(SiteSetting $setting)
    {
        return view('admin.settings.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SiteSetting $setting)
    {
        $data = $request->validate([
        'phone' => 'required|string',
        'email' => 'required|string',
        'address' => 'required|string',
        'logo' => 'nullable|image',
        'facebook' => 'nullable|string',
        'instgram' => 'nullable|string',
        'x' => 'nullable|string',
        'ln' => 'nullable|string',
        ]);

        if ($request->hasFile('logo')) {
            $imageName = time().'.'.$request->logo->extension();
            $request->logo->move(public_path('uploads/settings'), $imageName);
            $data['logo'] = $imageName;
        }

        $setting->update($data);

        return redirect()->route('admin.settings.index')
        ->with('msg', 'Settings updated successfully')
        ->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
