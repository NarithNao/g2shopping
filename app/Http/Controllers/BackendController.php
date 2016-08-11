<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use Illuminate\Http\Request;
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
            case 'profile':
                return view('backends/profile');
                break;

            /* Start Dashboard menu */
            case 'dashboard':
                return view('backends/index');
                break;
            /* End Dashboard menu */

            /* Start Administration menu */
            case 'user_role':
                return view('backends/user_role');
                break;
            case 'user':
                return view('backends/user');
                break;
            /* End Administration menu */

            /* Start Catalog menu */
            case 'category':
                $categories = Category::all();
                //Storage::disk('public1')->delete('images/category/a1.jpg');
                $i=1;
                return view('backends/category', compact('categories', 'i'));
                break;
            case 'manufacturer':
                $brands = Brand::all();
                $i = 1;
                return view('backends/brand', compact('brands', 'i'));
                break;
            case 'product':
                return view('backends/product');
                break;
            case 'attribute':
                return view('backends/attribute');
                break;
            /* End Catalog menu */

            /* Start Sales menu */
            case 'order':
                return view('backends/order');
                break;
            case 'cart':
                return view('backends/cart');
                break;
            case 'wishlist':
                return view('backends/wishlist');
                break;
            case 'report':
                return view('backends/report');
                break;
            /* End Sales menu */

            // wrong page
            case 'page-not-found':
                return view('frontends/404');
                break;
            default:
                return view('frontends/404');
        }
    }

}
