<?php

namespace App\Http\Controllers;

use App\Contracts\IGenerateIdService;
use Illuminate\Http\Request;

class AdminAnnouncementsController extends Controller
{
    protected $generateId;
    public function __construct(IGenerateIdService $generateId) {
        $this->generateId = $generateId;
    }

    public function index() {
        return view('');
    }
}
