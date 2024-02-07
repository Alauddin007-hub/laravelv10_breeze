<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Termination;
use Illuminate\Http\Request;

class TerminateController extends Controller
{
    public function index()
    {
        // $employees = Employee::all();
        $terminates = Termination::all();
        return view('backend.terminated.index',compact('terminates'));
    }

    public function create()
    {
        $employees = Employee::all();
        return view('backend.terminated.terminate', compact('employees'));
    }

    public function tarminated(Request $request)
    {
        $validate = $this->validate($request,[
            'employee'=>'required',
            'termination_type'=>'required',
            'subject'=>'required',
            'notice_date'=>'required',
            'terminated_date'=>'required',
            // 'avatar'=>'image|mimes:jpg,jpeg,png,gif',
            // 'department'=>'required',
            // 'designation'=>'required',
        ]);

        if($validate){
            
            Termination::create([
                'employee_id'=>$request->employee,
                'termination_type'=>$request->termination_type,
                'subject'=>$request->subject,
                'role_type_id'=>$request->role_type_id,
                'notice_date'=>$request->notice_date,
                'terminated_date'=>$request->terminated_date,
                'discription'=>$request->discription,
            ]);
            return redirect('view')->with('success',"Employee has been Terminated");
        }
    }
}
//  'employee_id','termination_type','subject','role_type_id','notice_date','terminated_date','discription',