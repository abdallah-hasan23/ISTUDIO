<?php

namespace App\Http\Controllers\Admin;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;


class Testimonials extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::latest()->get();
        return view('admin.testimonials.index',compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
        'name' => 'required|string',
        'title' => 'required|string',
        'comment' => 'required|string',
        'images' => 'nullable|array',
        
        ]);

        if ($request->hasFile('image')) {
            $filename = uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/Testimonial'), $filename);
            $data['image'] = $filename;
        }

        // dd($data);
        Testimonial::create($data);

        return redirect()->route('admin.testimonials.index')
            ->with('msg', 'Testimonial created successfully')
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
    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $data = $request->validate([
        'name' => 'required|string',
        'title' => 'nullable|string',
        'comment' => 'required|string',
        'image' => 'nullable|image',
        ]);

        if ($request->hasFile('image')) {
            $filename = uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/Testimonial'), $filename);
            $data['image'] = $filename;
        }

        $testimonial->update($data);

        return redirect()->route('admin.testimonials.index')
            ->with('msg', 'Testimonial updated successfully')
            ->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return redirect()->route('admin.testimonials.index')
            ->with('msg', 'Testimonial deleted successfully')
            ->with('type', 'danger');
    }
}
