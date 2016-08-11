<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'sku', 'short_description', 'full_description', 'cost', 'price', 'instock', 'instock_min', 'user_id', 'cate_id', 'brand_id'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'cate_id');
    }

    public function brand(){
        return $this->belongsTo(Brand::class, 'brand_id');
    }



}
