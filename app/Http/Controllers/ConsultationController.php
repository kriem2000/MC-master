<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Subscription;
use App\Models\user;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ConsultationController extends Controller
{

    public function patientChat($SP_id, $DR_id) {

        $doctor_name = user::find($DR_id)->full_name;

        $currentConsultation = Consultation::where('speciality_id', $SP_id)
                                            ->where('patient_id' , auth()->user()->id)
                                            ->where('doctor_id' , $DR_id);
        $subscription = Subscription::where('patient_id', auth()->user()->id)->first();

        $subscription_date = Carbon::createFromFormat('Y-m-d H:i:s', $subscription->end_data);
        $current_date = Carbon::createFromFormat('Y-m-d H:i:s', Carbon::now());

        if ($currentConsultation->count() == 0
           && $subscription->consultation_number > 0
           && $subscription_date->gte($current_date)
            ){

        // start the consultation
        $consultation =  Consultation::create([
            "patient_id" => auth()->user()->id,
            "doctor_id" => $DR_id,
            "speciality_id" => $SP_id,

        ]);
            return view('patients.patientChat', [
                'doctor_id' => $DR_id,
                'consultation' => $consultation,
                'doctor_name' => $doctor_name,
                'messages' => $consultation->messages]);


       } else {

        if ($currentConsultation->count() > 0) {
               $currentConsultation = $currentConsultation->first();
                return view('patients.patientChat',  [
                  'doctor_id' => $DR_id,
                    'consultation' => $currentConsultation,
                    'doctor_name'=> $doctor_name,
                   'messages' => $currentConsultation->messages
                ]);

       } else {
                return back()->with('error_message'," انتهت صلاحية الباقة او استنفذت عدد الاسشارات ");
        }}
    }


        public function DoctorChat($Con_id) {
            $Consultation = Consultation::where('id', $Con_id)->first();
            $patient_name=  $Consultation->patient->full_name;

            if($Consultation->is_approved) {
                return view('doctors.DoctorChat',  [
                    'patient_name'=> $patient_name,
                    'messages'=> $Consultation->messages,
                    'consultation' => $Consultation
                ]);
            } else {
                return back()->with(['error' => 'You must approve the consultation first.']);
            }

        }



       public function isapprove($Con_id) {
           $Consultation = Consultation::where('id', $Con_id)->first();
            $Consultation->is_approved = true;
            $Consultation->save();
            $subscription = Subscription::where('patient_id', $Consultation->patient_id)->first();
            $subscription->consultation_number = $subscription->consultation_number - 1;
            $subscription->save();
            return redirect()->back();
            }

       public function close($Con_id) {
         $Consultation = Consultation::where('id', $Con_id)->first();
           $Consultation->close = true;
             $Consultation->save();
             return redirect()->route('home');
              }


       public function consultation() {
        if ( auth()->user()->role->first()->id == 2){
         $consultations = Consultation::where('patient_id' , auth()->user()->id)->get();
            return view('patients.Consultation',  [
              'consultations' => $consultations,]);

            }else

            if (auth()->user()->role->first()->id == 3) {
               $consultations =Consultation::where('doctor_id' , auth()->user()->id)->get();
               return view("doctors.Consultation", [
                   "consultations" => $consultations,
               ]);  }

            }


}
