<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\movie;
use App\Models\audio;
use App\Models\book;
use App\Models\podcast;
use App\Models\user;

class mainController extends Controller
{
    public function main()
    {

        $bookCount = book::count();
        $podcastCount = podcast::count();
        $usersCount = User::count();
        $movies = movie::take(5)->orderBy('id','desc')->get();
        $songs = audio::take(4)->orderBy('id','desc')->get();
        return view('vitamin.main',compact('movies','songs','bookCount','usersCount','podcastCount'));
    }
    public function firstpage()
    {
        $movies = movie::take(5)->orderBy('id','desc')->get();
        $songs = audio::take(4)->orderBy('id','desc')->get();
        return view('vitamin.firstpage',compact('movies','songs'));
    }
}
