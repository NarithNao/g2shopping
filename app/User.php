<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'user_type_id', 'username', 'email', 'password', 'firstname', 'lastname', 'country', 'city', 'address', 'phone', 'newsletter', 'status'
    ];

    public function userTypes(){
        return $this->belongsTo(UserType::class);
    }
}
