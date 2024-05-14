<?php

namespace App\Http\Controllers;

use App\Models\Residents;
use Illuminate\Http\Request;

class ResidentDashController extends Controller
{
    
    public function index() {
        $resident = Residents::find(session('logged_resident'));
        if(!$resident) {
            return redirect('/');
        }
        return view('Residents.index', [
            'resident' => $resident
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
}
