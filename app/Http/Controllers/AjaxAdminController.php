<?php

namespace App\Http\Controllers;

use App\Models\EnrollCourse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class AjaxAdminController extends Controller
{
    // //sort with status
    // public function sortAjax(Request $request){



    //     $listAjax = EnrollCourse::select('enroll_courses.*','courses.image as course_image','popular_courses.image as popular_image','up_coming_courses.image as up_coming_image','free_courses.image as free_image','users.name as user_name')
    //             ->leftJoin('courses','enroll_courses.course_name','=','courses.name')
    //             ->leftJoin('popular_courses', 'enroll_courses.course_name', '=', 'popular_courses.name')
    //             ->leftJoin('up_coming_courses', 'enroll_courses.course_name', '=', 'up_coming_courses.name')
    //             ->leftJoin('free_courses', 'enroll_courses.course_name', '=', 'free_courses.name')
    //             ->leftJoin('users','enroll_courses.user_id','users.id');

    //         if($request->status == null){
    //             $listAjax = $listAjax->get();
    //         }else{
    //             $listAjax = $listAjax->where('enroll_courses.status',$request->status)
    //                          ->get();
    //         }

    //             return response()->json($listAjax, 200);

    //     // logger($request);
    // }
}


