<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\food;
use App\Models\newmessage;
use Auth;

class foodController extends Controller
{
    public function food()
    {
        $name = Auth::user()->name;
        $food = food::orderBy('id','desc')->get();
        $shownewmessage = newmessage::get();
        return view('vitamin.food',compact('food','name','shownewmessage'));
    }


    
    public function uploadFood(Request $request)
    {

        $food = new food;
        $food -> name = $request->videoName;
        $file=$request->file;
        $filename=time().'.'.$file->getClientOriginalName();
        $request->file->move('assets',$filename);
        $food->file=$filename;

        $query = $food->save();

        return redirect()->back();
    }

    
    public function searchfood(Request $request)
    {
        $output = '';
       
        $food = food::where('name','Like','%'.$request->foodsearch.'%')->get();

        foreach($food as $item)
        {
           $output.= 
              
           '
            <tr>

            <td> 
            '.'
            <a href="#'.$item->id.'">'.''. $item->name.'</a> <br>
            
            '.'
            </td>
            </tr>';
           

        }

        return response($output);

    }
}
