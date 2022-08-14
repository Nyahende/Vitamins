<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\media;
use App\Models\images;
use App\Models\post;
use App\Models\videoComment;
use App\Models\imageComment;
use App\Models\postComment;
use App\Models\newmessage;

class profileController extends Controller
{
    public function profile()
    {
        $videoComments = videoComment::orderBy('id','desc')->get();
        $imageComments = imageComment::orderBy('id','desc')->get();
        $postComments = postComment::orderBy('id','desc')->get();
        $username = Auth::user()->name;
        $userId = Auth::id();
        $userMedia = media::where('poster_name',$username)->orderBy('id','desc')->get();
        $userImage = images::where('poster_name',$username)->orderBy('id','desc')->get();
        $userPost = post::where('poster_name',$username)->orderBy('id','desc')->get();
        $mediaCount = media::where('poster_name',$username)->count();
        $imageCount = images::where('poster_name',$username)->count();
        $postCount = post::where('poster_name',$username)->count();
        $name = Auth::user()->name;
        $shownewmessage = newmessage::get();

        $totalPostCount = $mediaCount + $imageCount + $postCount;
        return view('vitamin.profile',compact('username','userId','totalPostCount','name','shownewmessage'),['userMedia'=>$userMedia,'userImage'=>$userImage,
        'userPost'=>$userPost,'videoComments'=>$videoComments,'imageComments'=>$imageComments,
        'postComments'=>$postComments]);
    }

    public function editAboutMe($userId)
    {
        $aboutUserId=User::find($userId);
        $authId=Auth::id();

        return view('vitamin.editaboutme',['aboutUserId'=>$aboutUserId],compact('userId','authId'));
    }

    public function deleteVideo($id)
    {
        $media=media::find($id);
        $media->delete($id);
        return redirect()->back();
    }

    
    public function deleteUser($id)
    {
        $user=User::find($id);
        $user->delete($id);
        return redirect('/');
    }
    public function deleteVideoComment($id)
    {
        $videoComment=videoComment::find($id);
        $videoComment->delete($id);
        return redirect()->back();
    }
    public function deleteImageComment($id)
    {
        $imageComment=imageComment::find($id);
        $imageComment->delete($id);
        return redirect()->back();
    }
    public function deletePostComment($id)
    {
        $postComment=postComment::find($id);
        $postComment->delete($id);
        return redirect()->back();
    }
    public function deleteImage($id)
    {
        $images=images::find($id);
        $images->delete($id);
        return redirect()->back();
    }
    public function deletePost($id)
    {
        $post=post::find($id);
        $post->delete($id);
        return redirect()->back();
    }

    public function UpdateUser(Request $request){

        $UpdateUser = User::find($request->id);
        $UpdateUser-> name = $request->aboutUsername;
        $UpdateUser->occupation = $request->aboutOccupation;
        $UpdateUser->location = $request->aboutLocation;
        $UpdateUser->skills = $request->aboutSkills;
        $UpdateUser->hobbies = $request->aboutHobbies;
        $UpdateUser->education = $request->aboutEducation;
        $UpdateUser->notes = $request->aboutNotes;
        $UpdateUser->status = $request->status;

        $UpdateUser->save();

        return redirect('profile');
    }

   

   
    public function ProfileImage(Request $request)
    {

        $media = new images;
        $media -> caption = $request->caption;
        $media -> poster_name = Auth::user()->name;
        $file=$request->file;
        $filename=time().'.'.$file->getClientOriginalName();
        $request->file->move('assets',$filename);
        $media->file=$filename;

        $query = $media->save();

        return redirect()->back();
    }
    public function ProfilePost(Request $request)
    {

        $post = new post;
        $post -> post = $request->post;
        $post -> poster_name = Auth::user()->name;      
        $query = $post->save();

        return redirect()->back();
    }

    
}
