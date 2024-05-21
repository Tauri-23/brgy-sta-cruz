<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Residents;
use Illuminate\Http\Request;

class AdminResidentsController extends Controller
{
    public function index() {
        $residents = Residents::all();
        $admin = Admin::find(session('logged_Admin'));

        if(!$admin) {
            redirect('/');
        }
        
        if(session('logged_Admin_Type') == "Announcement Manager" || session('logged_Admin_Type') == "Document Manager") {
            return redirect('/AdminDashboard');
        }

        return view('BrgyStaff.Residents.index', [
            'residents' => $residents
        ]);
    }

    public function viewResidentProfile($id) {
        $resident = Residents::find($id);

        return view('BrgyStaff.Residents.viewResidentProfile', [
            'resident' => $resident
        ]);
    }

    public function deleteResidentPost(Request $request) {
        $resident = Residents::find($request->resId);

        if($resident->delete()) {
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
