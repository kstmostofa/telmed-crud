<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Html\Builder;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $builder)
    {
        if ($request->ajax()) {
            $agents = Agent::all();
            return datatables()->of($agents)
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
            ['data' => 'email', 'name' => 'email', 'title' => 'Email'],
            ['data' => 'phone', 'name' => 'phone', 'title' => 'Phone'],
            ['data' => 'action', 'name' => 'action', 'title' => 'Action', 'orderable' => false, 'searchable' => false],
        ]);

        return view('admin.agent.index', compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.agent.create');
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
        $user->role = 'agent';
        if ($user->save()) {
            $agent = new Agent();
            $agent->user_id = $user->id;
            $agent->name = $request->name;
            $agent->email = $request->email;
            $agent->phone = $request->phone;
            $agent->nid_number = $request->nid_number;
            if ($request->hasFile('photo')) {
                $image = $request->file('photo');
                $image_name = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/agent'), $image_name);
                $agent->image = $image_name;
            }
            $agent->save();
        }
        Toastr::success('Agent Added Successfully', 'Success');
        return redirect()->route('admin.agents.index');
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
