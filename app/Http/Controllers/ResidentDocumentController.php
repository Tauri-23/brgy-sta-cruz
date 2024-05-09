<?php

namespace App\Http\Controllers;

use App\Models\Residents;
use Illuminate\Http\Request;

class ResidentDocumentController extends Controller
{
    public function index() {
        $resident = Residents::find(session('logged_resident'));
        if(!$resident) {
            return redirect('/');
        }
        return view('Residents.Documentspage.index', [
            'resident' => $resident
        ]);
    }
}
