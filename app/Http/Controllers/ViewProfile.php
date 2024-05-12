<?php

namespace App\Http\Controllers;

use App\Models\Residents;
use Illuminate\Http\Request;

class ViewProfile extends Controller
{
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

        if($resident->save()) {
            return response()->json([
                'status' => 200,
                'message' => 'success'
            ]);
        }
        else {
            return response()->json([
                'status' => 400,
                'message' => 'failed'
            ]);
        }
    }
}
