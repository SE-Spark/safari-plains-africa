<?php

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

Route::get('/', \App\Livewire\Dashboard::class)->name('admin.dashboard');
Route::get('/destinations', \App\Livewire\Destinations::class)->name('admin.destinations');
Route::get('/item-types', \App\Livewire\BookingItemsType::class)->name('admin.item-types');
Route::get('/category', \App\Livewire\Blogcategory::class)->name('admin.category');
Route::get('/comments', \App\Livewire\Blogcomments::class)->name('admin.comments');
Route::get('/posts', \App\Livewire\Blogpost::class)->name('admin.posts');
Route::get('/booking-items', \App\Livewire\BookingItems::class)->name('admin.booking-items');
Route::get('/booking', \App\Livewire\Bookings::class)->name('admin.booking');
Route::get('/hotels', \App\Livewire\Hotels::class)->name('admin.hotels');
Route::get('/packages', \App\Livewire\Packages::class)->name('admin.packages');
Route::get('/payments', \App\Livewire\Payments::class)->name('admin.payments');
Route::get('/reviews', \App\Livewire\Reviews::class)->name('admin.reviews');
Route::get('/notifications', \App\Livewire\Notifications::class)->name('admin.notifications');
Route::get('/profile', \App\Livewire\Profile::class)->name('user.profile');

Route::get('/logout', function () {
    return view('home');
})->name('user.logout');