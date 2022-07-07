<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\food;

class foodController extends Controller
{
    public function food()
    {
        $food = food::orderBy('id','desc')->get();
        return view('vitamin.food',compact('food'));
    }


    
    public function uploadFood(Request $request)
    {

        $food = new food;
        $food -> name = $request->videoName;
        $file=$request->file;
        $filename=time().'.'.$file->getClientOriginalName();
        $request->file->move('assets',$filename);
        $food->file=$filename;

        $query = $food->save();

        return redirect()->back();
    }
}
