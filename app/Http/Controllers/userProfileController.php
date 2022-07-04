<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userProfileController extends Controller
{
    public function userprofile()
    {
        return view('vitamin.userprofile');
    }
}
