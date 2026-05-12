<?php

use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\HomeController;
use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\ResetPassword;
use App\Livewire\Contact\Form as ContactForm;
use App\Livewire\Dashboard\Addresses\Form as AddressForm;
use App\Livewire\Dashboard\Addresses\Index as AddressesIndex;
use App\Livewire\Dashboard\Index as DashboardIndex;
use App\Livewire\Dashboard\Orders\Index as OrdersIndex;
use App\Livewire\Dashboard\Orders\Show as OrderShow;
use App\Livewire\Dashboard\Profile;
use App\Livewire\Dashboard\Settings;
use App\Livewire\Dashboard\Favorites\Index as FavoritesIndex;
use App\Livewire\Shop\Cart\Index as CartIndex;
use App\Livewire\Shop\Checkout\Success as CheckoutSuccess;
use App\Livewire\Shop\Products\Index as ProductsIndex;
use App\Livewire\Shop\Products\Show as ProductShow;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Shop
Route::get('/collection', ProductsIndex::class)->name('collection');
Route::get('/products/{product:slug}', ProductShow::class)->name('products.show');

// Cart & Checkout
Route::get('/cart', CartIndex::class)->name('cart');
Route::get('/checkout/success', CheckoutSuccess::class)->name('checkout.success');

// Contact
Route::get('/contact', ContactForm::class)->name('contact');

// Guest routes (authentication)
Route::middleware('guest')->group(function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
    Route::get('/forgot-password', ForgotPassword::class)->name('password.request');
    Route::get('/reset-password/{token}', ResetPassword::class)->name('password.reset');

    // OAuth
    Route::get('/auth/{provider}/redirect', [SocialiteController::class, 'redirect'])->name('socialite.redirect');
    Route::get('/auth/{provider}/callback', [SocialiteController::class, 'callback'])->name('socialite.callback');
});

// Authenticated routes
Route::middleware('auth')->group(function () {
    Route::post('/logout', function () {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect()->route('home');
    })->name('logout');

    Route::get('/dashboard', DashboardIndex::class)->name('dashboard');
    Route::get('/dashboard/profile', Profile::class)->name('dashboard.profile');
    Route::get('/dashboard/orders', OrdersIndex::class)->name('dashboard.orders');
    Route::get('/dashboard/orders/{order}', OrderShow::class)->name('dashboard.orders.show');
    Route::get('/dashboard/addresses', AddressesIndex::class)->name('dashboard.addresses');
    Route::get('/dashboard/addresses/create', AddressForm::class)->name('dashboard.addresses.create');
    Route::get('/dashboard/addresses/{address}/edit', AddressForm::class)->name('dashboard.addresses.edit');
    Route::get('/dashboard/favorites', FavoritesIndex::class)->name('dashboard.favorites');
    Route::get('/dashboard/settings', Settings::class)->name('dashboard.settings');
});

// Placeholder routes for footer links
Route::view('/shipping', 'pages.about')->name('shipping');
Route::view('/returns', 'pages.about')->name('returns');
Route::view('/privacy', 'pages.about')->name('privacy');
Route::view('/terms', 'pages.about')->name('terms');
