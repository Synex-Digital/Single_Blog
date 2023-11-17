<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index(){
        $categories = Category::all();
        $latest_blog = Blog::latest()->first();
        $recent_blogs = Blog::latest()->take(4)->get();
        return view('frontend.home.home', compact('latest_blog', 'recent_blogs', 'categories'));
    }
}
