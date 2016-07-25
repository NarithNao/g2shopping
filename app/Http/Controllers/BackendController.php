<?php

namespace App\Http\Controllers;

use App\UserType;
use Illuminate\Http\Request;

use App\Http\Requests;

class BackendController extends Controller
{

    public function checkUrl(Request $request, $url){
        /*if(!$request->session()->has('logged_in')){
            //print_r(Session::get('logged_in'));
            return redirect('admin/login');
        }*/
        switch($url){
            /* Administration menu */
            case 'administration':
                $datas = UserType::all();
                $i = 1;
                return view('backends/administration', compact('datas', 'i'));
                break;
            /*  */
            case 'cart':
                return view('backends/cart');
                break;
            case 'category':
                return view('backends/category');
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
