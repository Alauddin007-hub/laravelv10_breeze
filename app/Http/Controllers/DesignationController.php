<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Designations";
        $designations = Designation::with('department')->get();

        return view('backend.employee_manage.designation.index',compact('title','designations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::get();
        return view('backend.employee_manage.designation.create',compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'designation'=>'required|max:200',
            'department'=>'required',
        ]);
        Designation::create([
            'name'=>$request->designation,
            'department_id'=>$request->department,
        ]);
        return redirect('designation')->with('success','Designation added successfully!!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Designation $designation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Designation $designation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Designation $designation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Designation $designation)
    {
        //
    }
}
