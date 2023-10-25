<?php

namespace App\Http\Controllers\User;

use App\Models\Payment;
use App\Models\EnrollCourse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AcceptEnrollment;
use App\Models\PaymentAccepted;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserPaymentController extends Controller
{
    //user payment page
    public function userPayment($id){
        // dd($id);
        $course = EnrollCourse::select('enroll_courses.*','courses.image as course_image','popular_courses.image as popular_image','up_coming_courses.image as up_coming_image','free_courses.image as free_image')
        ->leftJoin('courses', 'enroll_courses.course_name', '=', 'courses.name')
        ->leftJoin('popular_courses', 'enroll_courses.course_name', '=', 'popular_courses.name')
        ->leftJoin('up_coming_courses', 'enroll_courses.course_name', '=', 'up_coming_courses.name')
        ->leftJoin('free_courses', 'enroll_courses.course_name', '=', 'free_courses.name')
        ->where('enroll_courses.id',$id)
        ->first();
        $isPaid = PaymentAccepted::where('user_id', Auth::user()->id)
        ->where('course_name', $course->course_name)
        ->first();
        $payment = Payment::get();
        return view('user.payment.payment',compact('course','payment','isPaid'));
    }
    public function sendPayment(Request $request){

        $this->paymentData($request);
        $data = $this->sendData($request);
        unset($data['name']);
        PaymentAccepted::create($data);
        return redirect()->route('myPayment#page')->with(['success' => 'payment success...']);
    }

    private function sendData($request){

        return [
            "user_id" => $request->userId,
            'course_name' => $request->courseName,
            'fee' =>$request->classFee,
            'payment_id' =>$request->payment
        ];
    }

    private function paymentData($request){
        $validation= [
            'payment' => 'required'
        ];
        Validator::make($request->all(),$validation)->validate();
    }
}
