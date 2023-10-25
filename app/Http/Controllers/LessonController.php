<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LessonController extends Controller
{
    //lesson page
    public function lessonPage(){
        return view('admin.lesson.create');
    }

    public function lesson(Request $request){

        $this->dataValidation($request);
        $data = $this->dataImage($request);

        if($request->hasFile('image')){
            $fileName = uniqid().$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public',$fileName);
            $data['image'] = $fileName;
        }
        Lesson::create($data);
        return back();
    }

    public function sample(){
        $sample = Lesson::get();
        return view('admin.lesson.sample',compact('sample'));
    }

    private function dataImage($request){
        return [
            'image' => $request->image,
            'created_at' => Carbon::now()
        ];
    }

    private function dataValidation($request){
        $validation = [
            'image' => 'required',
        ];
        Validator::make($request->all(),$validation)->validate();
    }
}
