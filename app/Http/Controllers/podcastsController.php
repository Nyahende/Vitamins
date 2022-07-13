<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\podcast;
use Share;

class podcastsController extends Controller
{
    public function podcasts()
    {
        $Wshare = Share::currentPage()->whatsapp();
        $Tshare = Share::currentPage()->telegram();
        $Fshare = Share::currentPage()->facebook();

        $podcast = podcast::orderBy('id','desc')->get();
        return view('vitamin.podcasts',compact('podcast','Wshare','Tshare','Fshare'));
    }



    public function addPodcast(Request $request)
    {
 
     $podcast = new podcast;
     $podcast ->name = $request->podName;
     $file=$request->file;
     $filename=time().'.'.$file->getClientOriginalName();
     $request->file->move('assets',$filename);
     $podcast->file=$filename;
 
     $query = $podcast->save();
 
     return redirect()->back();
 
    }


    public function searchpodcast(Request $request)
    {
        $output = '';
       
        $podcasts =podcast::where('name','Like','%'.$request->podcastsearch.'%')->get();

        foreach($podcasts as $item)
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


