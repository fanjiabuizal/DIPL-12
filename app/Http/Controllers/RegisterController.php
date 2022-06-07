<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\admin;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index(){
        if (Auth::guard('admin')->check()) return redirect('/dashboard');
        return view('auth-register', [
            'title'=> 'Register',
            'active' => 'register'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'email'=>'required|email:dns|unique:admin', //unique:users
            'username'=>'required|min:3|max:255|unique:admin',
            'password'=>'required|min:5|max:255'
        ]);

        $user = new admin();
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/register')->with('Success', 'You have registered succesfully');
    }
}
