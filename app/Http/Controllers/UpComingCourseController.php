<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\UpComingCourse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UpComingCourseController extends Controller
{
     //create page
     public function createPage(){
        $category = Category::get();
        return view('admin.upcomingCourse.create',compact('category'));
    }

    //create course
    public function createCourse(Request $request){
        $this->courseValidation($request,'create');
        $data = $this->courseData($request);

        if($request->hasFile('image')){
            $fileName = uniqid().$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public',$fileName);
            $data['image'] = $fileName;
        }
        UpComingCourse::create($data);
        return back()->with(['CreateSuccess' => 'Course create success..']);
    }

    //course list page
    public function listPage(){
        $course = UpComingCourse::paginate(3);
        return view('admin.upcomingCourse.list',compact('course'));
    }

    //course detail page
    public function detailPage($id){
        $course = UpComingCourse::select('up_coming_courses.*','categories.name as category_name')
        ->leftJoin('categories','up_coming_courses.category_id','categories.id')
        ->where('up_coming_courses.id', $id)->first();
        return view('admin.upcomingCourse.detail',compact('course'));
    }

    //course delete
    public function delete ($id){
       UpComingCourse::where('id',$id)->delete();
       return back()->with(['deleteSuccess' => 'Course delete success..']);
    }

    //edit page
    public function editPage($id){
        $course = UpComingCourse::where('id', $id)->first();
        $category = Category::get();
        return view('admin.upcomingCourse.edit',compact('course','category'));
    }

    //update
    public function update ($id, Request $request){
        $this->courseValidation($request,'update',$id);
        $data = $this->courseData($request);

        $oldImage = UpComingCourse::where('id',$id)->first();
        $oldImage = $oldImage->image;
        if($request->hasFile('image')){

            if($oldImage != null){
                Storage::delete('public/'.$oldImage);
            }
            $fileName = uniqid().$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public',$fileName);
            $data['image'] = $fileName;
        }else{
            $data['image'] = $oldImage;
        }


        UpComingCourse::where('id',$request->id)->update($data);
        return redirect()->route('upcomingCourse#listPage');
    }


    //create courseData
    private function courseData($request){
        return [
            'name' => $request->name  ,
            'description' => $request->description ,
            'image' => $request->image  ,
            'category_id' => $request->categoryName  ,
            'time' => $request->classDuration  ,
            'fee' => $request->classFee
        ];
    }

    //create course validation
    private function courseValidation($request,$status){
        $validation = [
            'name' => 'required|unique:up_coming_courses,name,'.$request->id ,
            'description' => 'required',
            'categoryName' => 'required',
            'classDuration' => 'required',
            'classFee' => 'required'
        ];
        $validation['image'] = $status == "create" ? 'required|mimes:jpg,jpeg,png,webp|file' : 'mimes:jpg,jpeg,png,webp|file';
        Validator::make($request->all(),$validation)->validate();
    }

}
