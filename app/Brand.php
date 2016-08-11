<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brands';

    protected $fillable = [
        'brand_name', 'brand_description', 'brand_image', 'position'
    ];

    public function products(){
        return $this->hasMany(Product::class, 'brand_id');
    }

}
