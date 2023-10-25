<?php

namespace App\Http\Controllers\User;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\EnrollCourse;
use Illuminate\Http\Request;
use App\Models\PaymentAccepted;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class EnrollCourseController extends Controller
{
    //enroll course page
    public function enrollList(){
        $currentId = Auth::user()->id;
        $enrollList = EnrollCourse::select('enroll_courses.*','courses.image as course_image','popular_courses.image as popular_image','up_coming_courses.image as up_coming_image','free_courses.image as free_image')
        ->when(request('searchKey'),function($query){
            $key = request('searchKey');
            $query->orWhere('enroll_courses.course_name', 'like', "%" . $key . "%")
            ->orWhere('enroll_courses.fee', 'like', "%" . $key . "%");
        })
        ->leftJoin('courses', 'enroll_courses.course_name', '=', 'courses.name')
        ->leftJoin('popular_courses', 'enroll_courses.course_name', '=', 'popular_courses.name')
        ->leftJoin('up_coming_courses', 'enroll_courses.course_name', '=', 'up_coming_courses.name')
        ->leftJoin('free_courses', 'enroll_courses.course_name', '=', 'free_courses.name')

        ->where('enroll_courses.user_id', $currentId)
        ->paginate(4);
        return view('user.myCourse.enrollCourse',compact('enrollList'));
    }

    //my payment
    public function myPayment(){
        $currentId = Auth::user()->id;
        $payment = EnrollCourse::select('enroll_courses.*','courses.image as course_image','popular_courses.image as popular_image','up_coming_courses.image as up_coming_image','free_courses.image as free_image',
          'courses.description as course_description','popular_courses.description as popular_description','up_coming_courses.description as up_coming_description','free_courses.description as free_description',
          'courses.time as course_time','popular_courses.time as popular_time','up_coming_courses.time as up_coming_time','free_courses.time as free_time'
        )
        ->when(request('searchKey'),function($query){
            $key = request('searchKey');
            $query->orWhere('enroll_courses.course_name', 'like', "%" . $key . "%")
            ->orWhere('enroll_courses.fee', 'like', "%" . $key . "%");
        })
        ->leftJoin('courses', 'enroll_courses.course_name', '=', 'courses.name')
        ->leftJoin('popular_courses', 'enroll_courses.course_name', '=', 'popular_courses.name')
        ->leftJoin('up_coming_courses', 'enroll_courses.course_name', '=', 'up_coming_courses.name')
        ->leftJoin('free_courses', 'enroll_courses.course_name', '=', 'free_courses.name')
        ->where('user_id',$currentId)
        ->where('status',1)
        ->paginate(4);
        return view('user.myCourse.myPayment',compact('payment'));
    }
    //my free class
    public function myFreeClass(){
        $currentId = Auth::user()->id;
        $free = EnrollCourse::select('enroll_courses.*','free_courses.image as free_image','free_courses.description as free_description','free_courses.time as free_time'
        )
        ->leftJoin('free_courses', 'enroll_courses.course_name', '=', 'free_courses.name')
        ->where('user_id',$currentId)
        ->where('status',1)
        ->where('fee',null)
        ->paginate(4);
        return view('user.myCourse.freeClass',compact('free'));
    }




    //my class
    public function myClass(){
        $currentId = Auth::user()->id;
        $payment = PaymentAccepted::select('payment_accepteds.*','courses.image as course_image','popular_courses.image as popular_image','up_coming_courses.image as up_coming_image','free_courses.image as free_image',
          'courses.description as course_description','popular_courses.description as popular_description','up_coming_courses.description as up_coming_description','free_courses.description as free_description',
          'courses.time as course_time','popular_courses.time as popular_time','up_coming_courses.time as up_coming_time','free_courses.time as free_time'
        )
        ->when(request('searchKey'),function($query){
            $key = request('searchKey');
            $query->orWhere('payment_accepteds.course_name', 'like', "%" . $key . "%")
            ->orWhere('payment_accepteds.fee', 'like', "%" . $key . "%");
        })
        ->leftJoin('courses', 'payment_accepteds.course_name', '=', 'courses.name')
        ->leftJoin('popular_courses', 'payment_accepteds.course_name', '=', 'popular_courses.name')
        ->leftJoin('up_coming_courses', 'payment_accepteds.course_name', '=', 'up_coming_courses.name')
        ->leftJoin('free_courses', 'payment_accepteds.course_name', '=', 'free_courses.name')
        ->where('user_id',$currentId)
        ->paginate(4);
        return view('user.myCourse.class',compact('payment'));
    }
    //my class detail
    public function classDetail(){
        $class = Lesson::get();
        return view('user.myCourse.classLesson',compact('class'));
    }
}
