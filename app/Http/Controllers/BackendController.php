<?php

namespace App\Http\Controllers;

use App\Brand;
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
                return view('backends/user_role');
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
            case 'manufacturer':
                $brands = Brand::all();
                $i = 1;
                return view('backends/brand', compact('brands', 'i'));
                break;
            case 'attribute':

                return view('backends/attribute', compact('attributes', 'i'));
                break;
            case 'page-not-found':
                return view('frontends/404');
                break;
            default:
                return view('frontends/404');
        }
    }

}
