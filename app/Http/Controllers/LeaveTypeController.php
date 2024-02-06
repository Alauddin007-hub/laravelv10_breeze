<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\LeaveType;
use Illuminate\Http\Request;

class LeaveTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Leave Type";
        $leave_types = LeaveType::get();
        return view('backend.employee_manage.leave_type.index',compact('title','leave_types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.employee_manage.leave_type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'type'=>'required|max:255',
            'days'=>'required'
        ]);
        LeaveType::create($request->all());
        return redirect('leavetype')->with('success',"Leave type has been added");
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $leaveType = LeaveType::find($id);
        return view('backend.employee_manage.leave_type.edit',compact('leaveType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LeaveType $leaveType)
    {
        $leave_type = LeaveType::find($request->id);
        $leave_type->update($request->all());
        return redirect('leavetype')->with('success',"Leave type has been updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $leave_type = LeaveType::find($request->id);
        $leave_type->delete();
        return back()->with('success',"Leave Type has been deleted successfully!!");
    }

    
}
