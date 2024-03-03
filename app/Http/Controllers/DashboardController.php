<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\EmployeeAttendence;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Admin Dashboard';
        // $clients_count = Client::count();
        $currentDate = getdate();
        $date = $currentDate['mday'];
        $todayAttend = EmployeeAttendence::whereDay('created_at', $date)->count();
        // $todayAttend = $todayAttend->count();
        $employee_count = Employee::count();
        return view('backend.admin_dashboard',compact('title','employee_count','todayAttend'));
    }
}
