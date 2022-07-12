<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\text;
use DB;

class liveChatController extends Controller
{
    public function Chat($name)
    {

        $receivername = $name;
        $authusername = Auth::user()->name;
        $userDetails = DB::table('users')->where('name',$name)->get();
        return view('live.Chat',compact('authusername','receivername','name','userDetails'));
    }

    public function sendtext(Request $request)
    {

      $text = new text;
      $text->sender_name=Auth::user()->name;
      $text->receiver_name=$request->receiver;
      $text->text_body=$request->message;
      $text->save();
     
      return redirect()->back();
    }
    public function fetchtexts($name)
    {
        $texts = DB::table('texts')->orderBy('id','desc')->get();
        
        return response()->json([
               'texts'=>$texts,
        ]);

    }
}
