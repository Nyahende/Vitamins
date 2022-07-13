<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\movie;
use App\Models\trailler;
use App\Models\event;
use Share;

class moviesController extends Controller
{
    public function movies()
    {
        $Wshare = Share::currentPage()->whatsapp();
        $Tshare = Share::currentPage()->telegram();
        $Fshare = Share::currentPage()->facebook();
        $movies = movie::orderBy('id','desc')->get();
        $traillers = trailler::orderBy('id','desc')->get();
        $events = event::orderBy('id','desc')->get();
        return view('vitamin.movies',compact('movies','traillers','events','Wshare','Tshare','Fshare'));
    }

    public function searchtrailer(Request $request)
    {
        $output = '';
       
        $trailer =trailler::where('name','Like','%'.$request->trailersearch.'%')->
                            orWhere('staring','Like','%'.$request->trailersearch.'%')->get();

        foreach($trailer as $item)
        {
           $output.= 
              
           '
            <tr>

            <td> 
            '.'
            <a href="#'.$item->id.'">'.''. $item->name.'</a> <br>
            '. $item->staring.'
            
            '.'</td>
            </tr>';
           

        }

        return response($output);

    }

    public function searchmovie(Request $request)
    {
        $output = '';
       
        $movie =movie::where('name','Like','%'.$request->moviesearch.'%')->
                            orWhere('staring','Like','%'.$request->moviesearch.'%')->get();

        foreach($movie as $item)
        {
           $output.= 
              
           '
            <tr>

            <td> 
            '.'
            <a href="#'.$item->id.'">'.''. $item->name.'</a> <br>
            '. $item->staring.'
            
            '.'</td>
            </tr>';
           

        }

        return response($output);

    }

    public function searchevent(Request $request)
    {
        $output = '';
       
        $event = event::where('name','Like','%'.$request->eventssearch.'%')->get();

        foreach($event as $item)
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
