<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use Illuminate\Http\Request;

class RateController extends Controller
{
    public function create($const_id ,$dr_id, $pt_id ,$rate_num) {
      $rate = Rate::where(['consultation_id' => $const_id],[ 'doctor_id' => $dr_id],[ 'patient_id' => $pt_id]);
      if ($rate->count() == 0) {
        Rate::create([
            'patient_id' => $pt_id,
            'doctor_id' => $dr_id,
            'consultation_id' => $const_id,
            'rate_namber' => $rate_num,
        ]);
      return back();
      } else {
        return back()->with(['error_message' => 'you already rated this doctor']);
      }
    }
}
