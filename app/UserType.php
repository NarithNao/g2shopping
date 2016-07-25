<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    protected $fillable = [
        'role', 'description'
    ];

    public function users(){
        return $this->hasMany(User::class);
    }
}
