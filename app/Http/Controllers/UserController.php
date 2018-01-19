<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
    public function index(){
        return view('profile.profile')->with('data',\Auth::user());
    }
    public function edit(Request $request){
        $user = \Auth::user();
        $user->name = $request->get('name');
        if ($request->file('avatar')) {
            $user->avatar = $request->file('avatar')->store('avatars');
        }
        $user->email = $request->get('email');
        if ($request->get('password')) {
            $user->password = bcrypt($request->get('password'));
        }
        $user->save();
        return redirect('/profile');
    }
}
