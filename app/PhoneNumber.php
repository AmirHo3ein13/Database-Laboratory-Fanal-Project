<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property \Carbon\Carbon $created_at
 * @property int $id
 * @property \Carbon\Carbon $updated_at
 * @property mixed $phone_number_status
 * @property mixed $sms
 * @property mixed $calls
 */
class PhoneNumber extends Model
{
    protected $table = 'phone_number';

    public function phone_number_status(){
        return $this->hasOne(PhoneNumberStatus::class);
    }
    public function sms(){
        return $this->hasMany(Sms::class);
    }
    public function calls(){
        return $this->hasMany(Call::class);
    }
}
