<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use App\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;

class BackendController extends Controller
{

    public function checkUrl(Request $request, $url){
        if(!$request->session()->has('logged_in')){
            //print_r(Session::get('logged_in'));
            return redirect('admin/login');
        }
        switch($url){
            /* Administration menu */
            case 'administration':
                /*$user_role_datas = UserType::all()->paginate(2);*/
                $user_role_datas = DB::table('user_types')->paginate(5);
                $user_datas =  DB::table('users')->paginate(5);
                return view('backends/administration', compact('user_role_datas', 'user_datas'))
                    ->with('i', ($request->input('page', 1) - 1) * 1)
                ->with('j', ($request->input('page', 1) - 1) * 1);
                break;
            /*  */
            case 'cart':
                return view('backends/cart');
                break;
            case 'category':
                $categories = Category::all();
                return view('backends/category', compact('categories'));
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
            default:
                return view('frontends/404');
        }
    }

}
