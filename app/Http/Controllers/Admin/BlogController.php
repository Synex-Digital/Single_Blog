<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $requests = Blog::all();
        return view('backend.blog.index', compact('requests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.blog.create_blog', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
        $validated = $request->validate([
            'blog_title' => 'required',
            'seo_title' => 'required',
            'blog_image' => 'required',
            'seo_description' => 'required',
        ]);
        $image = $request->blog_image;
        $image_name = Str::limit($request->blog_title, 10, '.').rand(1000,10).'.'.$image->extension();
        Image::make($image)->save(base_path('public/files/blog/' . $image_name));
        Blog::insert([
            'admin_id' =>Auth::guard('admin')->user()->id,
            'parent_category_id' =>$request->parent_category,
            'category_id' =>$request->category_id,
            'blog_title' =>$request->blog_title,
            'seo_title' =>$request->seo_title,
            'blog_image' =>$image_name,
            'blog_description' =>$request->blog_description,
            'seo_description' =>$request->seo_description,
            'seo_tags' =>$request->seo_tags,
            'created_at' =>Carbon::now(),
        ]);
        return back()->with('succ', 'Blog Added...');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::all();
        $request = Blog::find($id);
        return view('backend.blog.edit_blog', compact('categories', 'request'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'blog_title' => 'required',
            'seo_title' => 'required',
            'seo_description' => 'required',
        ]);
        $old_image = $request->old_image;
        $old_image_name = base_path('public/files/blog/' . $old_image);
        if ($request->blog_image) {
            unlink($old_image_name);
            $image = $request->blog_image;
            $image_name = Str::limit($request->blog_title, 10, '.').rand(1000,10).'.'.$image->extension();
            Image::make($image)->save(base_path('public/files/blog/' . $image_name));
        }
        else{
            $image_name = $old_image;
        }
        Blog::where('id', $id)->update([
            'admin_id' =>Auth::guard('admin')->user()->id,
            'parent_category_id' =>$request->parent_category,
            'category_id' =>$request->category_id,
            'blog_title' =>$request->blog_title,
            'seo_title' =>$request->seo_title,
            'blog_image' =>$image_name,
            'blog_description' =>$request->blog_description,
            'seo_description' =>$request->seo_description,
            'seo_tags' =>$request->seo_tags,
            'created_at' =>Carbon::now(),
        ]);
        return back()->with('succ', 'Blog Added...');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
