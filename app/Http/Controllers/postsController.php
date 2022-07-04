<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class postsController extends Controller
{
    public function posts()
    {
        return view('vitamin.posts');
    }
}
