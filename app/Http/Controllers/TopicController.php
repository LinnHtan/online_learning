<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TopicController extends Controller
{

    //topic page
    public function topicPage(){
        $topic = Topic::select('topics.*','users.name as user_name')
        ->leftJoin('users','topics.user_id','users.id')
        ->get();
        return view('user.discussion.topic',compact('topic'));
    }
    //topic create
    public function createTopic(Request $request){
        $this->validationData($request);
        $data = $this->topicData($request);
        Topic::create($data);
        return back()->with(['success' => 'Topic create success...']);
    }

    private function topicData($request){
        return [
            'user_id' => $request->user ,
            'title' => $request->title ,
            'content' => $request-> content
        ];
    }

    private function validationData($request){
        $validation = [
            'title' => 'required',
            'content' => 'required'
        ];
        Validator::make($request->all(),$validation)->validate();
    }
}
