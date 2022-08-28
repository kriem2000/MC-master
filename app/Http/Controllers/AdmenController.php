<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use App\Models\Offer;
use App\Models\Speciality;
use App\Models\SpecialityUser;
use App\Models\UserRole;
use App\Models\Consultation;
use Carbon\Carbon;


class admencontroller extends Controller
{

  
    public function isapprove($doctor_id) {
        $doctor = user::where('id', $doctor_id)->first();
         $doctor->is_approved =true;
          $doctor->save();
          return redirect()->route('home')->with(['success_message' => 'تمت الموافقة على الطبيب']);
        }

       public function close($doctor_id) {
            $doctor = user::where('id', $doctor_id)->first();
             $doctor->close =true;
              $doctor->save();
              return redirect()->route('home')->with(['success_message' => 'تم الغاء طلب التوظيف']);
       }  


       public function ApproveDoctor () {
        $doctors = user::all();
        return view("Admen.ApproveDoctorlist",[
           "doctors"=> $doctors ]);
        }

        public function doctor ($doctor_id) {
            $doctor = user::where('id', $doctor_id)->first();
            return view("Admen.Doctorpage",[
               "doctor"=> $doctor ]);
              
            }


            public function PendingConsultations () {
              $consultations = consultation::where('created_at','>',Carbon::now()->addHours(24));
              return view("Admen.Pending Consultations",[
                 "consultations"=> $consultations ]);
              }


         public function CreateSpeciality(Request $request) {           
           $data =$request->validate([
            'name' => "required|string|min:5|max:500|unique:specialities,name",
            'description' => "required|string|min:5|max:500",
           'Speciality_img' => "required|string|min:5|max:500",
        ]);
    
          Speciality::create([
            "name" => $data["name"],
            "description" => $data["description"],
            "Speciality_img"=> $data["Speciality_img"],

        ]);
        return redirect()->back()->with('success_message', "Specialization added");

         }


      public function SpecialityList() {     
               $specialities= Speciality::all();
               return view("Admen.SpecialityList",[
              "specialities"=> $specialities ]);
            }
              

              public function DoctorList($speciality_id) {  
                $speciality_name = Speciality::find($speciality_id)->name;
                $doctors = Speciality::find($speciality_id)->doctors;
                return view('Admen.DoctorList', [
                    'speciality_name' => $speciality_name,
                    'doctors' => $doctors ]);

              }

              public function DeleteDoctor($doctor_id) {
                UserRole::find($doctor_id)->delete();
                SpecialityUser::find($doctor_id)->delete();
                User::find($doctor_id)->delete();
                return redirect()->back()->with('success_message', "Doctor Removed");}


                public function DeleteSpeciality($speciality_id) {  
                  $doctors = Speciality::find($speciality_id)->doctors;
                  if( $doctors->count()==0)
                  {
                  SpecialityUser::find($speciality_id)->delete();
                  Speciality::find($speciality_id)->delete();

                    return redirect()->back()->with('success_message', "Specialization Removed");
          
                  }else{ return back()->with(['error_message' =>' قم بحذف الاطباء اولا '] );
        
                        }

                      }

                    public function UpDateSpeciality($speciality_id) { 
                     $speciality= Speciality::find($speciality_id);
                     return view("Admen.UpDateSpeciality",[
                      "speciality"=> $speciality ]);

                     }
                      public function UpDate(Request $request ,$speciality_id) { 
                        $speciality=Speciality::find($speciality_id)->first();
                        $speciality->name= $request->input('name');
                        $speciality->Speciality_img= $request->input('Speciality_img');
                        $speciality->description=$request->input('description');
                        $speciality->save();
                        return redirect()->back()->with('success_message', "Specialization update");
                    
                    
                    }
                    public function OfferList() { 
                      $Offers= Offer::all();
                      return view("Admen.OfferList",[
                        "Offers"=> $Offers ]);
                    
                    }
                    public function DeleteOffer($offer_id) { 
                      Offer::find($offer_id)->delete();
                      return redirect()->back()->with('success_message', "Offer Removed");
                    
                    }

                    public function UpDataOffer( $offer_id) { 
                      $offer= Offer::find($offer_id);
                      return view("Admen.UpDateOffer",[
                        "offer"=> $offer ]);
                    
                    }

                    public function UpData(Request $request, $offer_id){
                      $offer=Speciality::find($offer_id)->first();
                      $offer->name= $request->input('name');
                      $offer->price= $request->input('price');
                      $offer->consultation_number=$request->input('consultation_number');
                      $offer->save();
                      return redirect()->back()->with('success_message', "offer update");

                    }




                  }