<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Hotel;
use Auth;
class CommentController extends Controller
{
	      public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Hotel $hotel,Request $request)
    {
    	//validate comment
    	 $this->validate($request,[
            'comment'=>'required'
             
        ]);
//store comment to the database
    	 $comment= new Comment;
    	 $comment->comment=$request->comment;
    	 $comment->hotel_id=$hotel->id;
    	 $comment->user_id=Auth::user()->id;
    	 $comment->save();

    	 return back(); 

    }
}
