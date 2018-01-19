<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubProject extends Model
{
    protected $table = 'sub_projects';

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function project(){
        return $this->belongsTo(Project::class);
    }
}
