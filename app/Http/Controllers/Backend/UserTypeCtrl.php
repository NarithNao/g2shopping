<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\UserType;

class UserTypeCtrl extends Controller
{

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

}
