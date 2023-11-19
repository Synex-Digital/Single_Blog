<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    function comment(Request $request){
       
        if (Auth::user()) {
            $user_id = Auth::user()->id;
        }
        else{
            $user_id = 0;
        }
        Comment::insert([  
            'user_id' =>$user_id,
            'commenter_name' =>$request->name,
            'blog_id' =>$request->blog_id,
            'parent_comment_id' =>$request->parent_comment_id,
            'comment' =>$request->comment,
            'email' =>$request->email,
            'website' =>$request->website,
            'created_at' =>Carbon::now(),
        ]);
        return back()->with('succ', 'Comment Added...');
    }
}
