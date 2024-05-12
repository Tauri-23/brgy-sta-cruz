<?php

namespace App\Http\Controllers;

use App\Contracts\IGenerateFilenameService;
use App\Contracts\IGenerateIdService;
use App\Models\document_request_brgy_id;
use App\Models\document_requests;
use App\Models\document_requirements;
use App\Models\document_requirements_brgy_id;
use App\Models\document_type_requirements;
use App\Models\document_types;
use App\Models\Residents;
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
        if(!$resident) {
            return redirect('/');
        }

        return view('Residents.Documentspage.index', [
            'resident' => $resident,
            'documentTypes' => document_types::all(),
            'documentsPending' => document_requests::where('resident', $resident->id)
                ->where('status', "Pending")->orderBy('created_at', 'DESC')->get(),
            'documentsRejected' => document_requests::where('resident', $resident->id)
                ->where('status', "Rejected")->orderBy('updated_at', 'DESC')->get(),
            'documentsCompleted' => document_requests::where('resident', $resident->id)
                ->where('status', "Completed")->orderBy('updated_at', 'DESC')->get(),
            'document_requirements' => document_type_requirements::with('document_types')->get()
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
            $docRequestTable = new document_request_brgy_id;
            $document_request_id = $this->generateId->generate(document_request_brgy_id::class, 6);
        }
        else {
            $docRequestTable = new document_requests;
            $document_request_id = $this->generateId->generate(document_requests::class, 6);
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
