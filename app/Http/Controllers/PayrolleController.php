<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PayrolleController extends Controller
{
    public function index()
    {
        return view('backend.payroll.employee_salary');
    }

    public function store()
    {

    }

    public function salaryView()
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

        return view('backend.payroll.salary_view');
    }
}
