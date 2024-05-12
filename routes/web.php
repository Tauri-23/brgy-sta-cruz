<?php

use App\Http\Controllers\ResidentDashController;
use App\Http\Controllers\ResidentDocumentController;
use App\Http\Controllers\SigninUpController;
use App\Http\Controllers\ViewProfile;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

// signin singup
Route::get('/signout', [SigninUpController::class, 'signout']);
Route::get('/signin', [SigninUpController::class, 'signIn']);
Route::get('/signup', [SigninUpController::class, 'signUp']);

Route::post('/signinPost', [SigninUpController::class, 'signInPost']);
Route::post('/signupPost', [SigninUpController::class, 'signUpPost']);
Route::post('/verifyEmail', [SigninUpController::class, 'validateOtp']);



// Residents
Route::get('/ResidentDashboard', [ResidentDashController::class, 'index']);

// Documents
Route::get('/ResidentDocuments', [ResidentDocumentController::class, 'index']);
Route::get('/RequestDocument/{id}', [ResidentDocumentController::class, 'requestDocument']);
Route::get('/ResidentRequestDocumentPreview/{id}/{type}', [ResidentDocumentController::class, 'reqDocPrev']);
Route::post('/RequestDocumentPost', [ResidentDocumentController::class, 'requestDocumentPost']);

// Resident Profile
Route::get('/ResidentProfile/{id}', [ViewProfile::class, 'residentViewProfile']);
Route::post('/editResidentProfile', [ViewProfile::class, 'residentEditProfilePost']);
