<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Validator;

class ModelBackendController extends Controller
{

    public function doLogin(Request $request){
        $rule = array(
            'email'    => 'required|email',
            'password' => 'required|alphaNum|min:3'
        );
        return $request->all();
    }

}
