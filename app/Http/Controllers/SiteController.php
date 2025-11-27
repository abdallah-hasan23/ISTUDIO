<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Contact;
use App\Models\Project;
use App\Models\Service;
use App\Models\TeamMember;
use App\Models\SiteSetting;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    private function sharedData()
    {
        return [
            'services' => Service::latest()->get(),
            'projects' => Project::with('images')->latest()->take(6)->get(),
            'categoryCounts' => Project::selectRaw('category, COUNT(*) as count')
                ->groupBy('category')
                ->pluck('count', 'category'),
            'team' => TeamMember::all(),
            'testimonials' => Testimonial::all(),
            'about' => About::first(),
            'settings' => SiteSetting::first(),
        ];
    }
    function index() {
        $services = Service::latest()->get();
        $projects = Project::with('images')->latest()->take(6)->get();

        // Get category counts from projects table
        $categoryCounts = Project::selectRaw('category, COUNT(*) as count')
            ->groupBy('category')
            ->pluck('count', 'category');

        // Get all distinct categories
        $team = TeamMember::all();
        $testimonials = Testimonial::all();
        $about = About::first();
        $settings = SiteSetting::first();

        return view('site.index', $this->sharedData());
    }

    function about() {
        $services = Service::latest()->get();
        $projects = Project::with('images')->latest()->take(6)->get();

        // Get category counts from projects table
        $categoryCounts = Project::selectRaw('category, COUNT(*) as count')
            ->groupBy('category')
            ->pluck('count', 'category');

        // Get all distinct categories
        $team = TeamMember::all();
        $testimonials = Testimonial::all();
        $about = About::first();
        $settings = SiteSetting::first();
        return view('site.about', $this->sharedData());
    }

    function services() {
        $services = Service::latest()->get();
        $projects = Project::with('images')->latest()->take(6)->get();

        // Get category counts from projects table
        $categoryCounts = Project::selectRaw('category, COUNT(*) as count')
            ->groupBy('category')
            ->pluck('count', 'category');

        // Get all distinct categories
        $team = TeamMember::all();
        $testimonials = Testimonial::all();
        $about = About::first();
        $settings = SiteSetting::first();
        return view('site.services', $this->sharedData());
    }
    function service() {
        $services = Service::latest()->get();
        $projects = Project::with('images')->latest()->take(6)->get();

        // Get category counts from projects table
        $categoryCounts = Project::selectRaw('category, COUNT(*) as count')
            ->groupBy('category')
            ->pluck('count', 'category');

        // Get all distinct categories
        $team = TeamMember::all();
        $testimonials = Testimonial::all();
        $about = About::first();
        $settings = SiteSetting::first();
        return view('site.service',$this->sharedData());
    }
    function project() {
        $services = Service::latest()->get();
        $projects = Project::with('images')->latest()->take(6)->get();

        // Get category counts from projects table
        $categoryCounts = Project::selectRaw('category, COUNT(*) as count')
            ->groupBy('category')
            ->pluck('count', 'category');

        // Get all distinct categories
        $team = TeamMember::all();
        $testimonials = Testimonial::all();
        $about = About::first();
        $settings = SiteSetting::first();
        return view('site.project', $this->sharedData());
    }
    function feature() {
        $services = Service::latest()->get();
        $projects = Project::with('images')->latest()->take(6)->get();

        // Get category counts from projects table
        $categoryCounts = Project::selectRaw('category, COUNT(*) as count')
            ->groupBy('category')
            ->pluck('count', 'category');

        // Get all distinct categories
        $team = TeamMember::all();
        $testimonials = Testimonial::all();
        $about = About::first();
        $settings = SiteSetting::first();
        return view('site.feature', $this->sharedData());
    }
    function team() {
        $services = Service::latest()->get();
        $projects = Project::with('images')->latest()->take(6)->get();

        // Get category counts from projects table
        $categoryCounts = Project::selectRaw('category, COUNT(*) as count')
            ->groupBy('category')
            ->pluck('count', 'category');

        // Get all distinct categories
        $team = TeamMember::all();
        $testimonials = Testimonial::all();
        $about = About::first();
        $settings = SiteSetting::first();
        return view('site.team',$this->sharedData());
    }
    function testimonial() {
        $services = Service::latest()->get();
        $projects = Project::with('images')->latest()->take(6)->get();

        // Get category counts from projects table
        $categoryCounts = Project::selectRaw('category, COUNT(*) as count')
            ->groupBy('category')
            ->pluck('count', 'category');

        // Get all distinct categories
        $team = TeamMember::all();
        $testimonials = Testimonial::all();
        $about = About::first();
        $settings = SiteSetting::first();
        return view('site.testimonial', $this->sharedData());
    }
    function r404() {
        return view('site.404');
    }
    function contact() {
        $services = Service::latest()->get();
        $projects = Project::with('images')->latest()->take(6)->get();

        // Get category counts from projects table
        $categoryCounts = Project::selectRaw('category, COUNT(*) as count')
            ->groupBy('category')
            ->pluck('count', 'category');

        // Get all distinct categories
        $team = TeamMember::all();
        $testimonials = Testimonial::all();
        $about = About::first();
        $settings = SiteSetting::first();
        return view('site.contact',$this->sharedData());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:150',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Contact::create($data);

        return back()->with('type', 'success')
        ->with('msg', 'Your message has been sent successfully');
    }

}
