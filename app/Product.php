<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'sku', 'short_description', 'full_description', 'cost', 'price', 'instock', 'instock_min', 'user_id', 'cate_id', 'brand_id'
    ];

}
