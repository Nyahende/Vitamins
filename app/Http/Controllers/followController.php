<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class followController extends Controller
{
    public function follow()
    {
        return view('vitamin.follow');
    }
}
