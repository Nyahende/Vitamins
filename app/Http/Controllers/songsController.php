<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\audio;
use App\Models\musicVideo;

class songsController extends Controller
{
    public function songs()
    {
        $songs = audio::orderBy('id','desc')->get();
        $musicVideo = musicVideo::orderBy('id','desc')->get();
        return view('vitamin.songs',compact('songs','musicVideo'));
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
