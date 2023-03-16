<?php

use App\Http\Controllers\FootwearController;
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
Route::get('/', [FootwearController::class, 'index']);

//Show Create Form
Route::get('/listings/create', [FootwearController::class,'create'])->middleware('auth');

//Store Listing Data
Route::post('/listings', [FootwearController::class,'store'])->middleware('auth');

//Show Edit Form
Route::get('/listings/{footwear}/edit', [FootwearController::class, 'edit'])->middleware('auth');

//Update Listing
Route::put('/listings/{footwear}', [FootwearController::class, 'update'])->middleware('auth');

//Delete Listing
Route::delete('/listings/{footwear}', [FootwearController::class,'destroy'])->middleware('auth');

//Manage Listing
Route::get('/listings/manage', [FootwearController::class,'manage'])->middleware('auth');

//Single Listing
Route::get('/listings/{footwear}', [FootwearController::class, 'show']);

//Show Register / Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

//Create New User
Route::post('/users', [UserController::class, 'store']);

//Log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

//Show login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

//Login User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);