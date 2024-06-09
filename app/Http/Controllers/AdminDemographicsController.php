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

        $brgyIdReqToday = document_request_brgy_id::whereDate('created_at', Carbon::now())->where('status', 'Pending')->count();
        $brgyReqToday = document_requests::whereDate('created_at', Carbon::now())->where('status', 'Pending')->count();

        $brgyIdReqToday = document_request_brgy_id::whereDate('created_at', Carbon::now())->where('status', 'Pending')->count();
        $brgyReqToday = document_requests::whereDate('created_at', Carbon::now())->where('status', 'Pending')->count();

        $totalReqToday = $brgyIdReqToday + $brgyReqToday;

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
        ]);
    }
}
