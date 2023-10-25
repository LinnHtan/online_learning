<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    //change password page
    public function changePasswordPage(){
        return view('admin.profile.changePassword');
    }

    //change password
    public function changePassword(Request $request){

        $this->changePasswordData($request);

        $currentUserId = Auth::user()->id;
          $user = User::select('password')->where('id',$currentUserId)->first();
          $dbHashValue = $user->password;

          if(Hash::check($request->oldPassword, $dbHashValue)){
            $data = [
                'password' => Hash::make($request-> newPassword)
            ];
            User::where('id',Auth::user()->id)->update($data);

            return back()->with(['changeSuccess' => 'Password change success...']);
          }else{
            return back()->with(['notMatch' => 'The credential do not Match. Try again!']);
          }

    }

    //update account
    public function update($id, Request $request){

        $this->updateDataValidation($request);
       $data = $this->getUserData($request);

        $dbImage = User::select('image')->where('id', $id)->first();
        $dbImage = $dbImage->image;

        if ($request->hasFile('image')) {

            if ($dbImage != null) {

                Storage::delete('public/' . $dbImage);
            }

            $fileName = uniqid() . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public', $fileName);
            $data['image'] = $fileName;
        } else {

            $data['image'] = $dbImage;
        }

        User::where('id', $id)->update($data);
        return back()->with(['updateSuccess' => 'Profile update success...']);
    }

    //detail page
    public function detailPage(){
        return view('admin.profile.detail');
    }
    //edit Page
    public function editPage(){
        return view('admin.profile.edit');
    }
    
    //password validation
    private function changePasswordData($request){
        $validation = [
            'oldPassword' => 'required|min:6',
            'newPassword' => 'required|min:6',
            'confirmationPassword' => 'required|min:6|same:newPassword'
        ];
        Validator::make($request->all(),$validation)->validate();
    }
    //update data
    private function getUserData($request){
        return [
            'name' => $request->name ,
            'email' => $request->email ,
            'phone' => $request->phone ,
            'address' => $request->address ,
            'gender' => $request->gender ,
            'age' => $request->age ,
            'image' => $request->image
        ];
    }

    //update data validation
    private function updateDataValidation($request){
        $validation = [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'age' => 'required',
            'image' => 'mimes:jpg,jpeg,png,webp|file'
        ];
        Validator::make($request->all(),$validation)->validate();
    }











}
