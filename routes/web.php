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
use App\Http\Controllers\adminController;

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

Route::get('/',[mainController::class,'firstpage'])->name('/');

Route::group(['middleware'=>['auth']], function(){

Route::get('homepage',[mainController::class,'main'])->name('main');
Route::get('profile',[profileController::class,'profile'])->name('profile');
Route::get('editProfilePicture/{id}',[profileController::class,'editProfilePicture'])->name('editProfilePicture');
Route::get('posts',[postsController::class,'posts'])->name('posts');
Route::get('follow',[followController::class,'follow'])->name('follow');
Route::get('songs',[songsController::class,'songs'])->name('songs');
Route::get('movies',[moviesController::class,'movies'])->name('movies');
Route::get('technology',[techController::class,'technology'])->name('technology');
Route::get('history',[historyController::class,'history'])->name('history');
Route::get('sports',[sportsController::class,'sports'])->name('sports');
Route::get('food',[foodController::class,'food'])->name('food');
Route::get('members',[membersController::class,'members'])->name('members');
Route::get('userprofile/{name}',[userProfileController::class,'userprofile'])->name('userprofile');
Route::get('editabout/{userId}',[ProfileController::class,'editAboutMe']);
Route::post('UpdateUser',[ProfileController::class,'UpdateUser'])->name('UpdateUser');
Route::get('admin',[adminController::class,'admin']);
Route::post('add-media',[ProfileController::class,'profileMedia'])->name('ProfileMediaRoute');
Route::post('add-image',[ProfileController::class,'profileImage'])->name('ProfileImageRoute');
Route::post('add-post',[ProfileController::class,'ProfilePost'])->name('ProfilePostRoute');
Route::get('deleteVideo/{id}',[ProfileController::class,'deleteVideo']);
Route::get('deleteImage/{id}',[ProfileController::class,'deleteImage']);
Route::get('deletePost/{id}',[ProfileController::class,'deletePost']);
Route::get('deleteVideoComment/{id}',[ProfileController::class,'deleteVideoComment']);
Route::get('deleteImageComment/{id}',[ProfileController::class,'deleteImageComment']);
Route::get('deletePostComment/{id}',[ProfileController::class,'deletePostComment']);
Route::post('ProfileComment',[ProfileController::class,'ProfileComment'])->name('Profilecomment');
Route::post('ProfileImageComment',[ProfileController::class,'ProfileImageComment'])->name('ProfileImageComment');
Route::post('ProfilePostComment',[ProfileController::class,'ProfilePostComment'])->name('ProfilePostComment');
Route::post('ProfilePictureRoute',[ProfileController::class,'ProfilePictureRoute'])->name('ProfilePictureRoute');

});

Auth::routes();

