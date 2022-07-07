<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\movie;
use App\Models\audio;

class mainController extends Controller
{
    public function main()
    {

        $movies = movie::take(5)->orderBy('id','desc')->get();
        $songs = audio::take(4)->orderBy('id','desc')->get();
        return view('vitamin.main',compact('movies','songs'));
    }
    public function firstpage()
    {
        return view('vitamin.firstpage');
    }
}
