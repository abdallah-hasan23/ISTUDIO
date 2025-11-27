<?php 
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Project;
use App\Models\ProjectImage;
use App\Models\Service;
use App\Models\TeamMember;
use App\Models\Testimonial;
use App\Models\SiteSetting;
use App\Models\ContactMessage;
use App\Models\About;
use App\Models\Contact;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Creating Super Admin User
        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@admin.ps',
            'password' => bcrypt('admin'),
            'type' => 'admin',
        ]);

        // // Creating Site Settings
        // SiteSetting::create([
        //     'name' => 'My Company',
        //     'logo' => null,
        //     'phone' => '+970123456789',
        //     'email' => 'info@mycompany.com',
        //     'address' => 'Ramallah, Palestine',
        //     'facebook' => 'https://facebook.com/mycompany',
        //     'instgram' => 'https://instagram.com/mycompany',
        //     'x' => 'https://twitter.com/mycompany',
        //     'ln' => 'https://linkedin.com/company/mycompany',
        // ]);

        // // Creating About
        // About::create([
        //     'title' => 'About Us',
        //     'description' => 'We are a leading company in construction and design, providing high-quality services to our clients. Our team of experts is dedicated to delivering exceptional results.',
        //     'image' => null,
        // ]);

        // // Creating Services
        // $services = [
        //     [
        //         'title' => 'Architectural Design',
        //         'description' => 'We provide innovative architectural design services tailored to your needs.',
        //         'icon' => null,
        //     ],
        //     [
        //         'title' => 'Construction Management',
        //         'description' => 'Professional construction management to ensure your project is completed on time and within budget.',
        //         'icon' => null,
        //     ],
        //     [
        //         'title' => 'Interior Design',
        //         'description' => 'Transform your spaces with our expert interior design services.',
        //         'icon' => null,
        //     ],
        //     [
        //         'title' => 'Renovation Services',
        //         'description' => 'Complete renovation services for residential and commercial properties.',
        //         'icon' => null,
        //     ],
        // ];

        // foreach ($services as $service) {
        //     Service::create($service);
        // }

        // // Creating Team Members
        // $teamMembers = [
        //     [
        //         'name' => 'Ahmed Hassan',
        //         'job_title' => 'CEO & Founder',
        //         'image' => null,
        //         'facebook' => 'https://facebook.com/ahmed.hassan',
        //         'instagram' => 'https://instagram.com/ahmed.hassan',
        //         'linkedin' => 'https://linkedin.com/in/ahmed.hassan',
        //         'x' => 'https://twitter.com/ahmedhassan',
        //     ],
        //     [
        //         'name' => 'Sara Mahmoud',
        //         'job_title' => 'Lead Architect',
        //         'image' => null,
        //         'facebook' => 'https://facebook.com/sara.mahmoud',
        //         'instagram' => 'https://instagram.com/sara.mahmoud',
        //         'linkedin' => 'https://linkedin.com/in/sara.mahmoud',
        //         'x' => 'https://twitter.com/saramahmoud',
        //     ],
        //     [
        //         'name' => 'Mohammed Ali',
        //         'job_title' => 'Project Manager',
        //         'image' => null,
        //         'facebook' => 'https://facebook.com/mohammed.ali',
        //         'instagram' => 'https://instagram.com/mohammed.ali',
        //         'linkedin' => 'https://linkedin.com/in/mohammed.ali',
        //         'x' => 'https://twitter.com/mohammedali',
        //     ],
        //     [
        //         'name' => 'Fatima Omar',
        //         'job_title' => 'Interior Designer',
        //         'image' => null,
        //         'facebook' => 'https://facebook.com/fatima.omar',
        //         'instagram' => 'https://instagram.com/fatima.omar',
        //         'linkedin' => 'https://linkedin.com/in/fatima.omar',
        //         'x' => 'https://twitter.com/fatimaomar',
        //     ],
        // ];

        // foreach ($teamMembers as $member) {
        //     TeamMember::create($member);
        // }

        // // Creating Testimonials
        // $testimonials = [
        //     [
        //         'name' => 'John Smith',
        //         'title' => 'Home Owner',
        //         'comment' => 'Excellent service! The team delivered exactly what we wanted for our new home. Highly recommended.',
        //         'image' => null,
        //     ],
        //     [
        //         'name' => 'Maria Garcia',
        //         'title' => 'Business Owner',
        //         'comment' => 'Professional and reliable. They completed our office renovation on time and within budget.',
        //         'image' => null,
        //     ],
        //     [
        //         'name' => 'David Chen',
        //         'title' => 'Restaurant Owner',
        //         'comment' => 'Amazing work on our restaurant design. The space looks fantastic and our customers love it.',
        //         'image' => null,
        //     ],
        // ];

        // foreach ($testimonials as $testimonial) {
        //     Testimonial::create($testimonial);
        // }

        // // Creating Projects
        // $projects = [
        //     [
        //         'title' => 'Modern Villa Design',
        //         'description' => 'A stunning modern villa with contemporary architecture and luxurious interiors.',
        //         'category' => 'Residential',
        //         'location' => 'Ramallah',
        //         'type' => 'house',
        //         'status' => 'active',
        //     ],
        //     [
        //         'title' => 'Corporate Office Complex',
        //         'description' => 'State-of-the-art office complex designed for productivity and employee well-being.',
        //         'category' => 'Commercial',
        //         'location' => 'Nablus',
        //         'type' => 'office',
        //         'status' => 'active',
        //     ],
        //     [
        //         'title' => 'Fine Dining Restaurant',
        //         'description' => 'Elegant restaurant design combining traditional and modern elements.',
        //         'category' => 'Hospitality',
        //         'location' => 'Hebron',
        //         'type' => 'restaurant',
        //         'status' => 'active',
        //     ],
        //     [
        //         'title' => 'Shopping Mall Renovation',
        //         'description' => 'Complete renovation of a shopping mall to modern standards.',
        //         'category' => 'Commercial',
        //         'location' => 'Bethlehem',
        //         'type' => 'other',
        //         'status' => 'inactive',
        //     ],
        //     [
        //         'title' => 'Luxury Apartment Building',
        //         'description' => 'High-end apartment building with premium amenities and finishes.',
        //         'category' => 'Residential',
        //         'location' => 'Jerusalem',
        //         'type' => 'house',
        //         'status' => 'active',
        //     ],
        // ];

        // foreach ($projects as $projectData) {
        //     $project = Project::create($projectData);

        //     // Create 2-4 images for each project
        //     $numImages = rand(2, 4);
        //     for ($i = 0; $i < $numImages; $i++) {
        //         ProjectImage::create([
        //             'project_id' => $project->id,
        //             'image_path' => 'sample_project_' . $project->id . '_' . ($i + 1) . '.jpg',
        //         ]);
        //     }
        // }

        // // Creating Contact Messages
        // for ($i = 0; $i < 10; $i++) {
        //     ContactMessage::create([
        //         'name' => $faker->name,
        //         'email' => $faker->email,
        //         'phone' => $faker->phoneNumber,
        //         'subject' => $faker->sentence(3),
        //         'message' => $faker->paragraph(3),
        //         'is_read' => $faker->boolean(30), // 30% chance of being read
        //     ]);
        // }

        // // Creating Contacts (similar to contact messages but different table)
        // for ($i = 0; $i < 5; $i++) {
        //     Contact::create([
        //         'name' => $faker->name,
        //         'email' => $faker->email,
        //         'subject' => $faker->sentence(3),
        //         'message' => $faker->paragraph(3),
        //         'is_read' => $faker->boolean(20), // 20% chance of being read
        //     ]);
        // }
    }
}
