<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\media;
use App\Models\images;
use App\Models\post;
use App\Models\imageComment;
use App\Models\videoComment;
use App\Models\postComment;
use Share;

class userProfileController extends Controller
{
    public function userprofile($name)
    {
        $Wshare = Share::currentPage()->whatsapp();
        $Tshare = Share::currentPage()->telegram();
        $Fshare = Share::currentPage()->facebook();
        $userDetails = User::where('name',$name)->get();
        $userVideos = media::where('poster_name',$name)->get();
        $userImages = images::where('poster_name',$name)->get();
        $userPosts = post::where('poster_name',$name)->get();
        $userVideoComments = videoComment::orderBy('id','desc')->get();
        $userImageComments = imageComment::orderBy('id','desc')->get();
        $userPostComments = postComment::orderBy('id','desc')->get();
        return view('vitamin.userprofile',compact('userDetails','userVideos','userVideoComments',
        'userImages','userImageComments','userPosts','userPostComments','Wshare','Tshare','Fshare'));
    }
}
