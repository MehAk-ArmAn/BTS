<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\BTSController; // welcome home/default page
Route::get('/', function () {
    return view('welcome');
});

Route::get('/quotes', [BTSController::class, 'quotes']); // quotes page

Route::get('/Bt21', [BTSController::class, 'bt21']);

// meme gallery page
Route::get('/gallery', [GalleryController::class, 'index']);

//voting page
Route::get('/vote', [BTSController::class, 'showVoteForm']);
Route::post('/vote', [BTSController::class, 'handleVote']);

// 0t7 images paths
Route::get('/bts', function () {
    return response()->file(public_path('imgs/btsssss.jfif'));
});

// bts copy generator controller
use App\Http\Controllers\BtsCopyController;

// GET request: show the form page
Route::get('/bts_copies/create', [BtsCopyController::class, 'create'])
    ->name('bts_copies.create');
// POST request: handle form submission and save to DB
Route::post('/bts_copies', [BtsCopyController::class, 'store'])
    ->name('bts_copies.store');
// (Optional) GET /bts_copies to show list page
Route::get('/bts_copies', [BtsCopyController::class, 'index'])
    ->name('bts_copies.index');

// Dynamic member route
Route::get('/{name}', [BTSController::class, 'memberPage']);