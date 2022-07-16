<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\activity;
use Auth;

class activityController extends Controller
{
    public function addActivity(Request $request)

    {
      $notchecked = "not checked";

      $activity = new activity;
      $activity-> Body = $request->activity;
      $activity->duration = $request->duration;
      $activity->checked = $notchecked;
      $activity->User = Auth::user()->id;
      $activity->save();
     
      return redirect()->back();
    }

    public function checked(Request $request){
      $updatecheck = activity::find($request->id);
      $updatecheck -> checked = $request->checked;
      $updatecheck->save();
      return redirect()->back();
  }
  public function deleteSingle($id)
  {
      $activity=activity::find($id);
      $activity->delete($id);
      return redirect()->back();
  }
  public function deleteAll($id)
  {
      $activity=activity::where('User',$id);
      $activity->delete($id);
      return redirect()->back();
  }
}
