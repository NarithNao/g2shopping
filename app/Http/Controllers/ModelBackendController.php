<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

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



}
