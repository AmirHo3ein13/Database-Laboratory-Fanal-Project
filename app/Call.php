<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property int $id
 * @property mixed $phone_number
 * @property mixed $user
 */
class Call extends Model
{
    protected $table = 'calls';

    public function phone_number(){
        return $this->belongsTo(PhoneNumber::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
