<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title="employees";
       $employees = Employee::with('department','designation')->get();

       return view('backend.employee_manage.employee.index',compact('title','employees'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $designations = Designation::get();
       $departments = Department::get();

        return view('backend.employee_manage.employee.create',compact('designations','departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required|email',
            'phone'=>'nullable|max:15',
            'company'=>'required|max:200',
            'avatar'=>'file|image|mimes:jpg,jpeg,png,gif',
            'department'=>'required',
            'designation'=>'required',
        ]);
        $imageName = Null;
        if ($request->hasFile('avatar')){
            $imageName = time().'.'.$request->avatar->extension();
            $request->avatar->move(public_path('storage/employees'), $imageName);
        }
        // $uuid = IdGenerator::generate(['table' => 'employees','field'=>'uuid', 'length' => 7, 'prefix' =>'EMP-']);
        Employee::create([
            // 'uuid' =>$uuid,
            'firstname'=>$request->firstname,
            'lastname'=>$request->lastname,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'company'=>$request->company,
            'department_id'=>$request->department,
            'designation_id'=>$request->designation,
            'avatar'=>$imageName,
        ]);
        return back()->with('success',"Employee has been added");
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        $designations = Designation::get();
       $departments = Department::get();
       $employees = Employee::find($employee);

        return view('backend.employee_manage.employee.edit',compact('designations','departments','employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $this->validate($request,[
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required|email',
            'phone'=>'nullable|max:15',
            'company'=>'required|max:200',
            'avatar'=>'file|image|mimes:jpg,jpeg,png,gif',
            'department'=>'required',
            'designation'=>'required',
        ]);
        if ($request->hasFile('avatar')){
            $imageName = time().'.'.$request->avatar->extension();
            $request->avatar->move(public_path('storage/employees'), $imageName);
        }else{
            $imageName = Null;
        }
        
        $employee = Employee::find($request->id);
        $employee->update([
            'uuid' => $employee->uuid,
            'firstname'=>$request->firstname,
            'lastname'=>$request->lastname,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'company'=>$request->company,
            'department_id'=>$request->department,
            'designation_id'=>$request->designation,
            'avatar'=>$imageName,
        ]);
        return back()->with('success',"Employee details has been updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
