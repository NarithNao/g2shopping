<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Brand;

class BrandCtrl extends Controller
{

    public function addBrand(Request $request, Brand $brand){
        $data = array(
            'brand_name'             =>  $request->brand_name,
            'brand_description'      =>  $request->brand_description,
            'brand_image'            =>  $request->brand_image,
            'position'              =>  intval($request->position),
        );
        $status = $brand->create($data);
        return json_encode($status);
        //return $data;
    }

    public function addBrandImage(Request $request){
        //$img = $request->file('a_cate_image');
        $path = base_path() . '\public\images\brand';
        if($request->hasFile('a_brand_image')){
            $request->file('a_brand_image')->move($path, $request->file('a_brand_image')->getClientOriginalName());
            return back();
        }
        else
            echo "<script>alert('Upload image failed.'); history.back();</script>";
    }

    public function searchBrand($id, Brand $brand){
        $bran = $brand->find($id);
        $path = 'images/brand/'.$bran->brand_image;
        return response()->json([
            'data' => $bran,
            'image' => asset($path)
        ]);
    }

    public function updateBrand(Request $request, Brand $brand){
        $bran = $brand->find($request->brand_id);

        $bran->brand_name = $request->brand_name;
        $bran->brand_description = $request->brand_description;
        $bran->brand_image = $request->brand_image;
        $bran->position = intval($request->position);
        $bran->status = intval($request->status);

        $status = $bran->save();
        return json_encode($status);
        //return $bran;
    }

    public function updateBrandImage(Request $request){
        $path = base_path() . '\public\images\brand';
        if($request->hasFile('u_brand_image')){
            $request->file('u_brand_image')->move($path, $request->file('u_brand_image')->getClientOriginalName());
            return back();
        }else
            return back();
    }

}
