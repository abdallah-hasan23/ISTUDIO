<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use App\Models\Project;
use App\Models\Service;
use App\Models\TeamMember;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AdminController extends Controller
{
    function index() {

        // جلب البيانات
        $projects = Project::with('images')->latest()->get();
        $services = Service::latest()->get();
        $team = TeamMember::all();
        $testimonials = Testimonial::all();
        $messages = Contact::latest()->get();
        // $user = User

        // عدد المشاريع حسب الفئة
        $categoryCounts = Project::selectRaw('category, COUNT(*) as count')
            ->groupBy('category')
            ->pluck('count', 'category');

        return view('admin.index', compact(
            'projects', 'services', 'team', 'testimonials', 'messages', 'categoryCounts'
        ));
    }

    public function profile()
    {
        return view('admin.profile');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . auth()->id()],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = auth()->user();
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('admin.profile')->with('success', 'Profile updated successfully.');
    }
}
