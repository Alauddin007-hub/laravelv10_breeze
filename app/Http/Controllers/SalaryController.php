<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Salary_Sheets;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $em_salaries = Salary_Sheets::all();
        return view('backend.salary.salaryList', compact('em_salaries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::all();
        return view('backend.salary.employeeSalary', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $this->validate($request,[
            'employee_id'=>'required',
            'basic'=>'required',
            
        ]);

            // $basic = $request->basic;
            $daily_rate = round($request->basic /22);
            $hourly_rate = $daily_rate /24;
            // $daily_rate = $request->basic /22;
            // $dine = $request->basic /100*10;

            // $convence = $request->basic /100*10;
            // $madical = $request->basic /100*10;
            // $rent = $request->basic /100*30;
            // $gross_salary = $basic + $dine + $convence + $madical + $rent ;

        if($validate){
            // $dt        = Carbon::now();
            // $todayDate = $dt->toDayDateTimeString();

            // $salary = [
            //     'basic' =>$basic,
            //     'daily_rate' =>$daily_rate,
            //     'dine' => $dine, 
            //     'convence' => $convence,
            //     'madical' => $madical,
            //     'rent' => $rent,
            //     'gross_salary' => $gross_salary
            // ];
            // dd($salary);
            
            Salary_Sheets::create([
                'employee_id' =>$request->employee_id,
                'basic' =>$request->basic,
                'daily_rate' =>$daily_rate,
                'hourly_rate' =>$hourly_rate,

                // 'conveneynce_allowance' =>$convence,
                // 'madical_allowance' => $madical,
                // 'rent_allowance' =>$rent,
                // 'gross_salary' =>$gross_salary,
                // 'created_by'=>$request->designation,
                
            ]);
            return redirect('salary/index')->with('success',"Employee gross salary updated");
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
        $salaries = Salary_Sheets::find($id);
        $employees = Employee::all();
        return view('backend.salary.edit', compact('employees','salaries'));
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
