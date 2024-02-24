<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Exports\SalaryExcel;
use App\Models\Employee;
use App\Models\Payrolles;
use App\Models\Salary_Sheets;
use Maatwebsite\Excel\Facades\Excel;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Return_;

class PayrolleController extends Controller
{
    // public function index()
    // {   
    //     return view('backend.payroll.employee_salary');
    // }

    public function list()
    {
        $payrolles = Payrolles::all();
        return view('backend.payroll.show', compact('payrolles'));
    }

    public function create()
    {
        $employee = Employee::all();
        // $salary = Salary_Sheets::all();
        return view('backend.payroll.employeerecord', compact('employee'));
    }

    public function salaryrecord(Request $request )
    {
        // $employee = Employee::get();
        $salary = Salary_Sheets::get();
        // return $request;
       $salarydetail = DB::table('salary_details')->where('employee_id', $request->employee_id)->first();
    //    dd($salarydetail);

       if (isset($salarydetail)) {
        // $employee = Employee::all();
        $emp_id = $request->employee_id;
        return view('backend.payroll.create', compact('salarydetail', 'emp_id'));
    } else {
        return redirect('add_salary');
    }
    }

    public function saveRecord(Request $request)
    {

        // dd($request);

            $basic = $request->basic;
            $dine = ($request->basic /100)*($request->da);
            $house = ($request->basic /100)*($request->hra);
            $conveyance = $request->conveyance;
            $allowance = $request->allowance;
            $medical_allowance = $request->medical_allowance;

            $gross_salary = $basic + $dine + $house + $conveyance + $allowance + $medical_allowance;

            // dd($gross_salary);

            $tds = $request->tds;
            $esi = $request->esi;
            $pf = $request->pf;
            $leave = $request->leave;
            $prof_tax = $request->prof_tax;
            $labour_welfare = $request->labour_welfare;

            $net_salary = $gross_salary - ($tds + $esi + $pf + $leave + $prof_tax + $labour_welfare);

            $data = [
                'employee_id' =>$request->employee_id,
                'basic' => $basic,
                'month_of_salary' => $request->month_of_salary,
                'dine_allowance' => $dine,
                'rent_allowance' => $house,
                'conveneynce_allowance' => $conveyance,
                'allowance' => $allowance,
                'medical_allowance' => $medical_allowance,
                'gross_salary' => $gross_salary,
                'tds' => $tds,
                'esi' => $esi,
                'pf' => $pf,
                'leave' => $leave,
                'prof_tax' => $prof_tax,
                'labour_welfare' => $labour_welfare,
                'net_salary' => $net_salary,
            ];

            // dd($data);

            $query = DB::table('payrolles')->where('employee_id', $request->employee_id)->where('month_of_salary', $request->month_of_salary)->first();

            if(!$query){
                // dd($data);
                Payrolles::create($data);
                return redirect('payroll/index')->with('success', 'Salary Generated');
            } else {
                return redirect('payrolls')->with('success', 'Payslip already created');
            }
    }

    public function entry()
    {
        $employee = Employee::all();
        return view('backend.payroll.create',compact('employee'));
    }


    public function salaryView($id)
    {
        // $users = DB::table('users')
        //         ->join('staff_salaries', 'users.user_id', 'staff_salaries.user_id')
        //         ->join('profile_information', 'users.user_id', 'profile_information.user_id')
        //         ->select('users.*', 'staff_salaries.*','profile_information.*')
        //         ->where('staff_salaries.user_id',$user_id)->first();
        // if (!empty($users)) {
        //     return view('payroll.salaryview',compact('users'));
        // } else {
        //     Toastr::warning('Please update information user :)','Warning');
        //     return redirect()->route('profile_user');
        // }
        $payrolles = Payrolles::find($id);

        return view('backend.payroll.salary_view', compact('payrolles'));
    }

    // public function updateRecord(Request $request)
    // {
    //     DB::beginTransaction();
    //     try{
    //         $update = [

    //             'id'      => $request->id,
    //             'name'    => $request->name,
    //             'salary'  => $request->salary,
    //             'basic'   => $request->basic,
    //             'da'      => $request->da,
    //             'hra'     => $request->hra,
    //             'conveyance' => $request->conveyance,
    //             'allowance'  => $request->allowance,
    //             'medical_allowance'  => $request->medical_allowance,
    //             'tds'  => $request->tds,
    //             'esi'  => $request->esi,
    //             'pf'   => $request->pf,
    //             'leave'     => $request->leave,
    //             'prof_tax'  => $request->prof_tax,
    //             'labour_welfare'  => $request->labour_welfare,
    //         ];


    //         StaffSalary::where('id',$request->id)->update($update);
    //         DB::commit();
    //         Toastr::success('Salary updated successfully :)','Success');
    //         return redirect()->back();

    //     }catch(\Exception $e){
    //         DB::rollback();
    //         Toastr::error('Salary update fail :)','Error');
    //         return redirect()->back();
    //     }
    // }

    // /** delete record */
    // public function deleteRecord(Request $request)
    // {
    //     DB::beginTransaction();
    //     try {

    //         StaffSalary::destroy($request->id);

    //         DB::commit();
    //         Toastr::success('Salary deleted successfully :)','Success');
    //         return redirect()->back();
            
    //     } catch(\Exception $e) {
    //         DB::rollback();
    //         Toastr::error('Salary deleted fail :)','Error');
    //         return redirect()->back();
    //     }
    // }

    // /** payroll Items */
    // public function payrollItems()
    // {
    //     return view('payroll.payrollitems');
    // }

    // /** report pdf */
    // public function reportPDF(Request $request)
    // {
    //     $user_id = $request->user_id;
    //     $users = DB::table('users')
    //         ->join('staff_salaries', 'users.user_id', 'staff_salaries.user_id')
    //         ->join('profile_information', 'users.user_id', 'profile_information.user_id')
    //         ->select('users.*', 'staff_salaries.*','profile_information.*')
    //         ->where('staff_salaries.user_id',$user_id)->first();

    //         $pdf = PDF::loadView('report_template.salary_pdf',compact('users'))->setPaper('a4', 'landscape');
    //         return $pdf->download('ReportDetailSalary'.'.pdf');
    // }

    // /** export Excel */
    // public function reportExcel(Request $request)
    // {
    //     $user_id = $request->user_id;
    //     $users = DB::table('users')
    //         ->join('staff_salaries', 'users.user_id', 'staff_salaries.user_id')
    //         ->join('profile_information', 'users.user_id', 'profile_information.user_id')
    //         ->select('users.*', 'staff_salaries.*','profile_information.*')
    //         ->where('staff_salaries.user_id',$user_id)->get();
            
    //         return Excel::download(new SalaryExcel($user_id),'ReportDetailSalary'.'.xlsx');
    // }

    // public function empsalary()
    // {
    //     $employees = Employee::get();
    //     return view('backend.payroll.emp_pay', compact('employees'));
    // }
}


