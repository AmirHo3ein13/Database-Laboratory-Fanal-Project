<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';

    public function sub_projects(){
        return $this->hasMany(SubProject::class);
    }
    public function lesson(){
        return $this->belongsTo(Lesson::class);
    }
}
