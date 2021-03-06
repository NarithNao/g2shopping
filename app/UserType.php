<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    protected $table = 'user_types';

    protected $fillable = [
        'role', 'description'
    ];

    public function users(){
        return $this->hasMany(User::class, 'user_type_id');
    }
}
