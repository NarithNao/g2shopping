<?php

namespace App\Http\Controllers;

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

    public function addUserRole(Request $request, UserType $userType){
        $data = array(
            'role' => $request->a_user_role,
            'description' => $request->a_description
        );
        $userType->create($data);
        return back();
    }

    public function searchUserRole($id, Request $request, UserType $userType){
        if(!$request->ajax()){
            return redirect('admin/page-not-found');
        }
        $datas = $userType->find($id);
        return $datas;
    }

    public function updateUserRole(Request $request, UserType $userType){
        /*$res['title'] = null;
        $res['content'] = null;*/
        $data = $userType->find($request->user_role_id);
        $data->role = $request->user_role;
        $data->description = $request->description;
        if (intval($request->status) == 1)
            $data->status = 1;
        else
            $data->status = 0;
        $update = $data->save();
        /*if(!$update){
            $res['title'] = 'Update User Role';
            $res['content'] = 'Update';
        }*/
        return json_encode($update);
    }

    public function deleteUserRole(Request $request, UserType $userType){
        $data = $userType->find($request->d_user_role_id);
        $data->delete();
        return back();
    }

    public function addUser(Request $request, User $user){
        //$user_type = UserType::find();
        $newsletter = intval($request->a_user_newsletter);
        if($request->a_user_user_role == 'Admin'){
            $user_type_id = 1;
        }else{
            $user_type_id = 2;
        }
        if($request->a_user_newsletter == null)
            $newsletter = 0;
        $data = array(
            'user_type_id'  =>  $user_type_id,
            'username'      =>  $request->a_user_username,
            'email'         =>  $request->a_user_email,
            'password'      =>  $request->a_user_pwd,
            'firstname'     =>  $request->a_user_firstname,
            'lastname'      =>  $request->a_user_lastname,
            'country'       =>  $request->a_user_country,
            'city'          =>  $request->a_user_city,
            'address'       =>  $request->a_user_address,
            'phone'         =>  $request->a_user_phone,
            'newsletter'    =>  $newsletter,
        );
        $user->create($data);

        return back();
    }

    public function searchUser($id,Request $request, User $user){
        if(!$request->ajax()){
            return redirect('admin/page-not-found');
        }
        $data = $user->find($id);
        return $data;
    }

    public function updateUser(Request $request, User $user){
        $data = $user->find($request->u_user_id);
        $newsletter = intval($request->u_user_newsletter);
        $status = intval($request->u_user_status);
        if($request->u_user_newsletter == null) $newsletter = 0;
        if($request->u_user_status == null) $status = 0;
        if($request->u_user_user_role == 'Admin')
            $data->user_type_id = 1;
        else
            $data->user_type_id = 2;
        $data->username     = $request->u_user_username;
        //$data->email        = $request->u_user_email;
        $data->firstname    = $request->u_user_firstname;
        $data->lastname     = $request->u_user_lastname;
        $data->country      = $request->u_user_country;
        $data->city         = $request->u_user_city;
        $data->address      = $request->u_user_address;
        $data->phone        = $request->u_user_phone;
        $data->newsletter   = $newsletter;
        $data->status       = $status;
        $data->save();

        return back();
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
        return $cate;
    }

    public function deleteCategory(Request $request, Category $category){
        $cate = $category->find($request->d_cate_id);
        //$cate->cate_image = $cate->cate_image==null?'':$cate->cate_image;
        $image_path = 'images/category/'.$cate->cate_image;
        Storage::disk('public1')->delete($image_path);
        $cate->delete();

        return back();
    }

}
