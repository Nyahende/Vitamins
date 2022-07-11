<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tech;

class techController extends Controller
{
    public function technology()
    {
        $tech = tech::orderBy('id','desc')->get();
    return view('vitamin.technology',compact('tech'));
    }

    public function uploadTech(Request $request)
    {

        $tech = new tech;
        $tech -> name = $request->videoName;
        $file=$request->file;
        $filename=time().'.'.$file->getClientOriginalName();
        $request->file->move('assets',$filename);
        $tech->file=$filename;

        $query = $tech->save();

        return redirect()->back();
    }

    public function searchtech(Request $request)
    {
        $output = '';
       
        $tech = tech::where('name','Like','%'.$request->techsearch.'%')->get();

        foreach($tech as $item)
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
