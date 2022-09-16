<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\history;
use App\Models\newmessage;
use Auth;

class historyController extends Controller
{
    public function history()
    {
        $name = Auth::user()->name;
        $history = history::orderBy('id','desc')->paginate(10);
        $shownewmessage = newmessage::get();
        return view('vitamin.history',compact('history','name','shownewmessage'));
    }

    public function addHistory(Request $request)
    {

        $tech = new history;
        $tech -> name = $request->videoName;
        $file=$request->file;
        $filename=time().'.'.$file->getClientOriginalName();
        $request->file->move('assets',$filename);
        $tech->file=$filename;

        $query = $tech->save();

        return redirect()->back();
    }

    public function searchhistory(Request $request)
    {
        $output = '';
       
        $tech = history::where('name','Like','%'.$request->historysearch.'%')->get();

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
