<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{

    // public function topicPage(){
    //     $topic = Topic::select('topics.*','users.name as user_name')
    //     ->leftJoin('users','topics.user_id','users.id')
    //     ->get();
    //     return view('user.discussion.topic',compact('topic'));
    // }
    //
    public function comment($id) {
        $topicData = Topic::where('id', $id)->first();
        $comment = Comment::select('comments.*','users.name as user_name')
        ->leftJoin('users','comments.user_id','users.id')
        ->where('topic_id',$id)
        ->get();
        if (!$topicData) {
        }
        return view('user.discussion.topicData', compact('topicData','comment'));
    }

    public function commentData(Request $request){
        $topicId = $request->input('topicId');
        $this->validationData($request);
        $data = $this->data($request);
        Comment::create($data);
        return back()->with(['success' => 'Comment successful...']);

    }

    private function data($request){
        return [
            'user_id' => $request->user,
            'topic_id' => $request->topicId,
            'body' => $request->comment
        ];
    }

    private function validationData($request){
        $validation = [
            'comment' => 'required'
        ];
        Validator::make($request->all(),$validation)->validate();
    }
}
