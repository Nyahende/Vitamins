<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\audio;
use App\Models\musicVideo;
use Share;

class songsController extends Controller
{
    public function songs()
    {
        $Wshare = Share::currentPage()->whatsapp();
        $Tshare = Share::currentPage()->telegram();
        $Fshare = Share::currentPage()->facebook();
        $songs = audio::orderBy('id','desc')->get();
        $musicVideo = musicVideo::orderBy('id','desc')->get();
        return view('vitamin.songs',compact('songs','musicVideo','Wshare','Tshare','Fshare'));
    }


    
    public function searchvideo(Request $request)
    {
        $output = '';
       
        $video = musicVideo::where('song_name','Like','%'.$request->videosearch.'%')->
                            orWhere('artist_name','Like','%'.$request->videosearch.'%')->get();

        foreach($video as $item)
        {
           $output.= 
              
           '
            <tr>

            <td> 
            '.'
            <a href="#'.$item->id.'">'.''. $item->song_name.'</a> <br>
            '. $item->artist_name.'
            
            '.'</td>
            </tr>';
           

        }

        return response($output);

    }

    public function searchaudio(Request $request)
    {
        $output = '';
       
        $audio = audio::where('song_name','Like','%'.$request->audiosearch.'%')->
                       orWhere('artist_name','Like','%'.$request->audiosearch.'%')->get();

        foreach($audio as $item)
        {
           $output.= 
              
           '
            <tr>

            <td> 
            '.'
            <a href="#'.$item->id.'">'.''. $item->song_name.'</a> <br>
            '. $item->artist_name.'
            '.'
            </td>
            </tr>';
           

        }

        return response($output);

    }
}
