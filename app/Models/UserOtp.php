<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Exception;
use Twilio\Rest\Client;

class UserOtp extends Model
{
    use HasFactory;
    protected $fillable = [
        'used_id',
        'otp',
        'expire_at'
    ];

    public function sendSMS($reciverNumber){
        $message = 'Login OTP is'.$this->otp;

        try{
            $sid = env('TWILIO_SID');
            $twilioToken = env('TWILIO_TOKEN');
            $senderNumber = env('TWILIO_PHONE');

            $twilio = new Client($sid,$twilioToken);
            $twilio->messages->create( $reciverNumber,[
                'form' => $senderNumber,
                'body' => $message
            ]);

            info("SMS Sent Succcessfully!");
        }
        catch(\Exception $e){
            info("Error:".$e->getMessage());
        }
    }
}
