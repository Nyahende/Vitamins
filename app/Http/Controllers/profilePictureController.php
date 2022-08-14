<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use App\Models\newmessage;

class profilePictureController extends Controller
{
    public function editProfilePicture($id){

        $editProfilePicture = User::find($id);
        $name = Auth::user()->name;
        $shownewmessage = newmessage::get();
      
        return view('vitamin.profilepicture',['editProfilePicture'=>$editProfilePicture],compact('id','name','shownewmessage'));
    }

    public function ProfilePictureRoute(Request $request){
        $profilePicture=User::find($request->id);
        $file=$request->file;
        $filename=time().'.'.$file->getClientOriginalName();
        $request->file->move('assets',$filename);
        $profilePicture->profile_picture=$filename;
        $profilePicture->save();
        return redirect('profile');
    }
}
