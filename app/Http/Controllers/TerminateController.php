<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Termination;
use Illuminate\Http\Request;

class TerminateController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        $terminates = Termination::all();
        return view('backend.terminated.index',compact('employees', 'terminates'));
    }

    public function create()
    {
        return view('backend.terminated.terminate');
    }

    public function tarminated()
    {
        // 
    }
}
