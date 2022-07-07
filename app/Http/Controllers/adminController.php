<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\movie;
use App\Models\trailler;
use App\Models\event;
use App\Models\audio;
use App\Models\musicVideo;
use App\Models\tech;
use App\Models\food;
use App\Models\sport;
use App\Models\history;

class adminController extends Controller
{
    public function admin()
    {
        $musicVideo = musicVideo::orderBy('id','desc')->get();
        $audio = audio::orderBy('id','desc')->get();
        $movies = movie::orderBy('id','desc')->get();
        $traillers = trailler::orderBy('id','desc')->get();
        $events = event::orderBy('id','desc')->get();
        $tech = tech::orderBy('id','desc')->get();
        $food = food::orderBy('id','desc')->get();
        $sport = sport::orderBy('id','desc')->get();
        $history = history::orderBy('id','desc')->get();
        return view('vitamin.admin',compact('movies','traillers','events','audio','musicVideo','tech','food','sport','history'));
    }

    public function AdminMovies(Request $request)
    {

        $movie = new movie;
        $movie -> name = $request->movieName;
        $movie -> director = $request->directorName;
        $movie -> staring = $request->staringName;
        $movie -> released_year = $request->year;
        $file=$request->file;
        $filename=time().'.'.$file->getClientOriginalName();
        $request->file->move('assets',$filename);
        $movie->file=$filename;

        $query = $movie->save();

        return redirect()->back();
    }

    public function addSong(Request $request)
    {

        $audio = new audio;
        $audio -> song_name = $request->audioName;
        $audio -> artist_name = $request->artistName;
        $file=$request->file;
        $filename=time().'.'.$file->getClientOriginalName();
        $request->file->move('assets',$filename);
        $audio->file=$filename;

        $query = $audio->save();

        return redirect()->back();
    }

    public function addMusic(Request $request)
    {

        $audio = new musicVideo;
        $audio -> song_name = $request->musicName;
        $audio -> artist_name = $request->artistName;
        $file=$request->file;
        $filename=time().'.'.$file->getClientOriginalName();
        $request->file->move('assets',$filename);
        $audio->file=$filename;

        $query = $audio->save();

        return redirect()->back();
    }

    public function AdminEvents(Request $request)
    {

        $event = new event;
        $event -> name = $request->eventName;
        $event -> host = $request->hostName;
        $file=$request->file;
        $filename=time().'.'.$file->getClientOriginalName();
        $request->file->move('assets',$filename);
        $event->file=$filename;

        $query = $event->save();

        return redirect()->back();
    }

    public function AdminTraillers(Request $request)
    {

        $trailler = new trailler;
        $trailler -> name = $request->traillerName;
        $trailler -> director = $request->directorName;
        $trailler -> staring = $request->staringName;
        $file=$request->file;
        $filename=time().'.'.$file->getClientOriginalName();
        $request->file->move('assets',$filename);
        $trailler->file=$filename;

        $query = $trailler->save();

        return redirect()->back();
    }
}
