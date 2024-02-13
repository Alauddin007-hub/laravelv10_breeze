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
}
