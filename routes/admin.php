<?php

use App\Models\SiteSetting;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Testimonials;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ContactAdminController;

Route::middleware(['auth', 'admin'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function(){
        Route::get('/',[AdminController::class, 'index'])->name('index');

        Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
        Route::put('/profile', [AdminController::class, 'updateProfile'])->name('profile.update');

        Route::resource('projects',ProjectController::class);
        Route::delete('/project-images/{id}', [ProjectController::class, 'deleteImage'])
        ->name('project.image.delete');

        Route::resource('services', ServiceController::class);
        Route::resource('team', TeamController::class);

        Route::resource('about', AboutController::class);
        Route::resource('testimonials', Testimonials::class);
        Route::resource('settings', SettingController::class);

        Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

        Route::resource('messages', ContactAdminController::class);
        // Route::get('messages/{contact}', [ContactAdminController::class, 'show'])->name('admin.messages.show');
        // Route::delete('messages/{contact}', [ContactAdminController::class, 'destroy'])->name('admin.messages.destroy');


    });
});
