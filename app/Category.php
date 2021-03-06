<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'Categories';

    protected $fillable = [
        'cate_name', 'cate_description', 'cate_image', 'parent_category', 'show_on_homepage', 'include_on_main_menu', 'position'
    ];

    public function hasCategories()
    {
        return $this->hasMany(self::class, 'parent_category', 'id');
    }

    public function hasParent(){
        return $this->hasOne(self::class, 'id', 'parent_category');
    }
}
