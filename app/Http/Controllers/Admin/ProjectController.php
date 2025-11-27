<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::latest()->paginate(10);
        return view('admin.projects.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'category'=>'required',
            'images.*'=>'image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $data = $request->except(['_token', 'images']);
        // dd($data);
        $project = Project::create($data);

        // Upload Photo  
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {

                // اسم عشوائي فريد
                $imageName = time() . '_' . uniqid() . '.' . $image->extension();

                // مسار الهدف
                $image->move(public_path('uploads/projects'), $imageName);

                // حفظه في الجدول
                ProjectImage::create([
                    'project_id' => $project->id,
                    'image_path'      => $imageName,
                ]);
            }
        }

        return redirect()->route('admin.projects.index')
            ->with('type', 'success')
            ->with('msg', 'Project Added Successfully');
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
    public function edit(Project $project)
    {
        return view('admin.projects.edit',compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'category'=>'required',
            
        ]);

        $project = Project::findOrFail($id);

        // تحديث بيانات المشروع الأساسية
        $project->update([
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'location' => $request->location,
            'type' => $request->type,
            'status' => $request->status,
        ]);

        // ✅ تحديث الصور إذا رفع المستخدم أي صور جديدة
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $img) {
                // إعادة تسمية فريدة
                $imageName = time() . '_' . uniqid() . '.' . $img->getClientOriginalExtension();

                // حفظ الصورة في المجلد
                $img->move(public_path('uploads/projects'), $imageName);

                // حفظ الصورة في قاعدة البيانات
                ProjectImage::create([
                    'project_id' => $project->id,
                    'image_path' => $imageName
                ]);
            }
        }

        // ✅ إذا أراد المستخدم حذف بعض الصور (مثلاً من الـ checkbox في form)
        if ($request->has('delete_images')) {
            foreach ($request->delete_images as $imageId) {
                $image = ProjectImage::find($imageId);
                if ($image) {
                    // حذف الملف من السيرفر
                    $filePath = public_path('uploads/projects/' . $image->image_path);
                    if (file_exists($filePath)) {
                        unlink($filePath);
                    }
                    // حذف السجل من قاعدة البيانات
                    $image->delete();
                }
            }
        }

        return redirect()->route('admin.projects.index')
            ->with('type', 'info')
            ->with('msg', 'Project Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        // Delete associated images
        foreach ($project->images as $image) {
            if (file_exists(public_path('uploads/projects/' . $image->image_path))) {
                unlink(public_path('uploads/projects/' . $image->image_path));
            }
            $image->delete();
        }

        // Delete the project
        $project->delete();

        return redirect()->route('admin.projects.index')
            ->with('type', 'danger')
            ->with('msg', 'Project Deleted Successfully');
    }

    public function deleteImage($id)
    {
        $image = ProjectImage::findOrFail($id);

        // احذف الصورة من storage
        if (file_exists(public_path('uploads/projects/' . $image->image_path))) {
            unlink(public_path('uploads/projects/' . $image->image_path));
        }

        $image->delete();

        return redirect()->back()
        ->with('msg', 'Delete Picture Successfully')
        ->with('type', 'danger');
    }
}
