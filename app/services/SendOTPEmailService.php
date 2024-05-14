<?php
namespace App\Services;
use App\Contracts\ISendOTPEmailService;
use Illuminate\Support\Facades\Mail;

class SendOTPEmailService implements ISendOTPEmailService {
    public function send($mailObject, $email) {
        Mail::to($email)->send($mailObject);
    }


}