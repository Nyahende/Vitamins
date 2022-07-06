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

class profileController extends Controller
{
    public function profile()
    {
        $videoComments = videoComment::all();
        $imageComments = imageComment::all();
        $postComments = postComment::all();
        $username = Auth::user()->name;
        $userId = Auth::id();
        $userMedia = media::where('poster_name',$username)->orderBy('id','desc')->get();
        $userImage = images::where('poster_name',$username)->orderBy('id','desc')->get();
        $userPost = post::where('poster_name',$username)->orderBy('id','desc')->get();
        return view('vitamin.profile',compact('username','userId'),['userMedia'=>$userMedia,'userImage'=>$userImage,
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

        $UpdateUser->save();

        return redirect('profile');
    }

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

    public function ProfileComment(Request $request)
    {

        $vComments = new videoComment;
        $vComments -> post_id = $request->postId;
        $vComments -> comment_body = $request->commentBody;
        $vComments -> sender_name = Auth::user()->name;
        
        $query = $vComments->save();

        return redirect()->back();
    }
    public function ProfileImageComment(Request $request)
    {

        $vComments = new imageComment;
        $vComments -> post_id = $request->postId;
        $vComments -> comment_body = $request->commentBody;
        $vComments -> sender_name = Auth::user()->name;
        
        $query = $vComments->save();

        return redirect()->back();
    }

    public function ProfilePostComment(Request $request)
    {

        $pComments = new postComment;
        $pComments -> post_id = $request->postId;
        $pComments -> comment_body = $request->commentBody;
        $pComments -> sender_name = Auth::user()->name;
        
        $query = $pComments->save();

        return redirect()->back();
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