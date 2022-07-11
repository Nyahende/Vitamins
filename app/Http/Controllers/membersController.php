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
            <a href="#'.$item->id.'">'.''. $item->name.'</a> <br>
            
            '.'</td>
            </tr>';
           

        }

        return response($output);

    }
}
