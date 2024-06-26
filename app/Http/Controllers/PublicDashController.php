<?php

namespace App\Http\Controllers;

use App\Models\announcements;
use App\Models\feedbacks;
use App\Models\livestream_status;
use Illuminate\Http\Request;

class PublicDashController extends Controller
{
    public function index() {
        $announcements = announcements::orderBy('created_at', 'DESC')->where('featured', 0)->get();
        $announcementsFt = announcements::orderBy('created_at', 'DESC')->where('featured', 1)->get();
        $livestream = livestream_status::find(1);
        return view('index', [
            'announcements' => $announcements,
            'announcementsFt' => $announcementsFt,
            'livestream' => $livestream
        ]);
    }

    public function announcement() {
        $announcements = announcements::where('featured', 0)->get();
        $announcementsFt = announcements::where('featured', 1)->get();
        return view('announcement', [
            'announcements' => $announcements,
            'announcementsFt' => $announcementsFt
        ]);
    }

    public function viewAnnouncement($id) {
        $announcement = announcements::find($id);
        return view('publicViewAnnouncement', [
            'announcement' => $announcement
        ]);
    }

    public function sendFeedback(Request $request) {
        $feedback = new feedbacks;
        $feedback->content = $request->content;

        if($feedback->save()) {
            return response()->json([
                'status' => 200,
                'message' => 'success'
            ]);
        }
        else {
            return response()->json([
                'status' => 200,
                'message' => 'error'
            ]);
        }
    }

    public function services() {
        return view('services');
    }

    public function policies() {
        return view('policies');
    }

    public function about() {
        return view('about');
    }

    public function contact() {
        return view('contact');
    }
}
