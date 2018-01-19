<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    public function enters_exits(){
        return $this->hasMany(EnterExit::class);
    }
    public function calls(){
        return $this->hasMany(Call::class);
    }
    public function sub_projects(){
        return $this->hasMany(SubProject::class);
    }
    public function rewards_penalties(){
        return $this->hasMany(RewardPenalty::class);
    }
    public function role(){
        return $this->hasOne(UserRole::class);
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
