<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\audio;
use App\Models\musicVideo;

class songsController extends Controller
{
    public function songs()
    {
        $songs = audio::orderBy('id','desc')->get();
        $musicVideo = musicVideo::orderBy('id','desc')->get();
        return view('vitamin.songs',compact('songs','musicVideo'));
    }
}
