<?php

use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SpecialityController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\AdmenController;
use App\Http\Controllers\RateController;
use App\Models\Speciality;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/", function() {
    return view("welcome");
});

//for the patient (signUp , signUp view)
Route::get('/signUp', [UserController::class, 'signUpView'])->name("signUpPatient")->middleware("guest");
Route::post('/createUser', [UserController::class, "createPacient"])->name("createPacient");

//for the doctor
Route::get("/signUpDoctor", [UserController::class, "signUpDoctorView"])->name("signUpDoctor")->middleware("guest");
Route::post('/createDoctor', [UserController::class, "createDoctor"])->name("createDoctor");

//login for the pacient and the doctor (login, login view)
Route::get('/login', function () {
    return view('login');
})->name('signIn')->middleware("guest");

Route::post('login', [UserController::class, "login"])->name('login');

//logout for all the users
Route::get("/logout", [UserController::class, "logout"])->name("logout");

//single speciality page (for pacient only)
Route::get("/speciality/{id}", [SpecialityController::class, 'index'])->name('SingleSpecialityPage')->middleware('auth');

//Search Doctor (for pacient only)
Route::post("/SelectDoctor/{speciality_id}", [SpecialityController::class, 'SearchDoctor'])->name('SelectDoctor')->middleware('auth');

//Patient chat
Route::get("PatientChat/{SP_id}/{DR_id}", [ConsultationController::class, 'patientChat'])
        ->name('patientChat')->middleware('auth');


 //Doctor chat
Route::get("DoctorChat/{Con_id}", [ConsultationController::class, 'DoctorChat'])
->name('DoctorChat')->middleware('auth');


//is approved(Consultation)
Route::get("IsApproved/{Con_id}", [ConsultationController::class, 'isapprove'])->name('IsApproved');

//Close(Consultation)
Route::get("close/{Con_id}", [ConsultationController::class, 'close'])->name('Close');


//is approved(Admen )
Route::get("d\IsApproved/{doctor_id}", [AdmenController::class, 'isapprove'])->name('d\IsApproved');

//Close (Admen)
Route::get("d\Close/{doctor_id}", [AdmenController::class, 'close'])->name('d\Close');

//Approve Dctor List
Route::get("ApproveDoctor", [AdmenController::class, 'ApproveDoctor'])->name('ApproveDoctor');

//Pending Consultations for admen
Route::get("PendingConsultations", [AdmenController::class, 'PendingConsultations'])->name('PendingConsultations');


// Speciality List for Admen
Route::get("SpecialityList", [AdmenController::class, 'SpecialityList'])->name('SpecialityList')->middleware("auth");


//Add Speciality View
Route::get('AddSpeciality', function () {
    return view('Admen.AddSpeciality');
})->name('AddSpeciality')->middleware("auth");


//Create Speciality
Route::post("CreateSpeciality", [AdmenController::class, 'CreateSpeciality'])->name('CreateSpeciality')->middleware("auth");

//UpDate Speciality (view)
Route::get('UpDateSpeciality/{speciality_id}', [AdmenController::class, 'UpDateSpeciality'])->name('UpDateSpeciality')->middleware("auth");


//UpDate Speciality btn
Route::post('UpDate/{speciality_id}', [AdmenController::class, 'UpDate'])->name('UpDate')->middleware("auth");


// Delete Speciality for Admen
Route::get("DeleteSpeciality/{speciality_id}", [AdmenController::class, 'DeleteSpeciality'])->name('DeleteSpeciality')->middleware("auth");


// Doctor List for Admen
Route::get("doctorList/{speciality_id}", [AdmenController::class, 'DoctorList'])->name('DoctorList')->middleware("auth");

//Delete Doctor
Route::get("DeleteDoctor/{doctor_id}", [AdmenController::class, 'DeleteDoctor'])->name('DeleteDoctor')->middleware("auth");

//doctor page
Route::get("DoctorPage/{doctor_id}", [AdmenController::class, 'doctor'])->name('DoctorPage')->middleware("auth");

//OfferList View
Route::get("OfferList", [AdmenController::class, 'OfferList'])->name('OfferList')->middleware("auth");

//Delete Offer
Route::get("DeleteOffer/{offer_id}", [AdmenController::class, 'DeleteOffer'])->name('DeleteOffer');

//UpData Offer view
Route::get("UpDataOfferView/{offer_id}", [AdmenController::class, 'UpDataOffer'])->name('UpDataOfferView');

//UpData Offer btn
Route::post("UpDate/{offer_id}", [AdmenController::class, 'UpDate'])->name('UpDataOffer')->middleware("auth");


//message
Route::post("SendMessage/{Con_id}", [MessageController::class, 'message'])->name('SendMessage')->middleware("auth");


// download file from any consultation messages
Route::get('/{fileName}', [MessageController::class, 'download'])->name('download')->middleware("auth");

//home page
Route::get("mc/home", [HomeController::class, 'index'])->name("home")->middleware("auth");

//Consultation
Route::get("mc/consultation", [ConsultationController::class, 'consultation'])->name("consultation")->middleware("auth");

//rates
Route::get('/rate/{const_id}/{dr_id}/{pt_id}/{rate_num}', [RateController::class, 'create'])->name('rate');
