<?php

use App\Http\Controllers\SigninUpController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

// signin singup
Route::get('/signin', [SigninUpController::class, 'signIn']);
