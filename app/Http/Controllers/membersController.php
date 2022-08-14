<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use App\Models\newmessage;

class membersController extends Controller
{
    public function members()
    {

        $users = User::all();
        $name = Auth::user()->name;
        $shownewmessage = newmessage::get();
        return view('vitamin.members',compact('users','name','shownewmessage'));
    }

    public function searchuser(Request $request)
    {
        $output = '';
       
        $users =user::where('name','Like','%'.$request->usersearch.'%')->get();

        foreach($users as $item)
        {
           $output.= 
              
           '
            <tr>

            <td> 
            '.'
            <a href="userprofile/'.$item->name.'">'.''. $item->name.'</a> <br>
            
            '.'</td>
            </tr>';
           

        }

        return response($output);

    }
}
