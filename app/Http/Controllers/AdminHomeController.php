<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    //admin home
    public function adminHome(){
        return view('admin.home');
    }

    public function test(){
        return view('admin.layouts.source');
    }

    public function list(){
        return view('admin.category.list');
    }
}
