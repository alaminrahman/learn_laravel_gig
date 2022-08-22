<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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

Route::get('/listings/create', [ListingController::class, 'create']);

Route::post('/listings', [ListingController::class, 'store']);
//edit
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);

//update
Route::put('/listings/{listing}', [ListingController::class, 'update']);

//delete
Route::delete('/listings/{listing}/delete', [ListingController::class, 'delete']);

//Single Listing 
Route::get('/listings/{listing}', [ListingController::class, 'show']);
