<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //change page
    public function changePage(){
        return view('user.profile.changePassword');
    }

    //change
    public function change(Request $request){
        $this->validateData($request);
        $currentId = Auth::user()->id ;
        $user = User::select('password')->where('id',$currentId)->first();
        $dbHashValue = $user->password;

        if(Hash::check($request->oldPassword, $dbHashValue)){
          $data = [
              'password' => Hash::make($request-> newPassword)
          ];
          User::where('id',$currentId)->update($data);

          return back()->with(['changeSuccess' => 'Password change success...']);
        }else{
          return back()->with(['notMatch' => 'The credential do not Match. Try again!']);
        }

    }
    //detail page
    public function detailPage(){
        return view('user.profile.detail');
    }

    //edit page
    public function editPage(){
        return view('user.profile.edit');
    }

    //update data
    public function update($id, Request $request){
        $this->validateUpdateData($request);
        $data = $this->updateData($request);

        $dbImage= User::select('image')->where('id',$id)->first();
        $dbImage= $dbImage->image;

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


    //private update data
    public function updateData($request){
        return [
            'name' => $request->name ,
            'email' => $request-> email,
            'address' => $request-> address,
            'age' => $request->age,
            'phone' => $request-> phone,
            'gender' => $request-> gender,
            'image' => $request-> image
        ];
    }

    //validate updateData
    public function validateUpdateData($request){
        $validation = [
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'image' => 'mimes:jpg,png,jpeg,webp|file'
        ];
        Validator::make($request->all(),$validation)->validate();
    }

    //validate data
    private function validateData ($request){
        $validation = [
            'oldPassword' => 'required|min:6',
            'newPassword' => 'required|min:6',
            'confirmationPassword' => 'required|min:6|same:newPassword'
        ];
        Validator::make($request->all(),$validation)->validate();
    }
}
