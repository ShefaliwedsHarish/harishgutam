<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'hs_getindex'])->name('home');
Route::get('/about', [HomeController::class, 'hs_getabout'])->name('about_us');
Route::get('/contact', [HomeController::class, 'hs_getcontact'])->name('contact_us');

Route::get('/login',function (){
})->name('login');
Route::get('/registration',function (){
})->name('register');
