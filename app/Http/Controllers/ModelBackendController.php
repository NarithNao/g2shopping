<?php

namespace App\Http\Controllers;

use App\UserType;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class ModelBackendController extends Controller
{

    public function doLogin(Request $request){
        $rule = array(
            'email'    => 'required|email',
            'password' => 'required|alphaNum|min:4'
        );
        //$msg ='';
        $this->validate($request, $rule);
        $userdata = array(
            'email' => $request->email,
            'password' => $request->password
        );
        if(Auth::attempt($userdata)){
            $request->session()->put('logged_in', $userdata);
            /*if($request->session()->has('logged_in')){
                //print_r($userdata);
                //$data = $request->session()->get('logged_in');
                //echo $data['email'];
                return redirect('admin/dashboard');
            }else
                echo 'Seession not set.';*/
            return redirect('admin/dashboard');
        }else{
            echo "<script>alert('Username/Password incorrect'); history.back();</script>";
        }

    }

    public function addUserRole(Request $request, UserType $userType){
        $data = array(
            'role' => $request->a_user_role,
            'description' => $request->a_description
        );
        $userType->create($data);
        return back();
    }

    public function searchUserRole($id, UserType $userType){
        $datas = $userType->find($id);
        return $datas;
    }

    public function updateUserRole(Request $request, UserType $userType){
        $data = $userType->find($request->u_user_role_id);
        $data->role = $request->u_user_role;
        $data->description = $request->u_description;
        if ($request->u_status == 1)
            $data->status = 1;
        else
            $data->status = 0;
        $data->save();
        return back();
    }

    public function deleteUserRole(Request $request, UserType $userType){
        $data = $userType->find($request->d_user_role_id);
        $data->delete();
        return back();
    }

}
