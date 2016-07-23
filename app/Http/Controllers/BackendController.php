<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class BackendController extends Controller
{

    public function checkUrl($url){
        switch($url){
            case 'administration':
                return view('backends/administration');
                break;
            case 'cart':
                return view('backends/cart');
                break;
            case 'category':
                return view('backends/category');
                break;
            case 'customer':
                return view('backends/customer');
                break;
            case 'login':
                return view('backends/login');
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
