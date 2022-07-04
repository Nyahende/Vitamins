<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class songsController extends Controller
{
    public function songs()
    {
        return view('vitamin.songs');
    }
}
