<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Yajra\DataTables\Html\Builder;

class PatientController extends Controller
{
    public function index(Request $request, Builder $builder)
    {
        //datatables
        $appointments = Appointment::where('doctor_id', auth()->user()->doctor->id)->with('patient', 'doctor')->get();

        if ($request->ajax()) {
            return datatables()->of($appointments)
                ->addIndexColumn()
                ->addColumn('action', function ($appointments) {
                    return view('doctor.appointment.action', compact('appointments'));
                })
                ->editColumn('age', function ($appointments) {
                    return $appointments->patient->age . ' Years';
                })
                ->editColumn('blood_group', function ($appointments) {
                    //capitalize all words
                    return ucwords($appointments->patient->blood_group);
                })
                ->editColumn('status', function ($appointments) {
                    if ($appointments->status == 'pending') {
                        return '<span class="badge p-2 badge-warning mb-1">
                                <i class="fa fa-info"></i> ' . ucfirst($appointments->status) . '
                                </span>';
                    }
                    if ($appointments->status == 'accepted') {
                        return '<span class="badge p-2 badge-success mb-1">
                                <i class="fa fa-check"></i> ' . ucfirst($appointments->status) . '
                                </span>';
                    }
                    if ($appointments->status == 'rejected') {
                        return '<span class="badge p-2 badge-danger mb-1">
                                <i class="fa fa-times"></i> ' . ucfirst($appointments->status) . '
                                </span>';
                    }
                })
                ->rawColumns(['action', 'age', 'blood_group', 'status'])
                ->make(true);
        }

        $html = $builder->columns([
            ['data' => 'DT_RowIndex', 'name' => 'DT_RowIndex', 'title' => 'SL', 'orderable' => false, 'searchable' => false],
            ['data' => 'patient.registration_number', 'name' => 'patient.registration_number', 'title' => 'Registration Number'],
            ['data' => 'patient.name', 'name' => 'patient.name', 'title' => 'Patient Name'],
            ['data' => 'patient.phone', 'name' => 'patient.phone', 'title' => 'Patient Phone'],
            ['data' => 'age', 'name' => 'age', 'title' => 'Age'],
            ['data' => 'blood_group', 'name' => 'blood_group', 'title' => 'Blood Group'],
            ['data' => 'status', 'name' => 'status', 'title' => 'Status'],
            ['data' => 'action', 'name' => 'action', 'title' => 'Action', 'orderable' => false, 'searchable' => false],
        ]);

        return view('doctor.appointment.index', compact('html'));
    }

    public function accept($id)
    {
        $appointment = Appointment::find($id);
        $appointment->status = 'accepted';
        $appointment->save();
        Toastr::success('Appointment Accepted', 'Success');
        return view('doctor.appointment.index');
    }

    public function reject($id)
    {
        $appointment = Appointment::find($id);
        $appointment->status = 'rejected';
        $appointment->save();
        Toastr::success('Appointment Rejected', 'Success');
        return view('doctor.appointment.index');
    }

    public function view($id)
    {
        $appointment = Appointment::find($id);
        return view('doctor.appointment.view', compact('appointment'));
    }
}
