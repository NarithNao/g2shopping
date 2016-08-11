<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryCtrl extends Controller
{

    public function listCategory(Category $category){
        return $category->all();
    }

    public function addCategory(Request $request, Category $category){

        $data = array(
            'cate_name'             =>  $request->cate_name,
            'cate_description'      =>  $request->description,
            'cate_image'            =>  $request->cate_image,
            'parent_category'       =>  intval($request->parent_category),
            'show_on_homepage'      =>  intval($request->show_on_homepage),
            'include_on_main_menu'  =>  intval($request->include_on_main_menu),
            'position'              =>  intval($request->position),
        );
        $user = $category->create($data);
        return $user;
    }

    public function addCategoryImage(Request $request){
        //$img = $request->file('a_cate_image');
        $path = base_path() . '\public\images\category';
        if($request->hasFile('a_cate_image')){
            $request->file('a_cate_image')->move($path, $request->file('a_cate_image')->getClientOriginalName());
            return back();
        }
        else
            echo "<script>alert('Upload image failed.'); history.back();</script>";
    }

    public function searchCategory($id, Category $category){
        $cate = $category->find($id);
        $path = 'images/category/'.$cate->cate_image;
        return response()->json([
            'data' => $cate,
            'image' => asset($path)
        ]);
    }

    public function listCategoryUpdate(Request $request, Category $category){
        return $category->where('id', '<>', $request->cate_id)->get();
    }

    public function updateCategory(Request $request, Category $category){
        $cate = $category->find($request->cate_id);
        $cate->cate_name = $request->cate_name;
        $cate->cate_description = $request->cate_description;
        $cate->cate_image = $request->cate_image;
        $cate->parent_category = intval($request->parent_category);
        $cate->show_on_homepage = intval($request->show_on_homepage);
        $cate->include_on_main_menu = intval($request->include_on_main_menu);
        $cate->position = intval($request->position);
        $cate->status = intval($request->status);
        $status = $cate->save();
        return json_encode($status);
    }

    public function updateCategoryImage(Request $request){
        $path = base_path() . '\public\images\category';
        if($request->hasFile('u_cate_image')){
            $request->file('u_cate_image')->move($path, $request->file('u_cate_image')->getClientOriginalName());
            return back();
        }else
            return back();
    }

}
