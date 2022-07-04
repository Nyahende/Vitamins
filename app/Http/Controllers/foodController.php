<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class foodController extends Controller
{
    public function food()
    {
        return view('vitamin.food');
    }
}
