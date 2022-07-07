<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\movie;
use App\Models\trailler;
use App\Models\event;

class adminController extends Controller
{
    public function admin()
    {
        $movies = movie::orderBy('id','desc')->get();
        $traillers = trailler::orderBy('id','desc')->get();
        $events = event::orderBy('id','desc')->get();
        return view('vitamin.admin',compact('movies','traillers','events'));
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
