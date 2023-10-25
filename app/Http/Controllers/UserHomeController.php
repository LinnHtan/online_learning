<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class UserHomeController extends Controller
{
    //user home page
    public function userHome(){
        return view('user.home');
    }

    //to get message from admin
    public function message(){
        $message = Message::get();
        return view('user.news.list',compact('message'));
    }
}
