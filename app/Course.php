<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property \Carbon\Carbon $created_at
 * @property int $id
 * @property \Carbon\Carbon $updated_at
 * @property mixed $lessons
 */
class Course extends Model
{
    protected $table = 'courses';

    public function lessons(){
        return $this->hasMany(Lesson::class);
    }
}
