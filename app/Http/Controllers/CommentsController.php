<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\videoComment;
use App\Models\imageComment;
use App\Models\postComment;
use Auth;

class CommentsController extends Controller
{
    
    public function ProfileComment(Request $request)
    {
        $vComments = new videoComment;

        if(Auth::user()->profile_picture)
        {
            $vComments -> post_id = $request->postId;
            $vComments -> sender_picture = Auth::user()->profile_picture;
            $vComments -> comment_body = $request->commentBody;
            $vComments -> sender_name = Auth::user()->name;
            
            $query = $vComments->save();
    
            return redirect()->back();
        }
        else
        {
           
            return redirect()->back()->with('profilePicture','Sorry, You need to change your Profile Picture First Before Commenting!');
        }
       
        }
 
    public function ProfileImageComment(Request $request)
    {

        $vComments = new imageComment;
        if(Auth::user()->profile_picture)
        {
            $vComments -> post_id = $request->postId;
            $vComments -> sender_picture = Auth::user()->profile_picture;
            $vComments -> comment_body = $request->commentBody;
            $vComments -> sender_name = Auth::user()->name;
            
            $query = $vComments->save();
    
            return redirect()->back();
        }
        else
        {
           
            return redirect()->back()->with('profilePicture','Sorry, You need to change your Profile Picture First Before Commenting!');
        }
    }

    public function ProfilePostComment(Request $request)
    {

        $pComments = new postComment;
        if(Auth::user()->profile_picture)
        {
            $vComments -> post_id = $request->postId;
            $vComments -> sender_picture = Auth::user()->profile_picture;
            $vComments -> comment_body = $request->commentBody;
            $vComments -> sender_name = Auth::user()->name;
            
            $query = $vComments->save();
    
            return redirect()->back();
        }
        else
        {
           
            return redirect()->back()->with('profilePicture','Sorry, You need to change your Profile Picture First Before Commenting!');
        }
    }
}
