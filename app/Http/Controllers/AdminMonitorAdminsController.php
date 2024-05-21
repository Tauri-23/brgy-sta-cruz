<?php

namespace App\Http\Controllers;

use App\Contracts\IGenerateIdService;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminMonitorAdminsController extends Controller
{
    protected $generateId;

    public function __construct(IGenerateIdService $generateId) {
        $this->generateId = $generateId;
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
        $admin = new Admin;
        $admin->id = $this->generateId->generate(Admin::class, 6);
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = $request->pass;
        $admin->admin_type = $request->adminType;

        
    }
}
