<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $requests = Category::all();
       return view('backend.category.index', compact('requests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.category.create_category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required',
        ]);
        $categoryimage = $request->category_image;
        $categoryicon = $request->category_icon;
        $image_name = '';
        $icon_name = '';
        if ($categoryimage) {
            $image_name = $request->category_name.rand(1000,10).'.'.$categoryimage->extension();
            Image::make($categoryimage)->save(base_path('public/files/category/' . $image_name));
        }
        if ($categoryicon) {
            $icon_name = $request->category_name.rand(1000,10).'.'.$categoryicon->extension();
            Image::make($categoryicon)->save(base_path('public/files/category/' . $icon_name));
        }
        Category::insert([
            'category_name' =>$request->category_name,
            'category_image' =>$image_name,
            'category_icon' =>$icon_name,
            'seo_title' =>$request->seo_title,
            'seo_description' =>$request->seo_description,
            'seo_tags' =>$request->seo_tags,
            'created_at' =>Carbon::now(),
        ]);
        return back()->with('succ', 'Category Added...');
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
        $request = Category::find($id);
        return view('backend.category.edit_category', compact('request'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $validated = $request->validate([
            'category_name' => 'required',
        ]);
        $old_image = $request->old_image;
        $old_icon = $request->old_icon;
        $old_image_name = base_path('public/files/category/' . $old_image);
        $old_image_icon = base_path('public/files/category/' . $old_icon);
        if ($old_image) {
            unlink($old_image_name);
           
        }
        if ($old_icon) {
            unlink($old_image_icon);
           
        }
       
        $categoryimage = $request->category_image;
        $categoryicon = $request->category_icon;
        
        $image_name = '';
        $icon_name = '';
        if ($categoryimage) {
            $image_name = $request->category_name.rand(1000,10).'.'.$categoryimage->extension();
            Image::make($categoryimage)->save(base_path('public/files/category/' . $image_name));
        }
        if ($categoryicon) {
            $icon_name = $request->category_name.rand(1000,10).'.'.$categoryicon->extension();
            Image::make($categoryicon)->save(base_path('public/files/category/' . $icon_name));
        }
        Category::where('id', $id)->update([
            'category_name' =>$request->category_name,
            'category_image' =>$image_name,
            'category_icon' =>$icon_name,
            'seo_title' =>$request->seo_title,
            'seo_description' =>$request->seo_description,
            'seo_tags' =>$request->seo_tags,
            'created_at' =>Carbon::now(),
        ]);
        return back()->with('succ', 'Category Added...');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        $image = $category->category_image;
        $icon = $category->category_icon;
        $image = base_path('public/files/category/' . $image);
        $icon = base_path('public/files/category/' . $icon);
        unlink($image);
        unlink($icon);
        $category->delete();
        return back();
    }
}
