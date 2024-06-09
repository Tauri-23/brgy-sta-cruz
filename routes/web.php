<?php

use App\Http\Controllers\AdminAnnouncementsController;
use App\Http\Controllers\AdminDashController;
use App\Http\Controllers\AdminDemographicsController;
use App\Http\Controllers\AdminDocumentsController;
use App\Http\Controllers\AdminMonitorAdminsController;
use App\Http\Controllers\AdminResidentsController;
use App\Http\Controllers\PublicDashController;
use App\Http\Controllers\ResidentAnnouncementController;
use App\Http\Controllers\ResidentDashController;
use App\Http\Controllers\ResidentDocumentController;
use App\Http\Controllers\SigninUpController;
use App\Http\Controllers\ViewProfile;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicDashController::class, 'index']);

// Public
// signin singup
Route::get('/signout', [SigninUpController::class, 'signout']);
Route::get('/signin', [SigninUpController::class, 'signIn']);
Route::get('/signup', [SigninUpController::class, 'signUp']);

Route::post('/signinPost', [SigninUpController::class, 'signInPost']);
Route::post('/signupPost', [SigninUpController::class, 'signUpPost']);
Route::post('/verifyEmail', [SigninUpController::class, 'validateOtp']);

// Forgot Pass
Route::post('/forgotPass', [SigninUpController::class, 'forgotPass']);

// public links
Route::get('/announcementsPublic', [PublicDashController::class, 'announcement']);
Route::get('/publicViewAnnouncement/{id}', [PublicDashController::class, 'viewAnnouncement']);
Route::get('/servicesPublic', [PublicDashController::class, 'services']);
Route::get('/policiesPublic', [PublicDashController::class, 'policies']);
Route::get('/aboutPublic', [PublicDashController::class, 'about']);
Route::get('/contactPublic', [PublicDashController::class, 'contact']);
Route::post('/sendFeedback', [PublicDashController::class, 'sendFeedback']);










// Residents
Route::get('/ResidentDashboard', [ResidentDashController::class, 'index']);
Route::get('/policiesResident', [ResidentDashController::class, 'policies']);

// Announcements
Route::get('/ResidentAnnouncement', [ResidentAnnouncementController::class, 'index']);
Route::get('/residentViewAnnouncement/{id}', [ResidentAnnouncementController::class, 'view']);

// Documents
Route::get('/ResidentDocuments', [ResidentDocumentController::class, 'index']);
Route::get('/RequestDocument/{id}', [ResidentDocumentController::class, 'requestDocument']);
Route::get('/ResidentRequestDocumentPreview/{id}/{type}', [ResidentDocumentController::class, 'reqDocPrev']);
Route::post('/RequestDocumentPost', [ResidentDocumentController::class, 'requestDocumentPost']);

// Resident Profile
Route::get('/ResidentProfile/{id}', [ViewProfile::class, 'residentViewProfile']);
Route::post('/editResidentProfile', [ViewProfile::class, 'residentEditProfilePost']);

// Services
Route::get('/ResidentServices', [ResidentDashController::class, 'services']);

// Contacts
Route::get('/ResidentContact', [ResidentDashController::class, 'contact']);

// About Page
Route::get('/ResidentAbout', [ResidentDashController::class, 'about']);









// Admins
Route::get('/AdminDashboard', [AdminDashController::class, 'index']);
Route::post('/startLivestream', [AdminDashController::class, 'startLive']);
Route::post('/stopLivestream', [AdminDashController::class, 'stopLive']);

// Announcements
Route::get('/AdminAnnouncements', [AdminAnnouncementsController::class, 'index']);
Route::get('/addAnnouncement', [AdminAnnouncementsController::class, 'addAnnouncement']);
Route::get('/viewAnnouncement/{id}', [AdminAnnouncementsController::class, 'viewAnnouncement']);
Route::get('/editAnnouncement/{id}', [AdminAnnouncementsController::class, 'editAnnouncement']);
Route::post('/addAnnouncementPost', [AdminAnnouncementsController::class, 'addAnnouncementPost']);
Route::post('/editAnnouncementPost', [AdminAnnouncementsController::class, 'editAnnouncementPost']);
Route::post('/deleteAnnouncementPost', [AdminAnnouncementsController::class, 'deleteAnnouncementPost']);

Route::get('/AdminDemographics', [AdminDemographicsController::class, 'index']);


// Documents
Route::get('/AdminDocuments', [AdminDocumentsController::class, 'index']);
Route::get('/AdminRequestDocumentPreview/{id}/{type}', [AdminDocumentsController::class, 'documentPreview']);
Route::post('/RejectDocumentApplication', [AdminDocumentsController::class, 'rejectDocumentPost']);
Route::post('/ApproveDocumentApplication', [AdminDocumentsController::class, 'acceptDocumentPost']);
Route::post('/CompleteDocumentApplication', [AdminDocumentsController::class, 'completeDocumentPost']);

// Monitor Residents
Route::get('/AdminResidents', [AdminResidentsController::class, 'index']);
Route::get('/AdminViewResidentProfile/{id}', [AdminResidentsController::class, 'viewResidentProfile']);
Route::post('/deleteResidentPost', [AdminResidentsController::class, 'deleteResidentPost']);

// Monitor ADmins
Route::get('/Admins', [AdminMonitorAdminsController::class, 'index']);
Route::post('/addAdmin', [AdminMonitorAdminsController::class, 'addAdmin']);
Route::post('/changeRoleAdmin', [AdminMonitorAdminsController::class, 'changeRoleAdmin']);
Route::post('/delAdmin', [AdminMonitorAdminsController::class, 'delAdmin']);

// Feedbacks
Route::get('/AdminFeedbacks', [AdminDashController::class, 'feedbacks']);
Route::post('/clearFeedbacks', [AdminDashController::class, 'clearFeedbacks']);



//AdminAnnouncements
//AdminDocuments
