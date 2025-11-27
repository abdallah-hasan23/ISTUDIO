<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = TeamMember::latest()->get();
        return view('admin.team.index',compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.team.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required',
            'job_title' =>'required',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,webp',
            'instagram' => 'nullable',
            'facebook' => 'nullable',
            'x' => 'nullable',
            'linkedin' => 'nullable',

        ]);

        $data = $request->except(['_token', 'image']);
        if ($request->hasFile('image')) {
            $filename = uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/team'), $filename);
            $data['image'] = $filename;
        }

        TeamMember::create($data);

        return redirect()->route('admin.team.index')
        ->with('msg', 'Member added successfully')
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
    public function edit(string $id)
    {
        $member = TeamMember::findOrFail($id);
        return view('admin.team.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $member = TeamMember::findOrFail($id);

        $request->validate([
            'name' =>'required',
            'job_title' =>'required',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,webp',
            'instagram' => 'nullable',
            'facebook' => 'nullable',
            'x' => 'nullable',
            'linkedin' => 'nullable',
        ]);

        $data = $request->except(['_token', 'image']);

        if ($request->hasFile('image')) {
            if ($member->image && file_exists(public_path('uploads/team/' . $member->image))) {
                unlink(public_path('uploads/team/' . $member->image));
            }

            $filename = uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/team'), $filename);
            $data['image'] = $filename;
        }

        $member->update($data);

        return redirect()->route('admin.team.index')
        ->with('msg', 'Member updated successfully')
        ->with('type', 'info');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $member = TeamMember::findOrFail($id);

        if ($member->image && file_exists(public_path('uploads/team/' . $member->image))) {
            unlink(public_path('uploads/team/' . $member->image));
        }

        $member->delete();

        return redirect()->route('admin.team.index')
        ->with('msg', 'Member Deleted successfully')
        ->with('type', 'danger');
    }
}
