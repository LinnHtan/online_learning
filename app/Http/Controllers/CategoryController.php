<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    //create page
    public function createPage(){
        return view('admin.category.create');

    }
    //detail page
    public function listPage(){
        $category = Category::get();
        return view('admin.category.list',compact('category'));
    }
    //create category
    public function createCategory(Request $request){
        $this->createCategoryDataValidation($request);
       $data = $this->createCategoryData($request);
       Category::create($data);
        return back()->with(['createSuccess' => 'Category create success...']);
    }
    //delete category
    public function delete($id){
        Category::where('id',$id)->delete();
        return back()->with(['deleteSuccess' => 'Category delete success...']);
    }

    //edit category
    public function editPage($id){
        $category = Category::where('id',$id)->first();
        return view('admin.category.edit',compact('category'));
    }

    //update category
    public function updateCategory($id, Request $request){
        $this->updateCategoryDataValidation($request, $id);
        $data = $this->createCategoryData($request);
        Category::where('id',$id)->update($data);
        return redirect()->route('category#listPage')->with(['UpdateSuccess' => 'Category Update success...']);

    }

    //category create data
    private function createCategoryData($request){
        return [
            'name' => $request->categoryName
        ];
    }

      //category create validation
      private function updateCategoryDataValidation($request, $id){
        $validation = [
            'categoryName' => 'required|unique:categories,name,'.$id
        ];
        Validator::make($request->all(),$validation)->validate();

    }

    //category create validation
    private function createCategoryDataValidation($request){
        $validation = [
            'categoryName' => 'required|min:5'
        ];
        Validator::make($request->all(),$validation)->validate();

    }
}
