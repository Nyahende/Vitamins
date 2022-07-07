<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\history;

class historyController extends Controller
{
    public function history()
    {
        $history = history::orderBy('id','desc')->get();
        return view('vitamin.history',compact('history'));
    }

    public function addHistory(Request $request)
    {

        $tech = new history;
        $tech -> name = $request->videoName;
        $file=$request->file;
        $filename=time().'.'.$file->getClientOriginalName();
        $request->file->move('assets',$filename);
        $tech->file=$filename;

        $query = $tech->save();

        return redirect()->back();
    }
}
