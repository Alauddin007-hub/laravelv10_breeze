<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "employees";
        $employees = Employee::with('department', 'designation')->get();

        return view('backend.employee_manage.employee.index', compact('title', 'employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $designations = Designation::get();
        $departments = Department::get();

        return view('backend.employee_manage.employee.create', compact('designations', 'departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'phone' => 'nullable|max:15',
            'company' => 'required|max:200',
            'avatar' => 'image|mimes:jpg,jpeg,png,gif',
            'department' => 'required',
            'designation' => 'required',
        ]);
        // $imageName = Null;
        $imageName = time() . '.' . $request->avatar->extension();


        // echo $imageName;

        $uuid = IdGenerator::generate(['table' => 'employees', 'field' => 'uuid', 'length' => 7, 'prefix' => 'EMP-']);

        if ($validate) {
            $request->avatar->move(('storage/employees'), $imageName);

            // $dt        = Carbon::now();
            // $join = $request->joining_date;
            // $join = Carbon::parse($request->joining_date);
            // $todayDate = $join->toDayDateTimeString();


            $joiningDate = Carbon::parse($request->joining_date)->format('Y-m-d');

            Employee::create([
                'uuid' => $uuid,
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'phone' => $request->phone,
                'Joining_date' => $joiningDate,
                // 'Joining_date' => $request->joining_date,
                'company' => $request->company,
                'department_id' => $request->department,
                'designation_id' => $request->designation,
                'image' => $imageName,
            ]);
            return redirect('employees')->with('success', "Employee has been added");
        }
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
    public function edit($id)
    {
        $designations = Designation::get();
        $departments = Department::get();
        $employees = Employee::find($id);

        return view('backend.employee_manage.employee.edit', compact('designations', 'departments', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $validate = $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'phone' => 'nullable|max:15',
            'company' => 'required|max:200',
            'avatar' => 'file|image|mimes:jpg,jpeg,png,gif',
            'department' => 'required',
            'designation' => 'required',
        ]);
        // if ($request->hasFile('avatar')){
        //     $imageName = time().'.'.$request->avatar->extension();
        //     $request->avatar->move(public_path('storage/employees'), $imageName);
        // }else{
        //     $imageName = Null;
        // }

        $imageName = time() . '.' . $request->avatar->extension();

        // $joiningDate = ($request->joining_date)->format('Y-m-d');
        $joiningDate = Carbon::parse($request->joining_date)->toDateString();


        $employee = Employee::find($request->id);

        if ($validate) {
            $request->avatar->move(('storage/employees'), $imageName);
            $employee->update([
                'uuid' => $employee->uuid,
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'phone' => $request->phone,
                'Joining_date' => $joiningDate,
                // 'Joining_date' => $request->joining_date,
                'company' => $request->company,
                'department_id' => $request->department,
                'designation_id' => $request->designation,
                'image' => $imageName,
            ]);
            return redirect('employees')->with('success', "Employee details has been updated");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $employee = Employee::find($request->id);
        $employee->delete();
        return back()->with('success', "Employee has been deleted");
    }
}
