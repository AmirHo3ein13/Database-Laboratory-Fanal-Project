<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property \Carbon\Carbon $created_at
 * @property int $id
 * @property \Carbon\Carbon $updated_at
 * @property mixed $phone_number_status
 */
class Status extends Model
{
    protected $table = 'status';

    public function phone_number_status(){
        return $this->hasMany(PhoneNumberStatus::class);
    }
}
