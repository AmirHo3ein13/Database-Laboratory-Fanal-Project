<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property \Carbon\Carbon $created_at
 * @property int $id
 * @property \Carbon\Carbon $updated_at
 * @property mixed $course
 * @property mixed $projects
 * @property mixed $teacher
 */
class Lesson extends Model
{
    protected $table = 'lessons';

    public function course(){
        return $this->belongsTo(Course::class);
    }
    public function projects(){
        return $this->hasMany(Project::class);
    }
    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }
}
