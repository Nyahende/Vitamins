<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\book;
use App\Models\bookReview;
use Auth;

class bookController extends Controller
{
    public function book()
    {

        $book = book::orderBy('id','desc')->get();
        $bookReviews = bookReview::orderBy('id','desc')->get();
        return view('vitamin.book',compact('bookReviews'),['book'=>$book]);
    }

   public function addbook(Request $request)
   {

    $book = new book;
    $book ->name = $request->bookName;
    $book ->author = $request->author;
    $file=$request->file;
    $filename=time().'.'.$file->getClientOriginalName();
    $request->file->move('assets',$filename);
    $book->file=$filename;

    $bookCover=$request->bookCover;
    $filename=time().'.'.$bookCover->getClientOriginalName();
    $request->bookCover->move('assets',$filename);
    $book->bookCover=$filename;

    $preview=$request->preview;
    $filename=time().'.'.$preview->getClientOriginalName();
    $request->preview->move('assets',$filename);
    $book->preview=$filename;

    $query = $book->save();

    return redirect()->back();

   }

   public function BookReview(Request $request)

    {
        $review = new bookReview;
        $review -> book_id = $request->postId;
        $review -> sender_picture = $request->profilePicture;
        $review -> review_body = $request->reviewBody;
        $review -> sender_name = Auth::user()->name;
        
        $query = $review->save();

        return redirect()->back();
    }


    public function BookView(Request $request , $file)
    {
        return response()->file(public_path('assets/',$file));
    }

    public function PreviewView(Request $request , $file)
    {
        return response()->file(public_path('assets/',$file));
    }


    public function search(Request $request)
    {
        $output = '';
       
        $books =book::where('name','Like','%'.$request->search.'%')->
                            orWhere('author','Like','%'.$request->search.'%')
                            ->get();

        foreach($books as $item)
        {
           $output.= 
              
           '
            <tr>

            <td> 
            '.'
            <a href="#'.$item->id.'">'.''. $item->name.'</a> <br>
            '. $item->author.'
            
            '.'</td>
            </tr>';
           

        }

        return response($output);

    }
}
