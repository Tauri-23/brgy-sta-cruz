<?php

use App\Http\Controllers\SigninUpController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

// signin singup
Route::get('/signin', [SigninUpController::class, 'signIn']);
Route::get('/signup', [SigninUpController::class, 'signUp']);

Route::post('/signupPost', [SigninUpController::class, 'signUpPost']);
Route::post('/verifyEmail', [SigninUpController::class, 'validateOtp']);
