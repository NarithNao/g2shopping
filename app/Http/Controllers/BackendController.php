<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use App\UserType;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Session;
use App\Http\Requests;
//use Illuminate\Support\Facades\Storage;

class BackendController extends Controller
{

    public function checkUrl(Request $request, $url){
        if(!$request->session()->has('logged_in')){
            //print_r(Session::get('logged_in'));
            return redirect('admin/login');
        }
        switch($url){
            /* Administration menu */
            case 'user_role':
                $user_role_datas = UserType::all();
                $user_datas =  User::all();
                return view('backends/user_role', compact('user_role_datas', 'user_datas'));
                break;
            case 'user':
                return view('backends/user');
                break;
            /*  */
            case 'cart':
                return view('backends/cart');
                break;
            case 'category':
                $categories = Category::all();
                //Storage::disk('public1')->delete('images/category/a1.jpg');
                $i=1;
                return view('backends/category', compact('categories', 'i'));
                break;
            case 'order':
                return view('backends/order');
                break;
            case 'product':
                return view('backends/product');
                break;
            case 'profile':
                return view('backends/profile');
                break;
            case 'report':
                return view('backends/report');
                break;
            case 'dashboard':
                return view('backends/index');
            case 'page-not-found':
                return view('frontends/404');
                break;
            default:
                return view('frontends/404');
        }
    }

}
