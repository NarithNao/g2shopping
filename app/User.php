<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'user_type_id', 'username', 'email', 'password', 'firstname', 'lastname', 'country', 'city', 'address', 'phone', 'newsletter', 'status'
    ];

    public function userType(){
        return $this->belongsTo(UserType::class, 'user_type_id');
    }

    public function createProducts(){
        return $this->hasMany(Product::class, 'user_id');
    }
}
