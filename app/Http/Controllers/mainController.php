<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\movie;

class mainController extends Controller
{
    public function main()
    {

        $movies = movie::take(5)->orderBy('id','desc')->get();
        return view('vitamin.main',compact('movies'));
    }
    public function firstpage()
    {
        return view('vitamin.firstpage');
    }
}
