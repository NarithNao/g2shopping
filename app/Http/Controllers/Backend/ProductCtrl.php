<?php

namespace App\Http\Controllers\Backend;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ProductCtrl extends Controller
{

    public function listProduct(Request $request, Product $product){
        if(!$request->ajax()){
            return redirect('admin/page-not-found');
        }
        return $product->all();
    }

    public function addProduct(Request $request, Product $product){
        $user_session = Session::get('logged_in');
        $user_id = $user_session[0]['id'];
        $data = array(
            'sku'               =>  $request->sku,
            'short_description' =>  $request->short_description,
            'full_description'  =>  $request->full_description,
            'cost'              =>  doubleval($request->cost),
            'price'             =>  doubleval($request->price),
            'instock'           =>  intval($request->instock),
            'instock_min'       =>  intval($request->instock_min),
            'user_id'           =>  $user_id,
            'cate_id'           =>  intval($request->cate_id),
            'brand_id'          =>  intval($request->brand_id),
        );
        $status = $product->create($data);
        return json_encode($status);
        //return $data;
    }

    public function searchProduct($id, Product $product){
        $pro = $product->find($id);
        return $pro;
    }

}
