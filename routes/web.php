<?php

use App\Models\Listing;
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

//index - Show all data --> listings
//show - Show single data --> listing
//create - Show form to create new --> listing
//store - Store Data --> New listing
//edit - Show form to edit data
//update - Update data
//destroy - Delete a data

//All Listing
Route::get('/', [ListingController::class, 'index']);

//Show Create Form
Route::get('/listings/create', [ListingController::class,'create']);

//Store Listing Data
Route::post('/listings', [ListingController::class,'store']);

//Show Edit Form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);

//Update Listing
Route::put('/listings/{listing}', [ListingController::class, 'update']);

//Delete Listing
Route::delete('/listings/{listing}', [ListingController::class,'destroy']);

//Single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

//Show Register / Create Form
Route::get('/register', [UserController::class, 'create']);