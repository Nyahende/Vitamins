<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\media;
use Auth;

class videoController extends Controller
{
    
    public function ProfileMedia(Request $request)
    {
        $media = new media;
        $media -> caption = $request->caption;
        $media -> poster_name = Auth::user()->name;
        $file=$request->file;
        $filename=time().'.'.$file->getClientOriginalName();
        $request->file->move('assets',$filename);
        $media->file=$filename;

        $query = $media->save();

        return redirect()->back();
    }
}
