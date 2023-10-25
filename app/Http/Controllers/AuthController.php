<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //login page
    public function login (){
        return view('auth.login');
    }

    //register page
    public function register(){
        return view('auth.register');
    }

    //dashboard
    public function dashboard(){
        if(Auth::user()->role == 'admin'){
            return redirect()->route('admin#homePage');
        }else{
            return redirect()->route('user#homePage');
        }
    }
}
