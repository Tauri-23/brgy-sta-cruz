<?php

namespace App\Http\Controllers;

use App\Models\announcements;
use Illuminate\Http\Request;

class PublicDashController extends Controller
{
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
