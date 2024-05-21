<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\announcements;
use App\Models\feedbacks;
use App\Models\livestream_status;
use Illuminate\Http\Request;

class AdminDashController extends Controller
{
    public function index() {
        $admin = Admin::find(session('logged_Admin'));
        $announcements = announcements::orderBy('created_at', 'DESC')->where('featured', 0)->get();
        $announcementsFt = announcements::orderBy('created_at', 'DESC')->where('featured', 1)->get();
        $livestream = livestream_status::find(1);

        if(!$admin) {
            return redirect('/');
        }

        return view('BrgyStaff.index', [
            'announcements' => $announcements,
            'announcementsFt' => $announcementsFt,
            'livestream' => $livestream
        ]);
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


    public function startLive(Request $request) {
        $live = livestream_status::find(1);
        $live->link = $request->link;
        $live->is_live = 1;

        if($live->save()) {
            return response()->json([
                'status' => 200,
                'message' => 'Livestream successfully started'
            ]);
        }
        else {
            return response()->json([
                'status' => 400,
                'message' => 'Something went wrong please try again later.'
            ]);
        }
    }

    public function stopLive(Request $request) {
        $live = livestream_status::find(1);

        $live->link = 'null';
        $live->is_live = 0;

        if($live->save()) {
            return response()->json([
                'status' => 200,
                'message' => 'Livestream ended.'
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
