<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sport;

class sportsController extends Controller
{
    public function sports()
    {
        $sport = sport::orderBy('id','desc')->get();
        return view('vitamin.sports',compact('sport'));
    }

    public function uploadSport(Request $request)
    {

        $food = new sport;
        $food -> name = $request->videoName;
        $file=$request->file;
        $filename=time().'.'.$file->getClientOriginalName();
        $request->file->move('assets',$filename);
        $food->file=$filename;

        $query = $food->save();

        return redirect()->back();
    }
}
