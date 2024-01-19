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
    Route::group(['middleware' => ['isadmin']], function () {
        Route::get('/dashboard', \App\Livewire\Dashboard::class)->name('admin.dashboard');
        Route::get('/destinations', \App\Livewire\Destinations::class)->name('admin.destinations');
        Route::get('/countries', \App\Livewire\Countries::class)->name('admin.countries');
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
        Route::get('/users', \App\Livewire\Users::class)->name('admin.users');
        Route::get('/notifications', \App\Livewire\Notifications::class)->name('admin.notifications');
        Route::get('/run-migrations', [\App\Http\Controllers\MigrationController::class, 'runMigrations']);
    });
    
    Route::get('/users/booking', \App\Livewire\Bookings::class)->name('admin.booking');
        
    Route::get('/profile', \App\Livewire\Profile::class)->name('user.profile');
    Route::get('/logout', function () {
        Auth::logout();
        return redirect(route('home'));
    })->name('user.logout');
});
Route::get('/account/user/auth/{account?}', \App\Livewire\AuthController::class)->name('login');
Route::get('/', \App\Livewire\HomeController::class)->name('home');
Route::get('/about', \App\Livewire\Front\AboutController::class)->name('about');
Route::get('/blog/{id?}', \App\Livewire\Front\BlogController::class)->name('blog');
Route::get('/contact', \App\Livewire\Front\ContactController::class)->name('contact');
Route::get('/service', \App\Livewire\Front\ServiceController::class)->name('service');
Route::get('/package/{id?}/{book?}', \App\Livewire\Front\PackageController::class)->name('package');
Route::get('/destination/{id?}', \App\Livewire\Front\DestinationController::class)->name('destination');
Route::get('/booking', \App\Livewire\Front\BookingController::class)->name('booking');
Route::get('/team', \App\Livewire\Front\TeamController::class)->name('team');
Route::get('/testimonial', \App\Livewire\Front\TestimonialController::class)->name('testimonial');
Route::get('/auth/account/forget', \App\Livewire\ForgetResetAccountController::class)->name('account.auth.forget');

Route::get('password/reset/{token}', \App\Livewire\ForgetResetAccountController::class)->name('password.reset');
Route::get('/404', \App\Livewire\Front\NotFoundController::class)->name('404');
