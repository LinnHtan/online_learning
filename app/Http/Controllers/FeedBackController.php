<?php

namespace App\Http\Controllers;

use App\Models\FeedBack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FeedBackController extends Controller
{
    //feedback page
    public function feedbackPage(){
        return view('user.feedback.create');
    }

    public function sendData(Request $request){
        $this->sendPrivateData($request);
        $data = $this->data($request);

        FeedBack::create($data);
        return back()->with(['success' => 'Message send success ...']);
    }

    private function data($request){
        return [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message
        ];
    }

    private function sendPrivateData($request){
        $validation = [
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ];
        Validator::make($request->all(),$validation)->validate();
    }
}
