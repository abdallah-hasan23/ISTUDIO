<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\ProfileController;

Route::get('/', [SiteController::class, 'index'])->name('site.index');
Route::get('/about', [SiteController::class, 'about'])->name('site.about');
Route::get('/services', [SiteController::class, 'services'])->name('site.services');
Route::get('/service', [SiteController::class, 'service'])->name('site.service');
Route::get('/project', [SiteController::class, 'project'])->name('site.project');
Route::get('/feature', [SiteController::class, 'feature'])->name('site.feature');
Route::get('/team', [SiteController::class, 'team'])->name('site.team');
Route::get('/testimonial', [SiteController::class, 'testimonial'])->name('site.testimonial');
Route::get('/404', [SiteController::class, '404'])->name('site.404');
Route::get('/contact', [SiteController::class, 'contact'])->name('site.contact');
Route::post('/contact', [SiteController::class, 'store'])->name('site.contact.store');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
