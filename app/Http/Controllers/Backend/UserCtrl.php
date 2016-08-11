<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

use Illuminate\Support\Facades\Session;


class UserCtrl extends Controller
{

    public function listUser(Request $request, User $user){
        if(!$request->ajax()){
            return redirect('admin/page-not-found');
        }
        $user_session = Session::get('logged_in');
        $user_id = $user_session[0]['id'];
        return $user->where('id' , '<>', $user_id)->get();
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

}
