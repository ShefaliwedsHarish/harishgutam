<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\authGoogleController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route to handle Google authentication

Route::group(['prefix' => 'auth'], function () {
  Route::get('/redirect', [authGoogleController::class, 'hsgoogleLogin'])->name('google_login');
  Route::get('/google_callback', [authGoogleController::class, 'hsValidateLogin']);
  Route::post('/user-register',[authGoogleController::class, 'hsuser_register']);
});



// Home page routes
Route::get('/', [HomeController::class, 'hs_getindex'])->name('home');
Route::get('/about', [HomeController::class, 'hs_getabout'])->name('about_us');
Route::get('/contact', [HomeController::class, 'hs_getcontact'])->name('contact_us');

// Dashboard route
Route::get('/dashboard', [authGoogleController::class, 'hsdashbord']);

// Admin registration route
Route::get('/admin_register', [authGoogleController::class, 'hs_adminregistration']);

// Logout route
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

// Grouping routes for users under the 'user' prefix
Route::group(['prefix' => 'user'], function () {
    Route::get('dashboard', [authGoogleController::class, 'dashboard'])->name('user.dashboard');
    Route::get('users', [authGoogleController::class, 'users'])->name('user.users');
});

// Placeholder login and registration routes
Route::get('/login', function () {
    // Add your login logic here
})->name('login');

Route::get('/registration', function () {
    // Add your registration logic here
})->name('register');





