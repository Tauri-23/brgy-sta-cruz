<?php

namespace App\Http\Controllers;

use App\Contracts\IGenerateFilenameService;
use App\Contracts\IGenerateOTPService;
use App\Contracts\ISendOTPEmailService;
use App\Mail\EditEmailOTP;
use App\Models\email_verifications;
use App\Models\Residents;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ViewProfile extends Controller
{
    protected $generateFilename;
    protected $sendOTPEmail;
    protected $generateOTP;

    public function __construct(IGenerateFilenameService $generateFilename, ISendOTPEmailService $sendOTPEmail, IGenerateOTPService $generateOTP) {
        $this->generateFilename = $generateFilename;
        $this->sendOTPEmail = $sendOTPEmail;
        $this->generateOTP = $generateOTP;
    }

    public function residentViewProfile($id) {
        $resident = Residents::find($id);
        return view('Residents.Profile.index', [
            "resident" => $resident
        ]);
    }


    public function residentEditProfilePost(Request $request) {
        $resident = Residents::find($request->residentId);

        if($request->editType == "name") {            
            $resident->firstname = $request->fname;
            $resident->middletname = $request->mname;
            $resident->lastname = $request->lname;
        }
        elseif($request->editType == "pass") {
            $resident->password = $request->password;
        }
        elseif($request->editType == "phone") {
            $resident->phone = $request->phone;
        }
        elseif($request->editType == "address") {
            $resident->address = $request->address;
        }
        elseif($request->editType == "pfp") {
            if(!$request->hasFile('file')) {
                return response()->json([
                    'status' => 401,
                    'message' => 'No file uploaded'
                ]);
            }

            $file = $request->file('file');

            if(!$file->isValid()) {
                return response()->json([
                    'status' => 401,
                    'message' => 'Invalid file'
                ]);
            }

            try {
                $targetDirectory = 'assets/media/pfp';
    
                $newFilename = $this->generateFilename->generate($file, $targetDirectory);
    
                //upload the file to the public directory
                $file->move(public_path($targetDirectory), $newFilename);
    
                $filePath = '/' . $targetDirectory . '/' . $newFilename;

                $resident->pfp = $newFilename;
    
            } catch(\Exception $ex) {
                return response()->json([
                    'status' => 500,
                    'message' =>'Failed to upload file: ' . $ex->getMessage()
                ]);
            }
        }
        elseif($request->editType == "email") {
            $otp = $this->generateOTP->generate(6);
            $this->sendOTPEmail->send(new EditEmailOTP($otp), $request->oldEmail);

            $verification = new email_verifications;
            $verification->email = $request->oldEmail;
            $verification->otp = $otp;

            $verification->save();

            return response()->json([
                'status' => 201,
                'message' => 'waiting'
            ]);
        }
        elseif($request->editType == "emailOTP") {
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

                if($timeDifference <= 300) {
                    $resident->email = $request->email;                    
                }
                else {
                    return response()->json([
                        'status' => 400,
                        'message' => 'OTP Expired'
                    ]);
                }
            }
        }

        if($resident->save()) {
            return response()->json([
                'status' => 200,
                'message' => 'success'
            ]);
        }
        else {
            return response()->json([
                'status' => 400,
                'message' => 'Failed saving changes.'
            ]);
        }
    }
}
