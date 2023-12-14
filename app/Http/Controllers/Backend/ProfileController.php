<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use File;

class ProfileController extends Controller
{
    //

    public function index()
    {
        return view('admin.profile.index');
    }

    public function profileUpdate(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:100'],
            'email' => ['required', 'email', 'unique:users,email,'.Auth::user()->id],
            'image' =>['image', 'max:2048']
        ]);

        $user = Auth::user();

        if ($request->hasFile('image')) {

           if( File::exists(public_path($user->image))){

            File::delete(public_path($user->image));
           }

            $image = $request->image;

            $imageName = rand().'_'.$image->getClientOriginalName();
            $image->move(public_path('uploads'), $imageName);

            $path ="/uploads/".$imageName;

            $user->image = $path;
        }

       

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->back();

    }

    public function updatePassword(Request $request)
    {
        dd($request->all());
    }
}
