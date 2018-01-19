<?php

namespace App\Http\Controllers;

use App\PhoneNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class PhoneNumberController extends Controller
{
    public function index(){
        $phone_numbers = \DB::table('phone_number')
            ->join('phone_number_status', 'phone_number.id','=',
                'phone_number_status.phone_number_id')
            ->join('status', 'status.id', '=',
                'phone_number_status.status_id')
            ->leftJoin('sms', 'phone_number.id', '=',
                'sms.phone_number_id')
            ->select('phone_number.*', 'phone_number_status.missed_call',
                'status.name as status', 'sms.time', 'sms.msg')
            ->get();
        return view('phone_number.phone_numbers')->with('data', json_decode($phone_numbers, true));
    }
    public function add(){
        $course = new PhoneNumber;
        $course->phone_number = Input::get('number');
        $course->save();
        return redirect('/phone_number');
    }
}
