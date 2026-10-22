<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TourPackageController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

// Public Pages
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/group-tours', [TourPackageController::class, 'byCategory'])->defaults('category', 'group-tour')->name('group-tours');
Route::get('/corporate-tours', [TourPackageController::class, 'byCategory'])->defaults('category', 'corporate-tour')->name('corporate-tours');
Route::get('/excursions', [TourPackageController::class, 'byCategory'])->defaults('category', 'excursion')->name('excursions');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/terms', [HomeController::class, 'terms'])->name('terms');
Route::get('/privacy', [HomeController::class, 'privacy'])->name('privacy');

// Packages
Route::get('/packages', [TourPackageController::class, 'index'])->name('packages.index');
Route::get('/packages/{category}', [TourPackageController::class, 'byCategory'])->name('packages.category');
Route::get('/package/{slug}', [TourPackageController::class, 'show'])->name('packages.show');
Route::get('/api/package/{id}', [TourPackageController::class, 'apiDetail'])->name('api.package.detail');

// Inquiries & Bookings
Route::post('/inquiries', [InquiryController::class, 'store'])->name('inquiries.store');

// Authentication
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Panel Protected Routes
Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');

    // Inquiries
    Route::get('/inquiries', [AdminController::class, 'inquiries'])->name('inquiries');
    Route::post('/inquiries/{id}/status', [AdminController::class, 'updateInquiryStatus'])->name('inquiries.status');
    Route::delete('/inquiries/{id}', [AdminController::class, 'deleteInquiry'])->name('inquiries.delete');

    // Packages
    Route::get('/packages', [AdminController::class, 'packages'])->name('packages.index');
    Route::get('/packages/create', [AdminController::class, 'createPackage'])->name('packages.create');
    Route::post('/packages', [AdminController::class, 'storePackage'])->name('packages.store');
    Route::get('/packages/{id}/edit', [AdminController::class, 'editPackage'])->name('packages.edit');
    Route::put('/packages/{id}', [AdminController::class, 'updatePackage'])->name('packages.update');
    Route::delete('/packages/{id}', [AdminController::class, 'deletePackage'])->name('packages.delete');

    // Categories
    Route::get('/categories', [AdminController::class, 'categories'])->name('categories.index');
    Route::post('/categories', [AdminController::class, 'storeCategory'])->name('categories.store');
    Route::delete('/categories/{id}', [AdminController::class, 'deleteCategory'])->name('categories.delete');

    // Testimonials
    Route::get('/testimonials', [AdminController::class, 'testimonials'])->name('testimonials.index');
    Route::post('/testimonials', [AdminController::class, 'storeTestimonial'])->name('testimonials.store');
    Route::delete('/testimonials/{id}', [AdminController::class, 'deleteTestimonial'])->name('testimonials.delete');

    // Gallery
    Route::get('/gallery', [AdminController::class, 'gallery'])->name('gallery.index');
    Route::post('/gallery', [AdminController::class, 'storeGallery'])->name('gallery.store');
    Route::delete('/gallery/{id}', [AdminController::class, 'deleteGallery'])->name('gallery.delete');
});
