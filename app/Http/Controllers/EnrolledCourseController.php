<?php

namespace App\Http\Controllers;

use App\Models\EnrollCourse;
use Illuminate\Http\Request;

class EnrolledCourseController extends Controller
{


    //enrolled page
    public function enrolledList(){
        $list = EnrollCourse::select('enroll_courses.*','courses.image as course_image','popular_courses.image as popular_image','up_coming_courses.image as up_coming_image','free_courses.image as free_image','users.name as user_name')
        ->leftJoin('courses','enroll_courses.course_name','=','courses.name')
        ->leftJoin('popular_courses', 'enroll_courses.course_name', '=', 'popular_courses.name')
        ->leftJoin('up_coming_courses', 'enroll_courses.course_name', '=', 'up_coming_courses.name')
        ->leftJoin('free_courses', 'enroll_courses.course_name', '=', 'free_courses.name')
        ->leftJoin('users','enroll_courses.user_id','users.id')
        ->paginate(4);
        return view('admin.enrolledList.list',compact('list'));
    }

    //status change
    public function statusChange($id, Request $request){
       $data = $this->changeData($request);
       EnrollCourse::where('id',$id)->update($data);
       return back()->with(['success' => 'Change Role Success...']);

    }
    //private change data
    private function changeData($request){
        return [
            'status' => $request->status
        ];
    }
}


