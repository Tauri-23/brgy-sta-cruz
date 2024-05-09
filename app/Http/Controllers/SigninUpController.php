<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SigninUpController extends Controller
{
    public function signIn() {
        return view('signinup.index');
    }
}
