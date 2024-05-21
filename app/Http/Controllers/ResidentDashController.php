<?php

namespace App\Http\Controllers;

use App\Models\announcements;
use App\Models\livestream_status;
use App\Models\Residents;
use Illuminate\Http\Request;

class ResidentDashController extends Controller
{
    
    public function index() {
        $resident = Residents::find(session('logged_resident'));
        $announcements = announcements::orderBy('created_at', 'DESC')->where('featured', 0)->get();
        $announcementsFt = announcements::orderBy('created_at', 'DESC')->where('featured', 1)->get();
        $livestream = livestream_status::find(1);
        if(!$resident) {
            return redirect('/');
        }
        return view('Residents.index', [
            'resident' => $resident,
            'announcements' => $announcements,
            'announcementsFt' => $announcementsFt,
            'livestream' => $livestream
        ]);
    }

    public function about() {
        $resident = Residents::find(session('logged_resident'));
        if(!$resident) {
            return redirect('/');
        }
        return view('Residents.About.index', [
            'resident' => $resident
        ]);
    }

    public function policies() {
        $resident = Residents::find(session('logged_resident'));
        if(!$resident) {
            return redirect('/');
        }
        return view('Residents.Policies.index', [
            'resident' => $resident
        ]);
    }

    public function services() {
        $resident = Residents::find(session('logged_resident'));
        if(!$resident) {
            return redirect('/');
        }
        return view('Residents.Services.index', [
            'resident' => $resident
        ]);
    }

    public function contact() {
        $resident = Residents::find(session('logged_resident'));
        if(!$resident) {
            return redirect('/');
        }
        return view('Residents.Contacts.index', [
            'resident' => $resident
        ]);
    }
    
}
