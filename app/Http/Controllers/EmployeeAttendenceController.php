<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\EmployeeAttendence;
use Illuminate\Http\Request;

class EmployeeAttendenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'employee attendance';
        $attendances = EmployeeAttendence::latest()->get();
        return view('backend.attendance', compact('title', 'attendances'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::get();

        
        return view('backend.employee_attendence.attendence_checkIn', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $attendances = EmployeeAttendence::latest()->get();

        if(!$attendances->employee_id && !$attendances->checkin){
            return view('backend.employee_attendence.attendence_checkIn');
        } else {
            return view('backend.employee_attendence.attendence_checkOut');
        }
        // $this->validate($request,[
        //     'employee' => 'required',
        //     'checkin' => 'required',
        // ]);
        // $settings = new AttendanceSettings();
        // $time = date('H:i');
        // $min_checkin_time = strtotime($settings->checkin_time) + 1800;
        // if($request->checkin){
        //     if($time < $settings->checkin_time){
        //         $status = 'early';
        //     }if($time <= date('H:i',$min_checkin_time)){
        //         $status = 'ontime';
        //     }else{
        //         $status = 'late';
        //     }
        // }
            
        // EmployeeAttendance::create([
        //     'employee_id' => $request->employee,
        //     'checkin' => $request->checkin,
        //     'checkout' => $request->checkout,
        //     'status' => $status,
        // ]);
        // $notification = notify('employee attendance has been created');
        // return back()->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(EmployeeAttendence $employeeAttendence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EmployeeAttendence $employeeAttendence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EmployeeAttendence $employeeAttendence)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EmployeeAttendence $employeeAttendence)
    {
        //
    }

    public function checkin(){
        $employees = Employee::get();
        return view('backend.employee_attendence.attendence_checkOut', compact('employees'));
    }
}
