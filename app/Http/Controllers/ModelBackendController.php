<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\User;
use App\UserType;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ModelBackendController extends Controller
{

    public function doLogin(Request $request){
        $rule = array(
            'email'    => 'required|email',
            'password' => 'required|alphaNum|min:4'
        );
        $this->validate($request, $rule);
        $user = DB::table('users')->where([
            ['user_type_id', 1],
            ['email', $request->email],
            ['password', $request->password],
            ['status', 1]
        ])->get();
        if(count($user) == 1){
            $resultArray = json_decode(json_encode($user), true);
            $request->session()->put('logged_in', $resultArray);
            return redirect('admin/dashboard');
        }
        echo "<script>alert('Username/Password incorrect'); history.back();</script>";

    }

    public function listUserRole(Request $request, UserType $userType){
        if(!$request->ajax()){
            return redirect('admin/page-not-found');
        }
        return $userType->all();
    }

    public function listUserRoleActive(Request $request, UserType $userType){
        if(!$request->ajax()){
            return redirect('admin/page-not-found');
        }
        return $userType->where('status', 1)->get();
    }

    public function addUserRole(Request $request, UserType $userType){
        $data = array(
            'role' => $request->user_role,
            'description' => $request->description
        );
        $insert = $userType->create($data);
        return json_encode($insert);
    }

    public function searchUserRole($id, Request $request, UserType $userType){
        if(!$request->ajax()){
            return redirect('admin/page-not-found');
        }
        $datas = $userType->findOrFail($id);
        return $datas;
    }

    public function updateUserRole(Request $request, UserType $userType){
        $data = $userType->find($request->user_role_id);
        $data->role = $request->user_role;
        $data->description = $request->description;
        if (intval($request->status) == 1)
            $data->status = 1;
        else
            $data->status = 0;
        $update = $data->save();
        return json_encode($update);
    }

    public function deleteUserRole(Request $request, UserType $userType){
        $data = $userType->find($request->user_role_id);
        $delete = $data->delete();
        return json_encode($delete);
    }

    public function listUser(Request $request, User $user){
        if(!$request->ajax()){
            return redirect('admin/page-not-found');
        }
        return $user->all();
    }

    public function addUser(Request $request, User $user){
        $newsletter = intval($request->newsletter);
        $user_role_id = intval($request->user_role_id);
        if($request->newsletter == null) $newsletter = 0;
        if($request->user_role_id == null) $user_role_id = 2; //set default to guest
        $data = array(
            'user_type_id'  =>  $user_role_id,
            'username'      =>  $request->username,
            'email'         =>  $request->email,
            'password'      =>  $request->password,
            'firstname'     =>  $request->firstname,
            'lastname'      =>  $request->lastname,
            'country'       =>  $request->country,
            'city'          =>  $request->city,
            'address'       =>  $request->address,
            'phone'         =>  $request->phone,
            'newsletter'    =>  $newsletter,
        );
        $insert = $user->create($data);
        return json_encode($insert);
//        return json_encode($data);
    }

    public function searchUser($id,Request $request, User $user){
        if(!$request->ajax()){
            return redirect('admin/page-not-found');
        }
        $data = $user->find($id);
        return $data;
    }

    public function updateUser(Request $request, User $user){
        $data = $user->find($request->user_id);
        $newsletter = intval($request->newsletter);
        $status = intval($request->status);
        $user_role_id = intval($request->user_role_id);
        if($request->newsletter == null) $newsletter = 0;
        if($request->status == null) $status = 0;
        if($request->user_role_id == null) $user_role_id = 2;
        $data->user_type_id = $user_role_id;
        $data->username     = $request->username;
        $data->firstname    = $request->firstname;
        $data->lastname     = $request->lastname;
        $data->country      = $request->country;
        $data->city         = $request->city;
        $data->address      = $request->address;
        $data->phone        = $request->phone;
        $data->newsletter   = $newsletter;
        $data->status       = $status;
        $update = $data->save();
        return json_encode($update);
    }

    public function updateUserInfo(Request $request, User $user){
        $data = $user->find($request->user_id);
        $data->newsletter = intval($request->newsletter);

        if($request->newsletter == null) $data->newsletter = 0;

        $data->username     = $request->username;
        //$data->email        = $request->email;
        $data->firstname    = $request->firstname;
        $data->lastname     = $request->lastname;
        $data->country      = $request->country;
        $data->city         = $request->city;
        $data->address      = $request->address;
        $data->phone        = $request->phone;
        $data->save();

        return back();
    }

    public function listCategory(Category $category){
        return $category->all();
    }

    public function addCategory(Request $request, Category $category){

        $data = array(
            'cate_name'             =>  $request->cate_name,
            'cate_description'      =>  $request->description,
            'cate_image'            =>  $request->cate_image,
            'parent_category'       =>  intval($request->parent_category),
            'show_on_homepage'     =>  intval($request->show_on_homepage),
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

    public function deleteCategory(Request $request, Category $category){
        $cate = $category->find($request->d_cate_id);
        //$cate->cate_image = $cate->cate_image==null?'':$cate->cate_image;
        $image_path = 'images/category/'.$cate->cate_image;
        Storage::disk('public1')->delete($image_path);
        $cate->delete();
        return back();
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

    public function addBrand(Request $request, Brand $brand){
        $data = array(
            'brand_name'             =>  $request->brand_name,
            'brand_description'      =>  $request->brand_description,
            'brand_image'            =>  $request->brand_image,
            'position'              =>  intval($request->position),
        );
        $status = $brand->create($data);
        return json_encode($status);
        //return $data;
    }

    public function addBrandImage(Request $request){
        //$img = $request->file('a_cate_image');
        $path = base_path() . '\public\images\brand';
        if($request->hasFile('a_brand_image')){
            $request->file('a_brand_image')->move($path, $request->file('a_brand_image')->getClientOriginalName());
            return back();
        }
        else
            echo "<script>alert('Upload image failed.'); history.back();</script>";
    }

    public function searchBrand($id, Brand $brand){
        $bran = $brand->find($id);
        $path = 'images/brand/'.$bran->brand_image;
        return response()->json([
            'data' => $bran,
            'image' => asset($path)
        ]);
    }

    public function updateBrand(Request $request, Brand $brand){
        $bran = $brand->find($request->brand_id);

        $bran->brand_name = $request->brand_name;
        $bran->brand_description = $request->brand_description;
        $bran->brand_image = $request->brand_image;
        $bran->position = intval($request->position);
        $bran->status = intval($request->status);

        $status = $bran->save();
        return json_encode($status);
        //return $bran;
    }

    public function updateBrandImage(Request $request){
        $path = base_path() . '\public\images\brand';
        if($request->hasFile('u_brand_image')){
            $request->file('u_brand_image')->move($path, $request->file('u_brand_image')->getClientOriginalName());
            return back();
        }else
            return back();
    }

}
