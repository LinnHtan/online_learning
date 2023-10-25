<?php

namespace App\Http\Controllers\User;

use App\Models\Course;
use App\Models\FreeCourse;
use Illuminate\Http\Request;
use App\Models\PopularCourse;
use App\Models\UpComingCourse;
use App\Http\Controllers\Controller;

class UserCourseController extends Controller
{
    //open course page
    public function openCourseList(){
        $course = Course::when(request('searchKey'),function($query){
            $key = request('searchKey');
            $query->orWhere('name', 'like', "%" . $key . "%")
            ->orWhere('fee', 'like', "%" . $key . "%");
        })
        ->paginate(4);
        return view('user.course.openCourseList',compact('course'));
    }

    //coming course page
    public function comingCourseList(){
        $course = UpComingCourse::when(request('searchKey'),function($query){
            $key = request('searchKey');
            $query->orWhere('name', 'like', "%" . $key . "%")
            ->orWhere('fee', 'like', "%" . $key . "%");
        })
        ->paginate(4);
        return view('user.course.upComingCourse',compact('course'));
    }

       //coming course page
       public function popularCourseList(){
        $course = PopularCourse::when(request('searchKey'),function($query){
            $key = request('searchKey');
            $query->orWhere('name', 'like', "%" . $key . "%")
            ->orWhere('fee', 'like', "%" . $key . "%");
        })
        ->paginate(4);
        return view('user.course.popularCourse',compact('course'));
    }

       //coming course page
       public function freeCourseList(){
        $course = FreeCourse::when(request('searchKey'),function($query){
            $key = request('searchKey');
            $query->orWhere('name', 'like', "%" . $key . "%")
            ->orWhere('time', 'like', "%" . $key . "%");
        })
        ->paginate(4);
        return view('user.course.freeCourse',compact('course'));
    }
}
