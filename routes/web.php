<?php

use App\Http\Controllers\DonasiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DokumentasiController;
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

Route::get('/navbar', function () {
    return view('navbar');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/master', function () {
    return view('master');
});







//Route::get('/', [HomeController::class, 'index'])->name('home');



// Route::get('/', [DokumentasiController::class, 'indexdokumentasi'])->name('dokumentasi.home');

// Route::get('/', [DonasiController::class, 'indexdonasi'])->name('donasi.home');


Route::get('/loginstaff', function(){
    return view('loginstaff');
})->name('loginstaff');

Route::get('/signin', function () {
    return view('signin');
});



Route::post('/authenticate', [LoginController::class, 'authenticate']);
Route::post('/signin', [LoginController::class, 'registration']);