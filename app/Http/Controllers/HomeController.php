<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Speciality;
use App\Models\Consultation;
use App\Models\User;
use App\Models\UserRole;
use App\Models\Role;

class HomeController extends Controller
{
    public function index() {
        if (auth()->user()->role->first()->id == 2) {
            $specialities = Speciality::all();
            return view("patients.PatientHome", [
                "specialities" => $specialities,
            ]);

        } else

         if(auth()->user()->role->first()->id == 3 ) {
            $consultations = Consultation::all();
            return view("doctors.DoctorHome", [
                "consultations" => $consultations,
            ]);


        } else 

            if(auth()->user()->role->first()->id == 1){
            $doctors = user::all();
            return view("Admen.AdmenHome",[
                "doctors"=> $doctors ,
           ]); 
            

        }
    }
}
