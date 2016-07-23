<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
            print_r($userdata);
            //return redirect('admin/dashboard');
        }else{
            echo "<script>alert('Username/Password incorrect'); history.back();</script>";
        }

    }

}
