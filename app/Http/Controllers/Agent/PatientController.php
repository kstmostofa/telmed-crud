<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Division;
use App\Models\Patient;
use App\Models\Speciality;
use Barryvdh\DomPDF\Facade\Pdf;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Yajra\DataTables\Html\Builder;

class PatientController extends Controller
{
    public function index(Request $request, Builder $builder)
    {
        if ($request->ajax()) {
            $doctors = Patient::where('agent_id', auth()->user()->id)->with('division', 'district', 'upazila')->get();
            return datatables()->of($doctors)
                ->addIndexColumn()
                ->addColumn('action', function ($doctor) {
                    return '<a href="" class="btn btn-sm btn-primary">Edit</a>
                    <a href="" class="btn btn-sm btn-danger">Delete</a>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $html = $builder->columns([
            ['data' => 'DT_RowIndex', 'name' => 'DT_RowIndex', 'title' => 'SL', 'orderable' => false, 'searchable' => false],
            ['data' => 'registration_number', 'name' => 'registration_number', 'title' => 'Registration Number'],
            ['data' => 'name', 'name' => 'name', 'title' => 'Name'],
            ['data' => 'phone', 'name' => 'phone', 'title' => 'Phone'],
            ['data' => 'nid_number', 'name' => 'nid_number', 'title' => 'NID Number'],
            ['data' => 'division.name', 'name' => 'division.name', 'title' => 'Division'],
            ['data' => 'district.name', 'name' => 'district.name', 'title' => 'District'],
            ['data' => 'upazila.name', 'name' => 'upazila.name', 'title' => 'Upazila'],
            ['data' => 'action', 'name' => 'action', 'title' => 'Action', 'orderable' => false, 'searchable' => false],
        ]);

        return view('agent.patient.index', compact('html'));
    }

    public function create()
    {
        $divisions = Division::all();
        $departments = Speciality::all();
        return view('agent.patient.create', compact('divisions', 'departments'));
    }

    public function store(Request $request)
    {
        $patient = new Patient();
        $patient->agent_id = auth()->user()->id;
        $patient->registration_number = 'REG-' . date('Y') . '-' . rand(100000, 999999);
        $patient->name = $request->name;
        $patient->phone = $request->phone;
        $patient->nid_number = $request->nid_number;
        $patient->division_id = $request->division_id;
        $patient->district_id = $request->district_id;
        $patient->upazila_id = $request->upazila_id;
        $patient->symptoms = $request->symptoms;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/patients');
            $image->move($destinationPath, $name);
            $patient->image = $name;
        }
        if ($patient->save()) {
            $appointment = new Appointment();
            $appointment->patient_id = $patient->id;
            $appointment->doctor_id = $request->doctor_id;
            $appointment->date = $request->date;
            $appointment->time = $request->time;
            $appointment->save();
        }
        Toastr::success('Patient created successfully.', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('agent.patients.index')->with('success', 'Patient created successfully.');
    }

    public function show($id)
    {
        $patient = Patient::first();
        return view('agent.patient.show', compact('patient'));
    }

    public function makePdf($id)
    {
        $patient = Patient::find($id);
        $pdf = Pdf::loadView('agent.patient.pdf', compact('patient'));
        return $pdf->download('patient.pdf');
    }
}
