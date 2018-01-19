<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RewardPenalty extends Model
{
    protected $table = 'reward_penalty';

    public function user(){
        return $this->hasOne(User::class);
    }
}
