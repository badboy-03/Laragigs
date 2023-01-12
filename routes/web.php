<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

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
// Listing Controller
Route::get('/',[ListingController::class,'index'])->name('home');
Route::get('/listings/create',[ListingController::class,'create'])->name('listings.create')->middleware('auth');
Route::get('/listings/edit/{listings}',[ListingController::class,'edit'])->name('listings.edit')->middleware('auth');
Route::get('/listings/manage',[ListingController::class,'manage'])->name('listings.manage')->middleware('auth');
Route::get('/listings/{listing}',[ListingController::class,'show'])->name('listings.show');
Route::put('/listings/{listing}',[ListingController::class,'update'])->name('listings.update')->middleware('auth');
Route::post('/listings',[ListingController::class,'store'])->name('listings.store')->middleware('auth');
Route::delete('/listings/{listing}',[ListingController::class,'delete'])->name('listings.delete')->middleware('auth');
// User Controller
Route::get('/register',[UserController::class,'create'])->name('user.form')->middleware('guest');
Route::get('/login',[UserController::class,'login'])->name('user.login')->middleware('guest');
Route::post('/users',[UserController::class,'store'])->name('user.store');
Route::post('/logout',[UserController::class,'logout'])->name('user.logout')->middleware('auth');
Route::post('/users/login',[UserController::class,'auth'])->name('user.auth');