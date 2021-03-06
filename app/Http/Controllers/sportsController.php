<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sport;
use Share;

class sportsController extends Controller
{
    public function sports()
    {
        $Wshare = Share::currentPage()->whatsapp();
        $Tshare = Share::currentPage()->telegram();
        $Fshare = Share::currentPage()->facebook();
        $sport = sport::orderBy('id','desc')->get();
        return view('vitamin.sports',compact('sport','Wshare','Tshare','Fshare'));
    }

    public function uploadSport(Request $request)
    {

        $food = new sport;
        $food -> name = $request->videoName;
        $file=$request->file;
        $filename=time().'.'.$file->getClientOriginalName();
        $request->file->move('assets',$filename);
        $food->file=$filename;

        $query = $food->save();

        return redirect()->back();
    }

    public function searchsport(Request $request)
    {
        $output = '';
       
        $sport = sport::where('name','Like','%'.$request->techsearch.'%')->get();

        foreach($sport as $item)
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
