<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Speciality;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Html\Builder;


class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $builder)
    {
        if ($request->ajax()) {
            $doctors = Doctor::with('department')->get();
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
            ['data' => 'name', 'name' => 'name', 'title' => 'Name'],
            ['data' => 'phone', 'name' => 'phone', 'title' => 'Phone'],
            ['data' => 'registration_number', 'name' => 'registration_number', 'title' => 'Registration Number'],
            ['data' => 'nid_number', 'name' => 'nid_number', 'title' => 'NID Number'],
            ['data' => 'department.name', 'name' => 'department.name', 'title' => 'Department'],
            ['data' => 'action', 'name' => 'action', 'title' => 'Action', 'orderable' => false, 'searchable' => false],
        ]);

        return view('admin.doctor.index', compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Speciality::all();
        return view('admin.doctor.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 'doctor';
        if ($user->save()) {
            $doctor = new Doctor();
            $doctor->user_id = $user->id;
            $doctor->name = $request->name;
            $doctor->email = $request->email;
            $doctor->phone = $request->phone;
            $doctor->registration_number = $request->registration_number;
            $doctor->nid_number = $request->nid_number;
            $doctor->department_id = $request->department_id;
            if ($request->hasFile('photo')) {
                $image = $request->file('photo');
                $image_name = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/doctor'), $image_name);
                $doctor->image = $image_name;
            }
            $doctor->save();
        }
        Toastr::success('Doctor Added Successfully', 'Success');
        return redirect()->route('admin.doctors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
