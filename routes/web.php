<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;  // Import the Auth facade
use App\Http\Controllers\HomeController;
use App\Http\Controllers\authGoogleController;  // Adjusted to PascalCase
use App\Http\Controllers\ServiceController; 

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
    Route::post('/user-forgot', [authGoogleController::class, 'hsuser_forgot']);
    Route::get('/reset-password/{token}', [authGoogleController::class, 'hs_showResetForm'])->name('password.reset');
    Route::post('/reset-password',[authGoogleController::class, 'hs_change_password'])->name('password.reset_password');
  
    
});

//testing for this is

// Home page routes This is testing 
Route::get('/', [HomeController::class, 'hs_getindex'])->name('home');
Route::get('/about', [HomeController::class, 'hs_getAbout'])->name('about_us');
Route::get('/contact', [HomeController::class, 'hs_getContact'])->name('contact_us');

Route::get('/online', [HomeController::class, 'hs_onlineservice'])->name('online_service');
Route::get('/send-simple-email', [HomeController::class, 'emailtest']);

// Dashboard route (should be protected by authentication)
// Route::get('/dashboard', [authGoogleController::class, 'hs_dashbord'])->middleware('auth')->name('dashboard');
// Route::get('/kst', [authGoogleController::class, 'hs_kst'])->middleware('auth')->name('kst');


// Admin registration route
Route::get('/admin_register', [authGoogleController::class, 'adminRegistration'])->name('admin_register');

// Logout route
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

// Grouping routes for users under the 'user' prefix (with authentication middleware)
Route::group(['prefix' => 'user', 'middleware' => 'auth'], function () {
    Route::get('dashboard', [authGoogleController::class, 'hs_dashbord'])->name('user_dashboard');
    Route::get('users', [authGoogleController::class, 'users'])->name('user.users');
    Route::get('/kst', [ServiceController::class, 'hs_kst'])->name('user_kst'); 
   
});


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('dashboard', [authGoogleController::class, 'hs_dashbord'])->name('dashboard');
    Route::get('/kst', [ServiceController::class, 'hs_kst'])->name('kst'); 
    Route::get('/service', [ServiceController::class, 'hs_service'])->name('service');
    Route::post('/save_service_submit', [ServiceController::class, 'hs_save_service_submit'])->name('save_service_submit');
    Route::get('/price', [ServiceController::class, 'hs_price'])->name('price');
});
// Login and Registration routes (use controller methods instead of closures)
Route::get('/login', [authGoogleController::class, 'showLoginForm'])->name('login');
Route::get('/registration', [authGoogleController::class, 'showRegistrationForm'])->name('register');

