<?php

namespace App\Http\Controllers;

use Haruncpi\LaravelIdGenerator\IdGenerator;
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
use Rmunate\Utilities\SpellNumber;

class PayrolleController extends Controller
{

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

    public function salaryrecord(Request $request)
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
        $dine = ($request->basic / 100) * ($request->da);
        $house = ($request->basic / 100) * ($request->hra);
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
        $loan = $request->loan;

        $net_salary = $gross_salary - ($tds + $esi + $pf + $leave + $prof_tax + $loan);

        $payslipID = IdGenerator::generate(['table' => 'payrolles','field' => 'slipID','length' => 7, 'prefix' => 'PAY#-']);

        $data = [
            'employee_id' => $request->employee_id,
            'slipID' => $payslipID,
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
            'loan' => $loan,
            'net_salary' => $net_salary,
        ];

        // dd($data);


        $query = DB::table('payrolles')->where('employee_id', $request->employee_id,)->where('month_of_salary', $request->month_of_salary)->first();

        if (!$query) {
            // dd($data);
            Payrolles::create($data);
            return redirect('salaries/list')->with('success', 'Salary Generated');
        } else {
            return redirect('payrolls')->with('success', 'Payslip already created');
        }
    }


    public function salaryView($id)
    {        
        $payrolles = Payrolles::find($id);
        $employees = DB::table('employees')->where('id', $payrolles->employee_id)->first();

        $spell = SpellNumber::value($payrolles->net_salary)
            ->locale('en') 
            ->currency('Taka')
            ->fraction('Paisa')
            ->toMoney();

            $spell = ucfirst($spell);
            
        // $employees = Employee::all();

        return view('backend.payroll.salary_view', compact('payrolles', 'employees','spell'));
    }

    public function edit($id)
    {
        
        $pay = Payrolles::find($id);
        return view('backend.payroll.edit', compact('pay'));  
    }

    public function updateRecord(Request $request)
    {
       // dd($request);

        $basic = $request->basic;
        $dine = ($request->basic / 100) * ($request->da);
        $house = ($request->basic / 100) * ($request->hra);
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
        $loan = $request->loan;

        $net_salary = $gross_salary - ($tds + $esi + $pf + $leave + $prof_tax + $loan);


        $employee = Payrolles::find($request->id);


        $data = [
            'employee_id' => $employee,
            'slipID' => $employee,
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
            'loan' => $loan,
            'net_salary' => $net_salary,
        ];

        // dd($data);


        $query = DB::table('payrolles')->where('employee_id', $request->employee_id,)->where('month_of_salary', $request->month_of_salary)->first();

        if (!$query) {
            // dd($data);
            Payrolles::create($data);
            return redirect('salaries/list')->with('success', 'Salary Generated');
        } else {
            return redirect('payrolls')->with('success', 'Payslip already created');
        }
    }

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
    public function reportPDF(Request $request)
    {
        $result = $request->id;
        // dd($result);

        $payrolles = DB::table('payrolles')->where('id', $request->id)->first();
        $employees = DB::table('employees')->where('id', $payrolles->employee_id)->first(); 

        $spell = SpellNumber::value($payrolles->net_salary)
            ->locale('en') 
            ->currency('Taka')
            ->fraction('Paisa')
            ->toMoney();

            $spell = ucfirst($spell);

            $pdf = PDF::loadView('backend.slip_generate.pdf',compact('payrolles','employees','spell'))->setPaper('a4', 'landscape');
            return $pdf->download('ReportDetailSalary'.'.pdf');
    }

    // /** export Excel */
    // public function reportExcel(Request $request)
    // {
    //     $result = $request->id;
    //     // dd($result);

    //     $payrolles = DB::table('payrolles')->where('id', $request->id)->first();
    //     $employees = DB::table('employees')->where('id', $payrolles->employee_id)->first(); 

    //     $spell = SpellNumber::value($payrolles->net_salary)
    //         ->locale('en') 
    //         ->currency('Taka')
    //         ->fraction('Paisa')
    //         ->toMoney();

    //         $spell = ucfirst($spell);

    //         return Excel::download(new SalaryExcel($payrolles,$employees),'ReportDetailSalary'.'.xlsx');
    // }

    // public function empsalary()
    // {
    //     $employees = Employee::get();
    //     return view('backend.payroll.emp_pay', compact('employees'));
    // }
}
