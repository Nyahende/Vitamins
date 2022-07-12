<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mainController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\podcastsController;
use App\Http\Controllers\bookController;
use App\Http\Controllers\songsController;
use App\Http\Controllers\moviesController;
use App\Http\Controllers\techController;
use App\Http\Controllers\historyController;
use App\Http\Controllers\sportsController;
use App\Http\Controllers\foodController;
use App\Http\Controllers\membersController;
use App\Http\Controllers\userProfileController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\liveChatController;

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
Route::get('podcasts',[podcastsController::class,'podcasts'])->name('podcasts');
Route::get('book',[bookController::class,'book'])->name('book');
Route::get('songs',[songsController::class,'songs'])->name('songs');
Route::get('movies',[moviesController::class,'movies'])->name('movies');
Route::get('technology',[techController::class,'technology'])->name('technology');
Route::get('history',[historyController::class,'history'])->name('history');
Route::get('sports',[sportsController::class,'sports'])->name('sports');
Route::get('food',[foodController::class,'food'])->name('food');
Route::get('members',[membersController::class,'members'])->name('members');
Route::get('userprofile/{name}',[userProfileController::class,'userprofile'])->name('userprofilename');
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
Route::post('add-movie',[adminController::class,'AdminMovies'])->name('AdminMovies');
Route::post('add-trailler',[adminController::class,'AdminTraillers'])->name('AdminTrailler');
Route::post('add-event',[adminController::class,'AdminEvents'])->name('AdminEvents');
Route::post('add-song',[adminController::class,'addSong'])->name('addSong');
Route::post('add-music',[adminController::class,'addMusic'])->name('addMusic');
Route::post('add-tech',[techController::class,'uploadTech'])->name('uploadTech');
Route::post('add-food',[foodController::class,'uploadFood'])->name('uploadFood');
Route::post('add-sport',[sportsController::class,'uploadSport'])->name('uploadSport');
Route::post('add-history',[historyController::class,'addHistory'])->name('addHistory');
Route::post('add-book',[bookController::class,'addBook'])->name('addBook');
Route::post('add-podcast',[podcastsController::class,'addPodcast'])->name('addPodcast');
Route::post('add-review',[bookController::class,'BookReview'])->name('BookReview');
Route::get('view/{file}',[bookController::class,'BookView']);
Route::get('view/{file}',[bookController::class,'PreviewView']);
Route::get('search',[bookController::class,'search']);
Route::get('searchuser',[membersController::class,'searchuser']);
Route::get('searchpodcast',[podcastsController::class,'searchpodcast']);
Route::get('searchtrailer',[moviesController::class,'searchtrailer']);
Route::get('searchmovie',[moviesController::class,'searchmovie']);
Route::get('searchevent',[moviesController::class,'searchevent']);
Route::get('searchvideo',[songsController::class,'searchvideo']);
Route::get('searchaudio',[songsController::class,'searchaudio']);
Route::get('searchtech',[techController::class,'searchtech']);
Route::get('searchhistory',[historyController::class,'searchhistory']);
Route::get('searchsport',[sportsController::class,'searchsport']);
Route::get('searchfood',[foodController::class,'searchfood']);

});

Route::get('chat/{name}',[liveChatController::class,'Chat'])->name('chat');

Route::post('send-text',[liveChatController::class,'sendtext'])->name('sendtext');
Route::get('fetch-texts/{name}',[liveChatController::class,'fetchtexts'])->name('fetchtexts');
Auth::routes();

