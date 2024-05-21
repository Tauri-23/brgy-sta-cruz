<?php

namespace App\Http\Controllers;

use App\Contracts\ICheckEmailExistenceService;
use App\Contracts\IGenerateIdService;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminMonitorAdminsController extends Controller
{
    protected $generateId;
    protected $emailExist;

    public function __construct(IGenerateIdService $generateId, ICheckEmailExistenceService $emailExist) {
        $this->generateId = $generateId;
        $this->emailExist = $emailExist;
    }


    public function index() {
        $admins = Admin::whereNot('id', session('logged_Admin'))->get();
        $admin = Admin::find(session('logged_Admin'));

        if(!$admin) {
            redirect('/');
        }
        
        if(session('logged_Admin_Type') == "Announcement Manager" || session('logged_Admin_Type') == "Document Manager") {
            return redirect('/AdminDashboard');
        }

        return view('BrgyStaff.Admins.index', [
            'admins' => $admins
        ]);
    }

    public function addAdmin(Request $request) {

        if($this->emailExist->check($request->email, Admin::class)) {
            return response()->json([
                'status' => 400,
                'message' => 'Email alrady Exist.'
            ]);
        }

        $admin = new Admin;
        $admin->id = $this->generateId->generate(Admin::class, 6);
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = $request->pass;
        $admin->admin_type = $request->adminType;

        if($admin->save()) {
            return response()->json([
                'status' => 200,
                'message' => 'Admin successfully added.'
            ]);
        }
        else {
            return response()->json([
                'status' => 400,
                'message' => 'Something went wrong please try again later.'
            ]);
        }
    }


    public function changeRoleAdmin(Request $request) {
        $admin = Admin::find($request->id);

        $admin->admin_type = $request->newRole;

        if($admin->save()) {
            return response()->json([
                'status' => 200,
                'message' => 'Admin successfully changed role.'
            ]);
        }
        else {
            return response()->json([
                'status' => 400,
                'message' => 'Something went wrong please try again later.'
            ]);
        }
    }


    public function delAdmin(Request $request) {
        $admin = Admin::find($request->id);

        if($admin->delete()) {
            return response()->json([
                'status' => 200,
                'message' => 'Admin successfully changed role.'
            ]);
        }
        else {
            return response()->json([
                'status' => 400,
                'message' => 'Something went wrong please try again later.'
            ]);
        }
    }
}
