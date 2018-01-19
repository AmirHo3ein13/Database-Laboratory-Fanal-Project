<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $role
 * @property mixed $user
 * @property \Carbon\Carbon $created_at
 * @property int $id
 * @property \Carbon\Carbon $updated_at
 */
class UserRole extends Model
{
    protected $table = 'user_roles';

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function role(){
        return $this->belongsTo(Role::class);
    }
}
