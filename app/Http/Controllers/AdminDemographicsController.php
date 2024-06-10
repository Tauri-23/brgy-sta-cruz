<?php

namespace App\Http\Controllers;

use App\Models\document_request_brgy_id;
use App\Models\document_requests;
use App\Models\document_types;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminDemographicsController extends Controller
{
    public function index() {
        $documentTypes = document_types::all();
        
                // Current date
        $now = Carbon::now();  

        // Calculate date ranges for different age groups
        $youngAdultMaxAge = $now->copy()->subYears(18)->format('Y-m-d');
        $youngAdultMinAge = $now->copy()->subYears(35)->format('Y-m-d');
        $middleAgeMaxAge = $now->copy()->subYears(36)->format('Y-m-d');
        $middleAgeMinAge = $now->copy()->subYears(60)->format('Y-m-d');
        $elderlyAge = $now->copy()->subYears(61)->format('Y-m-d');

        // Now you can use these date ranges in your queries
        $docReqYoungAdults = document_request_brgy_id::whereHas('residents', function ($query) use ($youngAdultMinAge, $youngAdultMaxAge) {
            $query->whereBetween('bdate', [$youngAdultMinAge, $youngAdultMaxAge]);
        })->count();

        $docReqMiddleAge = document_request_brgy_id::whereHas('residents', function ($query) use ($middleAgeMinAge, $middleAgeMaxAge) {
            $query->whereBetween('bdate', [$middleAgeMinAge, $middleAgeMaxAge]);
        })->count();

        $docReqElderly = document_request_brgy_id::whereHas('residents', function ($query) use ($elderlyAge) {
            $query->where('bdate', '<=', $elderlyAge);
        })->count();

        $docReqYoungAdults2 = document_requests::whereHas('residents', function ($query) use ($youngAdultMinAge, $youngAdultMaxAge) {
            $query->whereBetween('bdate', [$youngAdultMinAge, $youngAdultMaxAge]);
        })->count();

        $docReqMiddleAge2 = document_requests::whereHas('residents', function ($query) use ($middleAgeMinAge, $middleAgeMaxAge) {
            $query->whereBetween('bdate', [$middleAgeMinAge, $middleAgeMaxAge]);
        })->count();

        $docReqElderly2 = document_requests::whereHas('residents', function ($query) use ($elderlyAge) {
            $query->where('bdate', '<=', $elderlyAge);
        })->count();


        $docReqFemaleCount = document_request_brgy_id::whereHas('residents', function ($query) {
            $query->where('gender', 'Female');
        })->count();
        $docReqFemaleCount2 = document_requests::whereHas('residents', function ($query) {
            $query->where('gender', 'Female');
        })->count();

        $docReqMaleCount = document_request_brgy_id::whereHas('residents', function ($query) {
            $query->where('gender', 'Male');
        })->count();
        $docReqMaleCount2 = document_requests::whereHas('residents', function ($query) {
            $query->where('gender', 'Male');
        })->count();

        $totalFemaleReq = $docReqFemaleCount + $docReqFemaleCount2;
        $totalMaleReq = $docReqMaleCount + $docReqMaleCount2;

        $totalYoungReq= $docReqYoungAdults+$docReqYoungAdults2;
        $totalMiddleReq= $docReqMiddleAge+$docReqMiddleAge2;
        $totalElderlyReq=$docReqElderly2+$docReqElderly;

        $brgyIdReqToday = document_request_brgy_id::whereDate('created_at', Carbon::now())->where('status', 'Pending')->count();
        $brgyReqToday = document_requests::whereDate('created_at', Carbon::now())->where('status', 'Pending')->count();

        $brgyIdReqTodayCompleted = document_request_brgy_id::whereDate('updated_at', Carbon::now())->where('status', 'Completed')->count();
        $brgyReqTodayCompleted = document_requests::whereDate('updated_at', Carbon::now())->where('status', 'Completed')->count();

        $brgyIdReqTodayOnP = document_request_brgy_id::whereDate('updated_at', Carbon::now())->where('status', 'On Process')->count();
        $brgyReqTodayOnP = document_requests::whereDate('updated_at', Carbon::now())->where('status', 'On Process')->count();

        $brgyIdReqCompleted = document_request_brgy_id::where('status', 'Completed')->count();
        $brgyReqCompleted= document_requests::where('status', 'Completed')->count();

        $brgyIdReqRejected = document_request_brgy_id::where('status', 'Rejected')->count();
        $brgyReqRejected = document_requests::where('status', 'Rejected')->count();     

        $totalReqToday = $brgyIdReqToday + $brgyReqToday;
        $totalCompToday = $brgyIdReqTodayCompleted+$brgyReqTodayCompleted;
        $totalOnPToday = $brgyIdReqTodayOnP+$brgyReqTodayOnP;
        $totalCompletedReq = $brgyIdReqCompleted + $brgyReqCompleted;
        $totalRejectedReq = $brgyIdReqRejected + $brgyReqRejected;

        $totalDocReqBrgyId = document_request_brgy_id::whereNot('status', 'rejected')->count();
        $totalDocReqBrgyCert = document_requests::whereNot('status', 'rejected')->where('document_type', 2)->count();
        $totalDocReqPermitBuild = document_requests::whereNot('status', 'rejected')->where('document_type', 3)->count();
        $totalDocReqPermitReno = document_requests::whereNot('status', 'rejected')->where('document_type', 4)->count();

        return view('BrgyStaff.Demographics.index', [
            'documentTypes' => $documentTypes,
            'totalDocReqBrgyId' => $totalDocReqBrgyId,
            'totalDocReqBrgyCert' => $totalDocReqBrgyCert,
            'totalDocReqPermitBuild'=> $totalDocReqPermitBuild,
            'totalDocReqPermitReno' => $totalDocReqPermitReno,
            'totalFemaleReq' => $totalFemaleReq,
            'totalMaleReq' => $totalMaleReq,
            'totalReqToday' => $totalReqToday,
            'totalCompletedReq' => $totalCompletedReq,
            'totalRejectedReq' => $totalRejectedReq,
            'totalCompToday' => $totalCompToday,
            'totalOnPToday' => $totalOnPToday,
            'totalYoungReq' => $totalYoungReq,
            'totalMiddleReq' => $totalMiddleReq,
            'totalElderlyReq' => $totalElderlyReq,
        ]);
    }
}
