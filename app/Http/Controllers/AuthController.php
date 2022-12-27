<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function authenticate(Request $request)
    {
       
        $user = User::select()->where('email', $request->email)->get();
        if(sizeof($user)!=0)
        {
            session()->put('id', $user[0]['id']);
            $credentials = $request->only('email','password');
            if (Auth::attempt($credentials)) {
                return redirect()->intended('home');
            } else {
                return view('login')->with(array('success'=>0,'failure' => 1));
            }
        } else {
            return view('login')->with(array('success'=>0,'failure' => 1));
        }
       
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect('/');
    }
}
