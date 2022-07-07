<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\movie;
use App\Models\trailler;
use App\Models\event;

class moviesController extends Controller
{
    public function movies()
    {
        $movies = movie::orderBy('id','desc')->get();
        $traillers = trailler::orderBy('id','desc')->get();
        $events = event::orderBy('id','desc')->get();
        return view('vitamin.movies',compact('movies','traillers','events'));
    }
}
