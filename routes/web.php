<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mainController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\postsController;
use App\Http\Controllers\followController;
use App\Http\Controllers\songsController;
use App\Http\Controllers\moviesController;
use App\Http\Controllers\techController;
use App\Http\Controllers\historyController;
use App\Http\Controllers\sportsController;
use App\Http\Controllers\foodController;
use App\Http\Controllers\membersController;
use App\Http\Controllers\userProfileController;

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

Route::get('/',[mainController::class,'main'])->name('main');
Route::get('profile',[profileController::class,'profile'])->name('profile');
Route::get('posts',[postsController::class,'posts'])->name('posts');
Route::get('follow',[followController::class,'follow'])->name('follow');
Route::get('songs',[songsController::class,'songs'])->name('songs');
Route::get('movies',[moviesController::class,'movies'])->name('movies');
Route::get('technology',[techController::class,'technology'])->name('technology');
Route::get('history',[historyController::class,'history'])->name('history');
Route::get('sports',[sportsController::class,'sports'])->name('sports');
Route::get('food',[foodController::class,'food'])->name('food');
Route::get('members',[membersController::class,'members'])->name('members');
Route::get('userprofile',[userProfileController::class,'userprofile'])->name('userprofile');

Auth::routes();

