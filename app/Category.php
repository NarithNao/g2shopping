<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'cate_name', 'cate_description', 'cate_image', 'parent_category', 'show_on_homepage', 'include_on_top_menu', 'position', 'status'
    ];

    /*public function users(){
        return $this->hasMany(User::class);
    }*/
}
