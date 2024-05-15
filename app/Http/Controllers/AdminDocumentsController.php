<?php

namespace App\Http\Controllers;

use App\Contracts\IGenerateIdService;
use App\Models\Admin;
use App\Models\document_for_pickup;
use App\Models\document_for_pickup_brgy_id;
use App\Models\document_rejected;
use App\Models\document_rejected_brgy_id;
use App\Models\document_request_brgy_id;
use App\Models\document_requests;
use App\Models\document_requirements;
use App\Models\document_requirements_brgy_id;
use Illuminate\Http\Request;

class AdminDocumentsController extends Controller
{
    public $generateId;

    public function __construct(IGenerateIdService $generateId) {
        $this->generateId = $generateId;
    }
    public function index() {
        $docReqPending = document_requests::where('status', 'Pending')->get();
        $docReqBrgyIdsPending = document_request_brgy_id::where('status', 'Pending')->get();

        $docReqFP = document_requests::where('status', "For Pickup")->get();
        $docReqBrgyIdsFP = document_request_brgy_id::where('status', "For Pickup")->get();

        $docReqRejected = document_requests::where('status', "Rejected")->get();
        $docReqBrgyIdsRejected = document_request_brgy_id::where('status', "Rejected")->get();

        $docReqCompleted = document_requests::where('status', "Completed")->get();
        $docReqBrgyIdsCompleted = document_request_brgy_id::where('status', "Completed")->get();

        return view('BrgyStaff.Documents.index', [
            'docReqPending' => $docReqPending,
            'docReqBrgyIdsPending' => $docReqBrgyIdsPending,
            'docReqFP' => $docReqFP,
            'docReqBrgyIdsFP' => $docReqBrgyIdsFP,
            'docReqRejected' => $docReqRejected,
            'docReqBrgyIdsRejected' => $docReqBrgyIdsRejected,
            'docReqCompleted' => $docReqCompleted,
            'docReqBrgyIdsCompleted' => $docReqBrgyIdsCompleted,
        ]);
    }

    public function documentPreview($id, $type) {
        $admin = Admin::find(session('logged_Admin'));
        if(!$admin) {
            return redirect('/');
        }

        //brgyId or others
        $document = $type == "brgyId" ? document_request_brgy_id::find($id) : document_requests::find($id);
        $requirements = $type == "brgyId" 
            ? document_requirements_brgy_id::with('document_requests_brgy_ids', 'document_type_requirements')->where('document_request', $id)->get() 
            : document_requirements::with('document_requests', 'document_type_requirements')->where('document_request', $id)->get();
            

        return view('BrgyStaff.Documents.document-preview', [
            'document' => $document,
            'requirements' => $requirements,
            'type' => $type
        ]);
    }


    public function rejectDocumentPost(Request $request) {
        $document = $request->type == "brgyId" ? document_request_brgy_id::find($request->id) : document_requests::find($request->id);

        $document->status = "Rejected";
        $document->reason = $request->reason;

        if($document->save()) {
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

    public function acceptDocumentPost(Request $request) {
        $document = $request->type == "brgyId" ? document_request_brgy_id::find($request->id) : document_requests::find($request->id);

        $document->status = "For Pickup";
        $document->pickup_date = $request->pickupDate;

        if($document->save()) {
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

    public function completeDocumentPost(Request $request) {
        $document = $request->type == "brgyId" ? document_request_brgy_id::find($request->id) : document_requests::find($request->id);

        $document->status = "Completed";

        if($document->save()) {
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
