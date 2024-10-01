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

Route::get('/auth/redirect',[authGoogleController::class,'hsgoogleLogin'])->name('google_login');
Route::get('/auth/google_callback',[authGoogleController::class,'hsValidateLogin']);
Route::get('/', [HomeController::class, 'hs_getindex'])->name('home');
Route::get('/about', [HomeController::class, 'hs_getabout'])->name('about_us');
Route::get('/contact', [HomeController::class, 'hs_getcontact'])->name('contact_us');

Route::get('/dashboard',[authGoogleController::class,'hsdashbord']);
Route::get('/logout',function (){
    Auth::logout();
  return redirect('/');
});

Route::get('/login',function (){
})->name('login');
Route::get('/registration',function (){
})->name('register');
