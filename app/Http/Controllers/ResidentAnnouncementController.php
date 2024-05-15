<?php

namespace App\Http\Controllers;

use App\Models\announcements;
use App\Models\Residents;
use Illuminate\Http\Request;

class ResidentAnnouncementController extends Controller
{
    public function index() {
        $resident = Residents::find(session('logged_resident'));
        $announcements = announcements::where('featured', 0)->get();
        $announcementsFt = announcements::where('featured', 1)->get();
        return view('Residents.Announcement.index', [
            'resident' =>$resident,
            'announcements' => $announcements,
            'announcementsFt' => $announcementsFt
        ]);
    }

    public function view($id) {
        $resident = Residents::find(session('logged_resident'));
        $announcement = announcements::find($id);
        return view('Residents.Announcement.viewAnnouncement', [
            'resident' =>$resident,
            'announcement' => $announcement
        ]);
    }
}
