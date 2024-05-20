<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\feedbacks;
use Illuminate\Http\Request;

class AdminDashController extends Controller
{
    public function index() {
        $admin = Admin::find(session('logged_Admin'));

        if(!$admin) {
            return redirect('/');
        }

        return view('BrgyStaff.index');
    }

    public function feedbacks() {
        $feedbacks = feedbacks::orderBy('created_at', 'DESC')->get();

        $admin = Admin::find(session('logged_Admin'));

        if(!$admin) {
            return redirect('/');
        }

        return view('BrgyStaff.Feedbacks.index', [
            'feedbacks' => $feedbacks
        ]);
    }

    public function clearFeedbacks() {
        $feedbacks = feedbacks::all();

        foreach ($feedbacks as $feedback) {
            $feedback->delete();
        }

        return response()->json([
            'status' => 200,
            'message' => 'success'
        ]);
    }
}
