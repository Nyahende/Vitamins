<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class membersController extends Controller
{
    public function members()
    {

        $users = User::all();
        return view('vitamin.members',compact('users'));
    }
}
