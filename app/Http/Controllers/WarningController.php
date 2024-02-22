<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Warning;
use Illuminate\Http\Request;

class WarningController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $warnings = Warning::all();
        return view('backend.warning.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::all();
        return view('backend.warning.warning_form',compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $this->validate($request,[
            'employee'=>'required',
            'warning_type'=>'required',
            'subject'=>'required',
            'warning_date'=>'required',
        ]);

        if($validate){
            
            Warning::create([
                'employee_id'=>$request->employee,
                'warning_type'=>$request->warning_type,
                'subject'=>$request->subject,
                'warning_by'=>$request->warning_by,
                'warning_date'=>$request->warning_date,
                'description'=>$request->discription,
            ]);
            return redirect('view')->with('success',"Employee has been Terminated");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
