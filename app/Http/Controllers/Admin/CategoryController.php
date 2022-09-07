<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Section;
use Image;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function categories(){
        Session::put('page','categories');
        $categories = Category::with(['section','parentcategory'])->get()->toArray();
        return view('admin.categories.categories')->with(compact('categories')); 
    }

    public function updateCategoryStatus(Request $request){
        if($request->ajax()){
            $data = $request->all();
            // echo "<pre>"; print_r($data);die;
            if ($data['status']== 'Active') {
                $status = 0;
            }
            else{
                $status = 1;
            }
            Category::where('id',$data['category_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'category_id'=> $data['category_id']]);
        }
    }

    public function deleteCategory($id){
        Category::where('id',$id)->delete();
        $message  = "Category Delete Successfully Done";
        return redirect()->back()->with("success",$message);
    }

    public function add_edit_category(Request $request,$id = null ){
        Session::put('page','categories');
        if($id==''){
            $title = "Add Category";
            $category = new Category();
            $message = "Category Added Successfully";
        }
        else{
            $title = "Edit Category";
            $category = Category::findorFail($id);
            $message = "Category Updated Successfully";
        }
        if($request->isMethod('post')){
            $data = $request->all();

             $rules = [
                'category_name'=>'required|regex:/^[\pL\s\-]+$/u',
                'section_id'=>'required',
                'url'=>'required',
                'category_image'=>'image',
                ];
                $this->validate($request,$rules);

                if($request->hasFile('category_image')){
                $image_temp = $request->file('category_image');
                if($image_temp->isValid()){
                    //Get Image Extension
                    $extension = $image_temp->getClientOriginalExtension();
                    //Generate New Image Name
                    $imageName = rand(111,99999).'.'.$extension;
                    $imagePath = 'admin/images/categories/'.$imageName;
                    Image::make($image_temp)->save($imagePath);
                }
                
            }elseif (!empty($data['current_category_image'])) {
                $imageName = $data['current_category_image'];
            }
            else{
                $imageName = "";
            }

                $category->category_name = $request->category_name;
                $category->section_id = $request->section_id;
                $category->parent_id = $request->parent_id;
                $category->category_image = $imageName;
                $category->category_discount = $request->category_discount;
                $category->description = $request->description;
                $category->url = $request->url;
                $category->meta_title = $request->meta_title;
                $category->meta_description = $request->meta_description;
                $category->meta_keywords = $request->meta_keywords;
                $category->status = 1;
                $category->save();

            return redirect('admin/categories')->with('success',$message);
        }
        $sections = Section::get()->all();
        $categories = Category::get()->all();
        
        return view('admin.categories.add-edit-category')->with(compact('title','category','sections','categories'));
    }
}
