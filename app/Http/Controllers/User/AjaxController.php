<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EnrollCourse;

class AjaxController extends Controller
{

    // public function courseEnroll(Request $request){
    //     $data = $this->getEnrollData($request);
    //     EnrollCourse::create($data);
    //     return response()->json($data, 200);
    // }
    // public function getEnrollData($request){
    //     return [
    //         'user_id' => $request->userId,
    //         'course_name' => $request->courseName,
    //         'fee' => $request->courseFee,
    //         'created_at' => Carbon::now()
    //     ];
    // }


    // public function courseEnrollList(){
    //     $enrollment = EnrollCourse::get();

    //     return view('user.course.openCourseList',compact('enrollment'));
    // }


    //course enroll data
    public function courseEnroll(Request $request) {
        $this->allData($request);
    }
    //popular enroll data
    public function popularEnroll(Request $request){
        $this->allData($request);
    }
    //coming enroll data
    public function comingEnroll(Request $request){
        $this->allData($request);
    }
    //free enroll data
    public function freeEnroll(Request $request){
        $this->allDataFree($request);
    }






//private
    private function allData($request){
        $userId = $request->userId;
        $courseName = $request->courseName;
        // Check if the user is already enrolled
        $isEnrolled = $this->checkEnrollment($userId, $courseName);
        if ($isEnrolled) {
            return response()->json(['message' => 'You are already enrolled in this course.'], 400);
            // return back()->with(['message' => 'You already enrolled...']);
        }

        $data = $this->getEnrollData($request);
        EnrollCourse::create($data);
        return response()->json(['message' => 'Enrollment successful' ], 200);
    }

    //private
    private function checkEnrollment($userId, $courseName) {
        $enrollment = EnrollCourse::where('user_id', $userId)->where('course_name', $courseName)->first();
        return $enrollment !== null;
    }
    //private
    private function getEnrollData($request) {
        return [
            'user_id' => $request->userId,
            'course_name' => $request->courseName,
            'fee' => $request->courseFee,
            'created_at' => Carbon::now()
        ];
    }

    //private
    private function allDataFree($request){
        $userId = $request->userId;
        $courseName = $request->courseName;
        // Check if the user is already enrolled
        $isEnrolled = $this->checkEnrollmentFree($userId, $courseName);
        if ($isEnrolled) {
            return response()->json(['message' => 'You are already enrolled in this course.'], 400);
            // return back()->with(['message' => 'You already enrolled...']);
        }

        $data = $this->getEnrollDataFree($request);
        EnrollCourse::create($data);
        return response()->json(['message' => 'Enrollment successful' ], 200);
    }

    //private
    private function checkEnrollmentFree($userId, $courseName) {
        $enrollment = EnrollCourse::where('user_id', $userId)->where('course_name', $courseName)->first();
        return $enrollment !== null;
    }
    //private
    private function getEnrollDataFree($request) {
        return [
            'user_id' => $request->userId,
            'course_name' => $request->courseName,
            'created_at' => Carbon::now()
        ];
    }
}




