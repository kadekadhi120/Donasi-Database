<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DokumentasiController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/master', function () {
    return view('master');
});



Route::get('/', [DokumentasiController::class, 'index'])->name('home');


Route::get('/loginstaff', function(){
    return view('loginstaff');
})->name('loginstaff');

Route::get('/signin', function () {
    return view('signin');
});



Route::post('/authenticate', [LoginController::class, 'authenticate']);
Route::post('/signin', [LoginController::class, 'registration']);