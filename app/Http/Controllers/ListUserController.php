<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ListUserController extends Controller
{

    //userlist
    public function userList(){
        $user = User::where('role','user')->get();
        return view('admin.user.list',compact('user'));
    }

    public function userDetail($id){
        $user = User::where('id',$id)->first();
        return view('admin.user.detail',compact('user'));
    }

    public function delete($id){
        User::where('id',$id)->delete();
        return back();
    }



}
