<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\EmployeeAttendence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // $title = 'Dashboard';
        // // $clients_count = Client::count();
        // $currentDate = getdate();
        // $date = $currentDate['mday'];
        // $todayAttend = EmployeeAttendence::whereDay('created_at', $date)->count();
        // // $todayAttend = $todayAttend->count();
        // $employee_count = Employee::count();
        // return view('backend.dashboard',compact('title','employee_count','todayAttend'));

        if(Auth::user()->role_types_id == 1)
        {
            $title = 'Super Admin Dashboard';
        // $clients_count = Client::count();
        $currentDate = getdate();
        $date = $currentDate['mday'];
        $todayAttend = EmployeeAttendence::whereDay('created_at', $date)->count();
        // $todayAttend = $todayAttend->count();
        $employee_count = Employee::count();
        return view('backend.super_admin_dashboard',compact('title','employee_count','todayAttend'));
        }
        elseif(Auth::user()->role_types_id == 2)
        {
            $title = 'Dashboard';
        // $clients_count = Client::count();
        $currentDate = getdate();
        $date = $currentDate['mday'];
        $todayAttend = EmployeeAttendence::whereDay('created_at', $date)->count();
        // $todayAttend = $todayAttend->count();
        $employee_count = Employee::count();
        return view('backend.admin_dashboard',compact('title','employee_count','todayAttend'));
        }
        elseif(Auth::user()->role_types_id == 3)
        {
            $title = 'Dashboard';
        // $clients_count = Client::count();
        $currentDate = getdate();
        $date = $currentDate['mday'];
        $todayAttend = EmployeeAttendence::whereDay('created_at', $date)->count();
        // $todayAttend = $todayAttend->count();
        $employee_count = Employee::count();
        return view('backend.employee_dashboard',compact('title','employee_count','todayAttend'));
        }
        else
        {
            $title = 'Dashboard';
        // $clients_count = Client::count();
        $currentDate = getdate();
        $date = $currentDate['mday'];
        $todayAttend = EmployeeAttendence::whereDay('created_at', $date)->count();
        // $todayAttend = $todayAttend->count();
        $employee_count = Employee::count();
        return view('backend.company_dashboard',compact('title','employee_count','todayAttend'));
        }
    }
}
