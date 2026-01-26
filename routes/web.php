<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\BTSController;

// welcome home/default page
Route::get('/', function () {
    return view('welcome');
});

Route::get('/quotes', [BTSController::class, 'quotes']); // quotes page

//all the members
Route::get('/KimNamjoon', [BTSController::class, 'rm']);
Route::get('/KimSeokjin', [BTSController::class, 'jin']);
Route::get('/MinYoongi', [BTSController::class, 'suga']);
Route::get('/JungHoseok', [BTSController::class, 'jhope']);
Route::get('/ParkJimin', [BTSController::class, 'jimin']);
Route::get('/KimTaehyung', [BTSController::class, 'v']);
Route::get('/JeonJungkook', [BTSController::class, 'jk']);
Route::get('/Bt21', [BTSController::class, 'bt21']);

// meme gallery page
Route::get('/gallery', [GalleryController::class, 'index']);

//voting page 
Route::get('/vote', [BTSController::class, 'showVoteForm']);
Route::post('/vote', [BTSController::class, 'handleVote']);

// 0t7 image path 
Route::get('/bts', function () {
    return response()->file(public_path('extra_gallery/_BTS_.jfif'));
});