<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\EditiorPick;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BlogPosition extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $requests = EditiorPick::all();
        return view('backend.Editor_pick.index', compact('requests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $blogs = Blog::all();
        return view('backend.Editor_pick.set_blog_position', compact('blogs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'position' => 'required',
        ]);
        EditiorPick::insert([
            'blog_id' =>$request->blog_id,
            'position' =>$request->position,
            'created_at' =>Carbon::now(),
        ]);
        return back();
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $editor_pick = EditiorPick::find($id);
        $editor_pick->delete();
        return back();
    }
}
