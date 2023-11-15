<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    function admin_register(){
        return view('backend.layouts.register');
    }
    function admin_store(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'number' => 'required|min:11|numeric',
            'password' => 'required|min:8',
            'profile' => 'required',
        ]);
        $image = $request->profile;
        $image_name = $request->name.rand(1000,10).'.'.$image->extension();
        Image::make($image)->save(base_path('public/files/profile/' . $image_name));
        Admin::insert([
            'name' => $request->name,
            'profile' => $image_name,
            'email' => $request->email,
            'number' => $request->number,
            'role' => $request->role,
            'password' => bcrypt($request->password),
        ]);
        $credentials =  $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()
                ->route('dashboard')
                ->with('Welcome! Your account has been successfully created!');
        }
    }

    function dashboard(){
        return view('backend.home.home');
    }
}
