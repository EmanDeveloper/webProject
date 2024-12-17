<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::resource('listing', ListingController::class)->except(['index']);
Route::get('/', [ListingController::class, 'index'])->name('home');
Route::get('/listings/new', [ListingController::class, 'create'])->name('listings.create')->middleware('auth');
Route::post('/listings', [ListingController::class, 'store'])->name('listings.store')->middleware('auth');


Route::get('/listing/{id}/edit', [ListingController::class, 'edit'])->name('listing.edit');
Route::put('/listing/{id}/update', [ListingController::class, 'update'])->name('listing.update');

Route::get('/signup', [UserController::class, 'showSignupForm'])->name('signup');
Route::post('/user/create', [UserController::class, 'register'])->name('user.register');
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/user/login', [UserController::class, 'login'])->name('user.login');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');