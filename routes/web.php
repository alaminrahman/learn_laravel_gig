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

Route::get('/', [ListingController::class, 'index']);

Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

//Manage
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

//edit
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

//update
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

//delete
Route::delete('/listings/{listing}/delete', [ListingController::class, 'delete'])->middleware('auth');

//Single Listing 
Route::get('/listings/{listing}', [ListingController::class, 'show']);

//Register
Route::get('/register', [UserController::class, 'create'])->middleware('guest');
Route::post('/users', [UserController::class, 'store'])->middleware('guest');
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

Route::post('/users/authenticate', [UserController::class, 'authenticate']);