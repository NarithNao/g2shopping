<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class FrontendController extends Controller
{

    public function checkUrl($url){
        switch($url){
            case 'index':
                return view('frontends/index');
                break;
            case 'checkout':
                return view('frontends/checkout');
                break;
            case 'contact':
                return view('frontends/contact');
                break;
            case 'product':
                return view('frontends/product');
                break;
            case 'details':
                return view('frontends/single');
                break;
            case 'login':
                return view('auth/login');
                break;
            case 'register':
                return view('auth/register');
                break;
            case 'wishlist':
                return view('frontends/wishlist');
                break;
            case 'admin':
                return redirect('admin/login');
                break;
            default:
                return view('frontends/404');
        }
    }

}
