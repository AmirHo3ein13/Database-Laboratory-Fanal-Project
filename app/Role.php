<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    public function users(){
        return $this->hasManyThrough(User::class, UserRole::class);
    }
    public function user_role(){
        return $this->hasMany(UserRole::class);
    }
}
