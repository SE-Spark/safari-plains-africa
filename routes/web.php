<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::get('/dashboard', \App\Livewire\Dashboard::class)->name('admin.dashboard');
    Route::get('/destinations', \App\Livewire\Destinations::class)->name('admin.destinations');
    Route::get('/item-types', \App\Livewire\BookingItemsType::class)->name('admin.item-types');
    Route::get('/category', \App\Livewire\Blogcategory::class)->name('admin.category');
    Route::get('/comments', \App\Livewire\Blogcomments::class)->name('admin.comments');
    Route::get('/posts', \App\Livewire\Blogpost::class)->name('admin.posts');
    Route::get('/post/create', \App\Livewire\CreatePost::class)->name('admin.post.create');
    Route::get('/post/{selection}/edit', \App\Livewire\CreatePost::class)->name('admin.post.edit');
    Route::get('/booking-items', \App\Livewire\BookingItems::class)->name('admin.booking-items');
    Route::get('/users/booking', \App\Livewire\Bookings::class)->name('admin.booking');
    Route::get('/hotels', \App\Livewire\Hotels::class)->name('admin.hotels');
    Route::get('/packages', \App\Livewire\Packages::class)->name('admin.packages');
    Route::get('/payments', \App\Livewire\Payments::class)->name('admin.payments');
    Route::get('/reviews', \App\Livewire\Reviews::class)->name('admin.reviews');
    Route::get('/notifications', \App\Livewire\Notifications::class)->name('admin.notifications');
    Route::get('/profile', \App\Livewire\Profile::class)->name('user.profile');
    Route::get('/users', \App\Livewire\Users::class)->name('admin.users');
    Route::get('/logout', function () {
        Auth::logout();
        return redirect(route('dashboard'));
    })->name('user.logout');
});
Route::get('/account/user/auth', \App\Livewire\AuthController::class)->name('login');
Route::get('/', \App\Livewire\HomeController::class)->name('home');
Route::get('/about', \App\Http\Controllers\AboutController::class)->name('about');
Route::get('/contact', \App\Http\Controllers\ContactController::class)->name('contact');
Route::get('/service', \App\Http\Controllers\ServiceController::class)->name('service');
Route::get('/package', \App\Http\Controllers\PackageController::class)->name('package');
Route::get('/destination', \App\Http\Controllers\DestinationController::class)->name('destination');
Route::get('/booking', \App\Http\Controllers\BookingController::class)->name('booking');
Route::get('/team', \App\Http\Controllers\TeamController::class)->name('team');
Route::get('/testimonial', \App\Http\Controllers\TestimonialController::class)->name('testimonial');
Route::get('/404', \App\Http\Controllers\NotFoundController::class)->name('404');
