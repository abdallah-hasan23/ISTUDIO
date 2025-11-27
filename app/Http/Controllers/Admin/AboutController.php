<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::first();
        return view('admin.about.index', compact('about'));
    }

    public function create()
    {
        if (About::count() > 0) {
        return redirect()->route('admin.about.index');
        }

        return view('admin.about.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'experience_years' => 'nullable|integer',
            'projects_count' => 'nullable|integer',
            'team_count' => 'nullable|integer',
            'image' => 'nullable|image'
        ]);

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/about'), $imageName);
            $data['image'] = $imageName;
        }

        About::create($data);

        return redirect()->route('admin.about.index')->with('success', 'About section created successfully');
    
    }

    public function edit(About $about)
    {
        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request, About $about)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'experience_years' => 'nullable|integer',
            'projects_count' => 'nullable|integer',
            'team_count' => 'nullable|integer',
            'image' => 'nullable|image'
        ]);

        if ($request->hasFile('image')) {
            if ($about->image && file_exists(public_path('uploads/about/'.$about->image))) {
                unlink(public_path('uploads/about/'.$about->image));
            }

            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/about'), $imageName);
            $data['image'] = $imageName;
        }

        $about->update($data);

        return redirect()->route('admin.about.index')->with('success', 'About section updated successfully');
    }
}
