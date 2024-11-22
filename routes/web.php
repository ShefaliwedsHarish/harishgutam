<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;  // Import the Auth facade
use App\Http\Controllers\HomeController;
use App\Http\Controllers\authGoogleController;  // Adjusted to PascalCase

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

Route::fallback(function () {
    return redirect()->route('home'); // Replace 'home' with your actual homepage route name
});

// Google authentication routes
Route::group(['prefix' => 'auth'], function () {
    Route::get('/redirect', [authGoogleController::class, 'hsgoogleLogin'])->name('google_login');
    Route::get('/google_callback', [authGoogleController::class, 'hsValidateLogin']);
    Route::post('/user-register', [authGoogleController::class, 'hsuser_register']);
    Route::post('/user-login', [authGoogleController::class, 'hsuser_login']);
});

// Home page routes
Route::get('/', [HomeController::class, 'hs_getindex'])->name('home');
Route::get('/about', [HomeController::class, 'hs_getAbout'])->name('about_us');
Route::get('/contact', [HomeController::class, 'hs_getContact'])->name('contact_us');

Route::get('/online', [HomeController::class, 'hs_onlineservice'])->name('online_service');

// Dashboard route (should be protected by authentication)
Route::get('/dashboard', [authGoogleController::class, 'hs_dashbord'])->middleware('auth')->name('dashboard');

// Admin registration route
Route::get('/admin_register', [authGoogleController::class, 'adminRegistration'])->name('admin_register');

// Logout route
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

// Grouping routes for users under the 'user' prefix (with authentication middleware)
Route::group(['prefix' => 'user', 'middleware' => 'auth'], function () {
    Route::get('dashboard', [authGoogleController::class, 'userDashboard'])->name('user.dashboard');
    Route::get('users', [authGoogleController::class, 'users'])->name('user.users');
});

// Login and Registration routes (use controller methods instead of closures)
Route::get('/login', [authGoogleController::class, 'showLoginForm'])->name('login');
Route::get('/registration', [authGoogleController::class, 'showRegistrationForm'])->name('register');

