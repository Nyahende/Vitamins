<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class sportsController extends Controller
{
    public function sports()
    {
        return view('vitamin.sports');
    }
}
