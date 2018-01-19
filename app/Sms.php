<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sms extends Model
{
    protected $table = 'sms';

    public function status(){
        return $this->hasOne(Status::class);
    }
}
