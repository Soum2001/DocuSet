<?php

namespace App\Http\Controllers;

use App\Models\User;



use Illuminate\Http\Request;

class HomeController extends Controller
{
    function homePage()
    {
       
        $id = session('id');
        $user =  User::find($id);
        
        return view('home');
    }
}
