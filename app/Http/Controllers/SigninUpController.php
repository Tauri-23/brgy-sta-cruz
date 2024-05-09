<?php

namespace App\Http\Controllers;

use App\Contracts\IGenerateIdService;
use App\Mail\SignupOTP;
use App\Mail\WelcomeMail;
use App\Models\email_verifications;
use App\Models\Residents;
use App\Models\Verifytoken;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SigninUpController extends Controller
{
    protected $generateId;

    public function __construct(IGenerateIdService $generateId) {
        $this->generateId = $generateId;
    }

    public function signIn() {
        return view('signinup.index');
    }

    public function signUp() {
        return view('signinup.signup');
    }

    public function signUpPost(Request $request) {
        $resident = new Residents;
        $resident->id = $this->generateId->generate(Residents::class, 6);
        $resident->firstname = $request->fname;
        $resident->middletname = $request->mname;
        $resident->lastname = $request->lname;

        $resident->email = $request->email;
        $resident->address = $request->address;
        $resident->phone = $request->phone;
        $resident->gender = $request->gender;
        $resident->bdate = $request->bdate;
        $resident->password = $request->password;

        if($resident->save()) {
            return response()->json([
                'status' => 200,
                'message' => 'Success'
            ]);
        }
        else {
            return response()->json([
                'status' => 400,
                'message' => 'Error'
            ]);
        }
    }


    public function signInPost(Request $request) {
        $resident = Residents::where('email', $request->email)->where('password', $request->password)->first();

        if(!$resident) {
            //TODO:: also check for admins table then proceed if admin
            return response()->json([
                'status' => 401,
                'message' => 'credentials doesnt match'
            ]);
        }

        if($resident->is_activated) {//if verified
            $request->session()->put('logged_resident', $resident->id);
            return response()->json([
                'status' => 200,
                'message' => 'success'
            ]);
        }

        $otp = $this->generateOTP();
        $this->sendOTPEmail($request->email, $otp);

        $verification = new email_verifications;
        $verification->email = $request->email;
        $verification->otp = $otp;

        $verification->save();

        return response()->json([
            'status' => 201,
            'message' => 'need verification'
        ]);
    }


    public function validateOtp(Request $request) {
        $resident = Residents::where('email', $request->email)->first();
        $verification = email_verifications::where('otp', $request->otp)->first();

        if(!$verification) {
            return response()->json([
                'status' => 400,
                'message' => 'Wrong OTP'
            ]);
        }
        else {
            $currentTime = Carbon::now();
            $time = $verification->created_at;

            // Calculate the time difference in seconds
            $timeDifference = $currentTime->diffInSeconds($time);

            // Check if the time difference is less than 5 minutes (300 seconds)
            if ($timeDifference <= 300) { // 300 seconds = 5 minutes
                $resident->is_activated = 1;
                $resident->save();

                $request->session()->put('logged_resident', $resident->id);
                return response()->json([
                    'status' => 200,
                    'message' => 'success'
                ]);
            } else {
                return response()->json([
                    'status' => 401,
                    'message' => 'OTP Expired'
                ]);
            }
        
        }
    }


    private function generateOTP($length = 6)
    {
        return str_pad(mt_rand(0, pow(10, $length) - 1), $length, '0', STR_PAD_LEFT);
    }

    private function sendOTPEmail($email, $otp)
    {
        Mail::to($email)->send(new SignupOTP($otp));
    }



    public function signout() {
        auth()->logout();
        session()->flush();
        return redirect('/');
    }
}
