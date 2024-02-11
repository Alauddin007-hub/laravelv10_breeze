<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Leave;
use App\Models\LeaveType;
use Illuminate\Http\Request;

class EmployeeLeaveController extends Controller
{
    public function leave_apply_index()
    {
        $leaves = Leave::all();
        return view('backend.leave_apply.index', compact('leaves'));
    }

    public function leave_application()
    {
        $employees = Employee::get();
        $leave_types = LeaveType::get();
        return view('backend.leave_apply.leave_application', compact('employees','leave_types'));
    }

    public function apply(Request $request)
    {
        $validate = $this->validate($request,[
            'employee'=>'required',
            'leave_type'=>'required',
            // 'from'=>'required',
            // 'to'=>'required',
            // 'reason'=>'required|max:20',
            // 'doc'=>'image|mimes:jpg,jpeg,png,gif',
        ]);
        // $imageName = Null;
        // $imageName = time().'.'.$request->avatar->extension();

        if($validate){
            // $request->avatar->move(('storage/employees'), $imageName);
            
            Leave::create([
                'employee_id'=>$request->employee,
                'leave_type_id'=>$request->leave_type,
                'from'=>$request->from,
                'to'=>$request->to,
                'reason'=>$request->reason,
                // 'department_id'=>$request->doc,
                
            ]);
            return redirect('leave/applicant')->with('success',"Leave Application has Done");
        }
    }
}
