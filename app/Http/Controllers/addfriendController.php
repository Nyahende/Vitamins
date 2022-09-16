<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\friends;
use Auth;

class addfriendController extends Controller
{
    public function addfriend($name)
    {

        $friends = new friends;
        $friends -> follower = Auth::user()->name;
        $friends -> followed = $name;

        $query = $friends->save();

        return redirect()->route('userprofilename',[$name])->with('followsuccess','You may want to check his/her profile');
    }
}
