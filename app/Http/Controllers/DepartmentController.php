<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Departments";
        $departments = Department::get();
        return view('backend.employee_manage.department.index',compact('title','departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.employee_manage.department.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,['name'=>'required|max:100']);

        Department::create($request->all());
        return redirect('department')->with('success',"Department has been added successfully!!.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        //
    }
}
