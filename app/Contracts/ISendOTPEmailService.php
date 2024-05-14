<?php
namespace App\Contracts;

interface ISendOTPEmailService {
    public function send($mailObject, $email);
}