<?php

namespace App\Http\Controllers;

use App\Contracts\IGenerateIdService;
use App\Contracts\IGenerateOTPService;
use App\Contracts\ISendOTPEmailService;
use App\Mail\ForgotPassMail;
use App\Mail\ForgotPassOTP;
use App\Mail\SignupOTP;
use App\Mail\WelcomeMail;
use App\Models\Admin;
use App\Models\email_verifications;
use App\Models\Residents;
use App\Models\Verifytoken;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SigninUpController extends Controller
{
    protected $generateId;
    protected $generateOTP;
    protected $sendOTPEmail;

    public function __construct(IGenerateIdService $generateId, ISendOTPEmailService $sendOTPEmail, IGenerateOTPService $generateOTP) {
        $this->generateId = $generateId;
        $this->sendOTPEmail = $sendOTPEmail;
        $this->generateOTP = $generateOTP;
    }

    public function signIn() {
        return view('signinup.index');
    }

    public function signUp() {
        return view('signinup.signup');
    }

    public function signUpPost(Request $request) {
        $isEmailExist = Residents::where('email', $request->email)->first();

        if($isEmailExist) {
            return response()->json([
                'status' => 400,
                'message' => 'Email already exist.'
            ]);
        }

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
                'message' => 'Account created successfully.'
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
        $admin = Admin::where('email', $request->email)->where('password', $request->password)->first();

        if(!$resident) {
            if(!$admin) {
                return response()->json([
                    'status' => 401,
                    'message' => 'credentials doesnt match'
                ]);
            }
            $request->session()->put('logged_Admin', $admin->id);
            $request->session()->put('logged_Admin_Type', $admin->admin_type);
            return response()->json([
                'status' => 202,
                'message' => 'success'
            ]);
        }

        if($resident->is_activated) {//if verified
            $request->session()->put('logged_resident', $resident->id);
            return response()->json([
                'status' => 200,
                'message' => 'success'
            ]);
        }

        $otp = $this->generateOTP->generate(6);
        $this->sendOTPEmail->send(new SignupOTP($otp), $request->email);

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


    public function forgotPass(Request $request) {

        if($request->processType == "sendOTP") {
            $isEmailExist = Residents::where('email', $request->email)->first();

            if(!$isEmailExist) {
                return response()->json([
                    'status' => 400,
                    'message' => "Account with email inputted doesn't exist."
                ]);
            }

            $otp = $this->generateOTP->generate(6);
            $this->sendOTPEmail->send(new ForgotPassOTP($otp), $request->email);

            $verification = new email_verifications;
            $verification->email = $request->email;
            $verification->otp = $otp;

            $verification->save();

            return response()->json([
                'status' => 200,
                'message' => 'OTP has been Sent to your email.'
            ]);
        }
        elseif($request->processType == "verifyOTP") {
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
                if ($timeDifference <= 300) {
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
        elseif($request->processType == "changePassword") {
            $resident = Residents::where('email', $request->email)->first();
            $resident->password = $request->password;
            if($resident->save()) {
                return response()->json([
                    'status' => 200,
                    'message' => 'success'
                ]); 
            }
            else {
                return response()->json([
                    'status' => 400,
                    'message' => 'error'
                ]);
            }
        }
        
    }


    public function signout() {
        auth()->logout();
        session()->flush();
        return redirect('/');
    }
}
