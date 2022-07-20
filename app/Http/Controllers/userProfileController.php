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
        $SocialShare = \Share::page(
            'http://www.vitamin360.herokuapp.com/userprofile/$name'
        )
        ->facebook()
        ->twitter()
        ->linkedin()
        ->telegram()
        ->Whatsapp();
        
        $userDetails = User::where('name',$name)->get();
        $userVideos = media::where('poster_name',$name)->get();
        $userImages = images::where('poster_name',$name)->get();
        $userPosts = post::where('poster_name',$name)->get();
        $userVideoComments = videoComment::orderBy('id','desc')->get();
        $userImageComments = imageComment::orderBy('id','desc')->get();
        $userPostComments = postComment::orderBy('id','desc')->get();
        $mediaCount = media::where('poster_name',$name)->count();
        $imageCount = images::where('poster_name',$name)->count();
        $postCount = post::where('poster_name',$name)->count();

        $totalPostCount = $mediaCount + $imageCount + $postCount;
        return view('vitamin.userprofile',compact('userDetails','userVideos','userVideoComments',
        'userImages','userImageComments','userPosts','userPostComments','SocialShare','totalPostCount'));
    }
}
