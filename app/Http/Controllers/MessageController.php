<?php

namespace App\Http\Controllers;

use App\Models\FeedBack;
use Carbon\Carbon;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    //message page
    public function createPage(){
        return view('admin.message.create');
    }

    //message send
    public function send(Request $request){
        $this->messageValidation($request);
        $data = $this->sendData($request);
        Message::create($data);
        return back()->with(['send' => 'Message send success...']);
    }

    //data
    private function sendData($request){
        return [
            'subject' => $request->subject ,
            'message' => $request->message,
            'created_at' => Carbon::now()
        ];
    }

    //feedback controller
    public function feedback(){
        $message = FeedBack::get();
        return view('admin.message.feedBack',compact('message'));
    }

    //validation data
    private function messageValidation($request){
        $validation = [
            'subject' => 'required',
            'message' => 'required'
        ];
        Validator::make($request->all(),$validation)->validate();
    }
}
