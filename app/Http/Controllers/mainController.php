<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\movie;
use App\Models\audio;
use App\Models\book;
use App\Models\podcast;
use App\Models\user;
use App\Models\activity;
use Auth;

class mainController extends Controller
{
    public function main()
    {

        $bookCount = book::count();
        $Authid = Auth::id();
        $podcastCount = podcast::count();
        $usersCount = User::count();
        $movies = movie::take(5)->orderBy('id','desc')->get();
        $songs = audio::take(4)->orderBy('id','desc')->get();
        $name = Auth::user()->name;
        $activity = activity::where('User',$Authid)->get();
        $Authid = Auth::id();
        return view('vitamin.main',compact('movies','songs','bookCount','usersCount','podcastCount','name','activity','Authid'));
    }
    public function firstpage()
    {
        $movies = movie::take(5)->orderBy('id','desc')->get();
        $songs = audio::take(4)->orderBy('id','desc')->get();
        return view('vitamin.firstpage',compact('movies','songs'));
    }
}
