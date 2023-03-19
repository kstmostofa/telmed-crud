<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Doctor;
use App\Models\Upazila;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function getDistricts(Request $request)
    {
        $districts = District::where('division_id', $request->division_id)->get();
        return response()->json($districts);
    }

    public function getUpazilas(Request $request)
    {
        $upazilas = Upazila::where('district_id', $request->district_id)->get();
        return response()->json($upazilas);
    }

    public function getDoctors(Request $request)
    {
        $doctors = Doctor::where('department_id', $request->department_id)->get();
        return response()->json($doctors);
    }
}
