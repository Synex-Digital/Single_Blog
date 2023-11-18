<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Newslatter;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    function index(){
        $categories = Category::all();
        $latest_blog = Blog::latest()->first();
        $recent_blogs = Blog::latest()->take(4)->get();
        $subscriber_count = Newslatter::count();
        return view('frontend.home.home', compact('latest_blog', 'recent_blogs', 'categories', 'subscriber_count'));
    }
    

    function blog_details($id){
        $categories = Category::all();
        $blog_detail =  Blog::find($id);
        return view('frontend.blog_details.blog_details', compact('blog_detail', 'categories'));
    }
    function subscribe(Request $request){

        $validated = $request->validate([
            'email' => 'required',
        ]);
        $user = '';
        if (Auth::user()) {
            $user = Auth::user()->id;
        }
        Newslatter::insert([
            'user' =>$user,
            'email' =>$request->email,
            'created_at' =>Carbon::now(),
        ]);
        return back()->with('succ', 'Newslatter Added...');
    }
}
