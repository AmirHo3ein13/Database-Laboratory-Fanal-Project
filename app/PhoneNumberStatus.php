<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $phone_number
 * @property mixed $status
 * @property \Carbon\Carbon $created_at
 * @property int $id
 * @property \Carbon\Carbon $updated_at
 */
class PhoneNumberStatus extends Model
{
    protected $table = 'phone_number_status';

    public function phone_number(){
        return $this->belongsTo(PhoneNumber::class);
    }
    public function status(){
        return $this->belongsTo(Status::class);
    }
}
