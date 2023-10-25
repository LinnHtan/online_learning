<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
     //create page
     public function createPage(){
        return view('admin.payment.create');

    }
    //detail page
    public function listPage(){
        $payment = Payment::get();
        return view('admin.payment.list',compact('payment'));
    }
    //create category
    public function createPayment(Request $request){
        $this->createPaymentDataValidation($request);
       $data = $this->createPaymentData($request);
       Payment::create($data);
        return back()->with(['createSuccess' => 'Payment create success...']);
    }
    //delete category
    public function delete($id){
        Payment::where('id',$id)->delete();
        return back()->with(['deleteSuccess' => 'Payment delete success...']);
    }

    //edit category
    public function editPage($id){
        $payment = Payment::where('id',$id)->first();
        return view('admin.payment.edit',compact('payment'));
    }

    //update category
    public function updatePayment($id, Request $request){
        $this->updatePaymentDataValidation($request, $id);
        $data = $this->createPaymentData($request);
        Payment::where('id',$id)->update($data);
        return redirect()->route('payment#listPage')->with(['UpdateSuccess' => 'Payment Update success...']);

    }

    //category create data
    private function createPaymentData($request){
        return [
            'name' => $request->paymentName
        ];
    }

      //category create validation
      private function updatePaymentDataValidation($request, $id){
        $validation = [
            'paymentName' => 'required|unique:payment_categories,name,'.$id
        ];
        Validator::make($request->all(),$validation)->validate();

    }

    //category create validation
    private function createPaymentDataValidation($request){
        $validation = [
            'paymentName' => 'required|min:5'
        ];
        Validator::make($request->all(),$validation)->validate();

    }
}
