<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class mainController extends Controller
{
    public function main()
    {
        return view('vitamin.main');
    }
    public function firstpage()
    {
        return view('vitamin.firstpage');
    }
}
