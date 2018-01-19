<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property \Carbon\Carbon $created_at
 * @property int $id
 * @property \Carbon\Carbon $updated_at
 * @property mixed $user
 */
class EnterExit extends Model
{
    protected $table = 'enter_exit';

    public function user(){
        return $this->belongsTo(User::class);
    }
}
