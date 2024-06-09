<?php

namespace App\Http\Controllers;

use App\Contracts\IGenerateFilenameService;
use App\Contracts\IGenerateIdService;
use App\Models\document_rejected;
use App\Models\document_rejected_brgy_id;
use App\Models\document_request_brgy_id;
use App\Models\document_requests;
use App\Models\document_requirements;
use App\Models\document_requirements_brgy_id;
use App\Models\document_type_requirements;
use App\Models\document_types;
use App\Models\Residents;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ResidentDocumentController extends Controller
{
    protected $generateFilename;
    protected $generateId;

    public function __construct(IGenerateFilenameService $generateFilename, IGenerateIdService $generateId) {
        $this->generateFilename = $generateFilename;
        $this->generateId = $generateId;
    }

    public function index() {        
        $resident = Residents::find(session('logged_resident'));

        $docReqPending = document_requests::where('resident', $resident->id)
            ->where('status', "Pending")->orderBy('created_at', 'ASC')->get();
        $docReqBrgyIdsPending = document_request_brgy_id::where('resident', $resident->id)
            ->where('status', "Pending")->orderBy('created_at', 'ASC')->get();

        $docReqFP = document_requests::where('resident', $resident->id)
            ->where('status', "On Process")->orderBy('updated_at', 'ASC')->get();
        $docReqBrgyIdsFP = document_request_brgy_id::where('resident', $resident->id)
            ->where('status', "On Process")->orderBy('created_at', 'ASC')->get();

        $docReqRejected = document_requests::where('resident', $resident->id)
            ->where('status', "Rejected")->orderBy('updated_at', 'ASC')->get();
        $docReqBrgyIdsRejected = document_request_brgy_id::where('resident', $resident->id)
            ->where('status', "Rejected")->orderBy('created_at', 'ASC')->get();

        $docReqCompleted = document_requests::where('resident', $resident->id)
            ->where('status', "Completed")->orderBy('updated_at', 'ASC')->get();
        $docReqBrgyIdsCompleted = document_request_brgy_id::where('resident', $resident->id)
            ->where('status', "Completed")->orderBy('created_at', 'ASC')->get();

        if(!$resident) {
            return redirect('/');
        }

        return view('Residents.Documentspage.index', [
            'resident' => $resident,
            'documentTypes' => document_types::all(),

            'docReqPending' => $docReqPending,
            'docReqBrgyIdsPending' => $docReqBrgyIdsPending,

            'docReqFP' => $docReqFP,
            'docReqBrgyIdsFP' => $docReqBrgyIdsFP,

            'docReqRejected' => $docReqRejected,
            'docReqBrgyIdsRejected' => $docReqBrgyIdsRejected,

            'docReqCompleted' => $docReqCompleted,
            'docReqBrgyIdsCompleted' => $docReqBrgyIdsCompleted,

            'document_requirements' => document_type_requirements::with('document_types')->get()
        ]);
    }

    
    public function reqDocPrev($id, $type) {
        $resident = Residents::find(session('logged_resident'));
        if(!$resident) {
            return redirect('/');
        }

        //brgyId or others
        $document = $type == "brgyId" ? document_request_brgy_id::find($id) : document_requests::find($id);
        $requirements = $type == "brgyId"
            ? document_requirements_brgy_id::with('document_requests_brgy_ids', 'document_type_requirements')->where('document_request', $id)->get()
            : document_requirements::with('document_requests', 'document_type_requirements')->where('document_request', $id)->get();
            

        return view('Residents.Documentspage.document-request-preview', [
            'resident' => $resident,
            'document' => $document,
            'requirements' => $requirements,
            'type' => $type
        ]);
    }




    public function requestDocument($id) {
        $resident = Residents::find(session('logged_resident'));
        if(!$resident) {
            return redirect('/');
        }

        return view('Residents.Documentspage.document-form', [
            'resident' => $resident,
            'documentType' => document_types::find($id),
            "document_requirements" => document_type_requirements::where('document_type', $id)->get()
        ]);
    }





    public function requestDocumentPost(Request $request) {
        if($request->documentType == 2) {
            $threeMonthsAgo = Carbon::now()->subMonths(3);

            $isDocumentAlreadyReq = document_request_brgy_id::where('resident', session('logged_resident'))
                ->where('document_type', $request->documentType)
                ->where('created_at', '>=', $threeMonthsAgo)
                ->whereNot('status', 'Rejected')
                ->exists();

            $docRequestTable = new document_request_brgy_id;
            $document_request_id = $this->generateId->generate(document_request_brgy_id::class, 6);

            if($isDocumentAlreadyReq) {
                return response()->json([
                    'status' => 400,
                    'message' => 'You can only request this document every 3 months.'
                ]);
            }
        }
        else {
            $threeMonthsAgo = Carbon::now()->subMonths(3);

            $isDocumentAlreadyReq = document_requests::where('resident', session('logged_resident'))
                ->where('document_type', $request->documentType)
                ->where('created_at', '>=', $threeMonthsAgo)
                ->whereNot('status', 'Rejected')
                ->exists();

            $docRequestTable = new document_requests;
            $document_request_id = $this->generateId->generate(document_requests::class, 6);

            if($isDocumentAlreadyReq) {
                return response()->json([
                    'status' => 400,
                    'message' => 'You can only request this document every 3 months.'
                ]);
            }
        }


        if (!$request->hasFile('requirements')) {
            return response()->json([
                'status' => 401,
                'message' => 'No files uploaded'
            ]);
        }

        // add to document Request Db
        if($request->documentType == 2) {
            $docRequestTable->id = $document_request_id;
            $docRequestTable->resident = session('logged_resident');
            $docRequestTable->document_type = $request->documentType;
            $docRequestTable->name = $request->name;
            $docRequestTable->address = $request->address;
            $docRequestTable->phone = $request->phone;
            $docRequestTable->bdate = $request->bdate;
            $docRequestTable->tin = $request->tin;
            $docRequestTable->sss = $request->sss;
            $docRequestTable->bdate_place = $request->bdatePlace;
            $docRequestTable->blood_type = $request->bloodType;
            $docRequestTable->status = "Pending";
        }
        elseif($request->documentType == 1) {
            $docRequestTable->id = $document_request_id;
            $docRequestTable->resident = session('logged_resident');
            $docRequestTable->document_type = $request->documentType;
            $docRequestTable->name = $request->name;
            $docRequestTable->address = $request->address;
            $docRequestTable->phone = $request->phone;
            $docRequestTable->bdate = $request->bdate;
            $docRequestTable->brgy_clearance_purpose = $request->purpose;
            $docRequestTable->gender = $request->gender;
            $docRequestTable->status = "Pending";
        }
        else {
            $docRequestTable->id = $document_request_id;
            $docRequestTable->resident = session('logged_resident');
            $docRequestTable->document_type = $request->documentType;
            $docRequestTable->name = $request->name;
            $docRequestTable->address = $request->address;
            $docRequestTable->phone = $request->phone;
            $docRequestTable->bdate = $request->bdate;
            $docRequestTable->gender = $request->gender;
            $docRequestTable->status = "Pending";
        }

        $docRequestTable->save();

        $files = $request->file('requirements');
        $fileReqForValues = array_map('intval', $request->input('fileReqFor'));

        foreach($files as $file) {
            if (!$file->isValid()) {
                return response()->json([
                    'status' => 401,
                    'message' => 'Invalid file: ' . $file->getClientOriginalName()
                ]);
            }
        }

        $targetDirectory = 'assets/media/requirements';

        foreach($files as $key => $file) {
            try {
                $newFilename = $this->generateFilename->generate($file, $targetDirectory);

                $file->move(public_path($targetDirectory), $newFilename);

                // add to Db
                if($request->documentType == 2) {
                    $requirementsTable = new document_requirements_brgy_id;

                    $requirementsTable->id = $this->generateId->generate(document_requirements_brgy_id::class, 6);
                    $requirementsTable->document_request = $document_request_id;
                    $requirementsTable->document_requirement_for = $fileReqForValues[$key];
                    $requirementsTable->filename = $newFilename;
                    
                    $requirementsTable->save();
                }
                else {
                    $requirementsTable = new document_requirements;

                    $requirementsTable->id = $this->generateId->generate(document_requirements::class, 6);
                    $requirementsTable->document_request = $document_request_id;
                    $requirementsTable->document_requirement_for = $fileReqForValues[$key];
                    $requirementsTable->filename = $newFilename;
                    
                    $requirementsTable->save();
                }
                

            } catch (\Exception $ex) {
                return response()->json([
                    'status' => 500,
                    'message' => 'Failed to upload file: ' . $ex->getMessage()
                ]);
            }
        }

        return response()->json([
            'status' => 200,
            'message' => 'success'
        ]);
    }
}
