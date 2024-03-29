<?php


use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;

use App\Http\Controllers\AdvanceController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DeductionController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\EmployeeAttendenceController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeLeaveController;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\LeaveTypeController;
use App\Http\Controllers\OvertimeController;
use App\Http\Controllers\PayrolleController;
use Inertia\Inertia;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\TerminateController;
use App\Http\Controllers\WarningController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Home');
});
Route::get('/about', function () {
    return Inertia::render('AboutPage');
})->name('about');
Route::get('/service', function () {
    return Inertia::render('ServicePage');
});
Route::get('/team', function () {
    return Inertia::render('TeamPage');
});
Route::get('/contact', function () {
    return Inertia::render('ContactPage');
});

// Route::get('/', function () {
//     return view('backend.login');
// });
Route::get('pdf', function () {
    return view('backend.slip_generate.pdf');
});



// Multi user
Route::group(['middleware' => 'superAdmin'], function () {

    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');

        Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');


      
    //Employee
    Route::get('employees', [EmployeeController::class, 'index'])
        ->name('employee.index');

    Route::get('employee/entry', [EmployeeController::class, 'create'])
        ->name('employee.create');

    Route::post('employee/entry', [EmployeeController::class, 'store'])
        ->name('employee.store');

    Route::get('employee/edit/{id}', [EmployeeController::class, 'edit'])
        ->name('employee.edit');

    Route::post('employee/update/{id}', [EmployeeController::class, 'update'])
        ->name('employee.update');

    Route::get('employee/delete/{id}', [EmployeeController::class, 'destroy'])
        ->name('employee.destroy');

    //Department
    Route::get('department', [DepartmentController::class, 'index'])
        ->name('department.index');

    Route::get('department/entry', [DepartmentController::class, 'create'])
        ->name('department.create');

    Route::post('department/store', [DepartmentController::class, 'store'])
        ->name('departments');


    //Designation
    Route::get('designation', [DesignationController::class, 'index'])
        ->name('designation.index');

    Route::get('designation/entry', [DesignationController::class, 'create'])
        ->name('designation.create');

    Route::post('designation/entry', [DesignationController::class, 'store'])
        ->name('designations');

    //Branch
    Route::get('branch', [BranchController::class, 'index'])
        ->name('branch.index');

    Route::get('branch/entry', [BranchController::class, 'create'])
        ->name('branch.create');

    //Leave-Type
    Route::get('leavetype', [LeaveTypeController::class, 'index'])
        ->name('leavetype.index');

    Route::get('leavetype/entry', [LeaveTypeController::class, 'create'])
        ->name('leavetype.create');

    Route::post('leavetype/entry', [LeaveTypeController::class, 'store'])
        ->name('leavetype.store');

    Route::get('leavetype/edit/{id}', [LeaveTypeController::class, 'edit'])
        ->name('leavetype.edit');

    Route::post('leavetype/update/{id}', [LeaveTypeController::class, 'update'])
        ->name('leavetype.update');

    Route::get('leavetype/delete/{id}', [LeaveTypeController::class, 'destroy'])
        ->name('leavetype.destroy');

    // Applicant
    Route::get('leave/applicant', [EmployeeLeaveController::class, 'leave_apply_index'])
        ->name('leavetype.leave_apply_index');

    Route::get('leave/apply_form', [EmployeeLeaveController::class, 'leave_application'])
        ->name('leave.leave_form');

    Route::post('leave/apply/', [EmployeeLeaveController::class, 'apply'])
        ->name('leave.leave_apply');

    Route::post('approve/{id}', [EmployeeLeaveController::class, 'approve'])->name('approve');

    //Holidays
    Route::get('holiday/index', [HolidayController::class, 'index'])
        ->name('holidays');

    Route::get('holidays/entry', [HolidayController::class, 'create'])
        ->name('holidays.create');

    Route::post('holiday', [HolidayController::class, 'store'])
        ->name('holidays.store');

    Route::post('holidays/{holiday}', [HolidayController::class, 'completed'])
        ->name('completed');

    Route::put('holidays', [HolidayController::class, 'edit'])
        ->name('holidays.edit');

    Route::put('holidays', [HolidayController::class, 'update'])
        ->name('holidays.update');

    Route::delete('holidays', [HolidayController::class, 'destroy'])
        ->name('holiday.destroy');

    // Attendence
    Route::get('attendences', [EmployeeAttendenceController::class, 'index'])
        ->name('attendences');

    Route::get('attendence', [EmployeeAttendenceController::class, 'attendence'])
        ->name('employee.attendence');

    Route::get('checkin', [EmployeeAttendenceController::class, 'create'])
        ->name('attendence.create');

    Route::post('attendence_checkIn', [EmployeeAttendenceController::class, 'store'])
        ->name('attendence.store');

    Route::get('checkout', [EmployeeAttendenceController::class, 'edit'])
        ->name('attendence.edit');

    Route::post('attendence_checkOut', [EmployeeAttendenceController::class, 'updated'])
        ->name('attendence.update');

    // Route::get('checkout',[EmployeeAttendenceController::class,'checkout'])
    //     ->name('attendence.checkout');

    // Termination
    Route::get('view', [TerminateController::class, 'index'])
        ->name('views');

    Route::get('termination/entry', [TerminateController::class, 'create'])
        ->name('termination');

    Route::post('termination', [TerminateController::class, 'tarminated'])
        ->name('tarminated.store');

    // warning
    Route::get('view_list', [WarningController::class, 'index'])
        ->name('warning.views');

    Route::get('warning/entry', [WarningController::class, 'create'])
        ->name('warning');

    Route::post('warning/store', [WarningController::class, 'store'])
        ->name('warning.store');
    // Branch
    Route::get('branch', [BranchController::class, 'index'])
        ->name('branches');

    Route::get('branch/entry', [BranchController::class, 'create'])
        ->name('branch/entry');

    Route::post('branch/store', [BranchController::class, 'store'])
        ->name('branch.store');

    // Advance
    Route::get('advance/index', [AdvanceController::class, 'index'])
        ->name('views');

    Route::get('advance/entry', [AdvanceController::class, 'create'])
        ->name('advance.create');

    Route::post('advance', [AdvanceController::class, 'store'])
        ->name('advance.store');

    Route::post('advance/update/{id}', [AdvanceController::class, 'update'])
        ->name('advance.update');

    // Overtimes
    Route::get('overtime/index', [OvertimeController::class, 'index'])
        ->name('overtime.views');

    Route::get('Overtime/entry', [OvertimeController::class, 'create'])
        ->name('overtime.create');

    Route::post('Overtime', [OvertimeController::class, 'store'])
        ->name('Overtime.store');

    // Payroll
    // Route::get('salary/view', [PayrolleController::class, 'salaryView'])
    //     ->name('payroll.salaryView');


    Route::get('salaries/list', [PayrolleController::class, 'list'])
        ->name('payroll.list');

    Route::get('payrolls', [PayrolleController::class, 'create'])
        ->name('payroll.create');

    Route::post('salaryrecord', [PayrolleController::class, 'salaryrecord'])
        ->name('payroll.salaryrecord');

    Route::post('payslips', [PayrolleController::class, 'saveRecord'])
        ->name('payslip');

    Route::get('pay/edit/{id}', [PayrolleController::class, 'edit'])
        ->name('pay.edit');
        
    Route::get('pay/update/{id}', [PayrolleController::class, 'updateRecord'])
        ->name('pay.update');

    Route::get('salary/view/{id}', [PayrolleController::class, 'salaryView'])
        ->name('salaryViews');

    Route::get('extra/report/pdf', [PayrolleController::class, 'reportPDF'])
        ->name('report.pdf');

    Route::get('extra/report/excel', [PayrolleController::class, 'reportExcel'])
        ->name('report.excel');

    // Employee Salary
    Route::get('salary/index', [SalaryController::class, 'index'])
        ->name('salaries');

    Route::get('add_salary', [SalaryController::class, 'create'])
        ->name('salaryAdd');

    Route::post('salary/store', [SalaryController::class, 'store'])
        ->name('salary.store');

    Route::get('salary/rewrite', [SalaryController::class, 'edit'])
        ->name('salary.rewrite');

    Route::post('salary/update', [SalaryController::class, 'update'])
        ->name('salary.update');

    // Employee Deduction
    Route::get('index', [DeductionController::class, 'index'])
        ->name('List');

    Route::get('deduct', [DeductionController::class, 'create'])
        ->name('Add');

    Route::post('deduct/store', [DeductionController::class, 'store'])
        ->name('deduct.store');

    Route::get('deduct/rewrite', [DeductionController::class, 'edit'])
        ->name('deducte.rewrite');

    Route::post('deduct/update', [DeductionController::class, 'update'])
        ->name('deducte.update');

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::group(['middleware' => 'admin'], function () {

    // Route::get('dashboard/admin', function () {
    //     return view('backend.admin_dashboard');
    // });
    //Employee
    Route::get('employees', [EmployeeController::class, 'index'])
        ->name('employee.index');

    Route::get('employee/entry', [EmployeeController::class, 'create'])
        ->name('employee.create');

    Route::post('employee/entry', [EmployeeController::class, 'store'])
        ->name('employee.store');

    Route::get('employee/edit/{id}', [EmployeeController::class, 'edit'])
        ->name('employee.edit');

    Route::post('employee/update/{id}', [EmployeeController::class, 'update'])
        ->name('employee.update');

    Route::get('employee/delete/{id}', [EmployeeController::class, 'destroy'])
        ->name('employee.destroy');

    //Department
    Route::get('department', [DepartmentController::class, 'index'])
        ->name('department.index');

    Route::get('department/entry', [DepartmentController::class, 'create'])
        ->name('department.create');

    Route::post('department/store', [DepartmentController::class, 'store'])
        ->name('departments');


    //Designation
    Route::get('designation', [DesignationController::class, 'index'])
        ->name('designation.index');

    Route::get('designation/entry', [DesignationController::class, 'create'])
        ->name('designation.create');

    Route::post('designation/entry', [DesignationController::class, 'store'])
        ->name('designations');

    //Branch
    Route::get('branch', [BranchController::class, 'index'])
        ->name('branch.index');

    Route::get('branch/entry', [BranchController::class, 'create'])
        ->name('branch.create');

    //Leave-Type
    Route::get('leavetype', [LeaveTypeController::class, 'index'])
        ->name('leavetype.index');

    Route::get('leavetype/entry', [LeaveTypeController::class, 'create'])
        ->name('leavetype.create');

    Route::post('leavetype/entry', [LeaveTypeController::class, 'store'])
        ->name('leavetype.store');

    Route::get('leavetype/edit/{id}', [LeaveTypeController::class, 'edit'])
        ->name('leavetype.edit');

    Route::post('leavetype/update/{id}', [LeaveTypeController::class, 'update'])
        ->name('leavetype.update');

    Route::get('leavetype/delete/{id}', [LeaveTypeController::class, 'destroy'])
        ->name('leavetype.destroy');

    // Applicant
    Route::get('leave/applicant', [EmployeeLeaveController::class, 'leave_apply_index'])
        ->name('leavetype.leave_apply_index');

    Route::get('leave/apply_form', [EmployeeLeaveController::class, 'leave_application'])
        ->name('leave.leave_form');

    Route::post('leave/apply/', [EmployeeLeaveController::class, 'apply'])
        ->name('leave.leave_apply');

    Route::post('approve/{id}', [EmployeeLeaveController::class, 'approve'])->name('approve');

    //Holidays
    Route::get('holiday/index', [HolidayController::class, 'index'])
        ->name('holidays');

    Route::get('holidays/entry', [HolidayController::class, 'create'])
        ->name('holidays.create');

    Route::post('holiday', [HolidayController::class, 'store'])
        ->name('holidays.store');

    Route::post('holidays/{holiday}', [HolidayController::class, 'completed'])
        ->name('completed');

    Route::put('holidays', [HolidayController::class, 'edit'])
        ->name('holidays.edit');

    Route::put('holidays', [HolidayController::class, 'update'])
        ->name('holidays.update');

    Route::delete('holidays', [HolidayController::class, 'destroy'])
        ->name('holiday.destroy');

    // Attendence
    Route::get('attendences', [EmployeeAttendenceController::class, 'index'])
        ->name('attendences');

    Route::get('attendence', [EmployeeAttendenceController::class, 'attendence'])
        ->name('employee.attendence');

    Route::get('checkin', [EmployeeAttendenceController::class, 'create'])
        ->name('attendence.create');

    Route::post('attendence_checkIn', [EmployeeAttendenceController::class, 'store'])
        ->name('attendence.store');

    Route::get('checkout', [EmployeeAttendenceController::class, 'edit'])
        ->name('attendence.edit');

    Route::post('attendence_checkOut', [EmployeeAttendenceController::class, 'updated'])
        ->name('attendence.update');

    // Route::get('checkout',[EmployeeAttendenceController::class,'checkout'])
    //     ->name('attendence.checkout');

    // Termination
    Route::get('view', [TerminateController::class, 'index'])
        ->name('views');

    Route::get('termination/entry', [TerminateController::class, 'create'])
        ->name('termination');

    Route::post('termination', [TerminateController::class, 'tarminated'])
        ->name('tarminated.store');

    // warning
    Route::get('view_list', [WarningController::class, 'index'])
        ->name('warning.views');

    Route::get('warning/entry', [WarningController::class, 'create'])
        ->name('warning');

    Route::post('warning/store', [WarningController::class, 'store'])
        ->name('warning.store');
    // Branch
    Route::get('branch', [BranchController::class, 'index'])
        ->name('branches');

    Route::get('branch/entry', [BranchController::class, 'create'])
        ->name('branch/entry');

    Route::post('branch/store', [BranchController::class, 'store'])
        ->name('branch.store');

    // Advance
    Route::get('advance/index', [AdvanceController::class, 'index'])
        ->name('views');

    Route::get('advance/entry', [AdvanceController::class, 'create'])
        ->name('advance.create');

    Route::post('advance', [AdvanceController::class, 'store'])
        ->name('advance.store');

    Route::post('advance/update/{id}', [AdvanceController::class, 'update'])
        ->name('advance.update');

    // Overtimes
    Route::get('overtime/index', [OvertimeController::class, 'index'])
        ->name('overtime.views');

    Route::get('Overtime/entry', [OvertimeController::class, 'create'])
        ->name('overtime.create');

    Route::post('Overtime', [OvertimeController::class, 'store'])
        ->name('Overtime.store');

    // Payroll
    // Route::get('salary/view', [PayrolleController::class, 'salaryView'])
    //     ->name('payroll.salaryView');


    Route::get('salaries/list', [PayrolleController::class, 'list'])
        ->name('payroll.list');

    Route::get('payrolls', [PayrolleController::class, 'create'])
        ->name('payroll.create');

    Route::post('salaryrecord', [PayrolleController::class, 'salaryrecord'])
        ->name('payroll.salaryrecord');

    Route::post('payslips', [PayrolleController::class, 'saveRecord'])
    ->name('payslip');

    Route::get('pay/edit/{id}', [PayrolleController::class, 'edit'])->name('pay.edit');
    Route::get('pay/update/{id}', [PayrolleController::class, 'updateRecord'])->name('pay.update');

    Route::get('salary/view/{id}', [PayrolleController::class, 'salaryView'])
        ->name('salaryViews');

    Route::get('extra/report/pdf', [PayrolleController::class, 'reportPDF'])
        ->name('report.pdf');

    Route::get('extra/report/excel', [PayrolleController::class, 'reportExcel'])
        ->name('report.excel');

    // Employee Salary
    Route::get('salary/index', [SalaryController::class, 'index'])
        ->name('salaries');

    Route::get('add_salary', [SalaryController::class, 'create'])
        ->name('salaryAdd');

    Route::post('salary/store', [SalaryController::class, 'store'])
        ->name('salary.store');

    Route::get('salary/rewrite', [SalaryController::class, 'edit'])
        ->name('salary.rewrite');

    Route::post('salary/update', [SalaryController::class, 'update'])
        ->name('salary.update');

    // Employee Deduction
    Route::get('index', [DeductionController::class, 'index'])
        ->name('List');

    Route::get('deduct', [DeductionController::class, 'create'])
        ->name('Add');

    Route::post('deduct/store', [DeductionController::class, 'store'])
        ->name('deduct.store');

    Route::get('deduct/rewrite', [DeductionController::class, 'edit'])
        ->name('deducte.rewrite');

    Route::post('deduct/update', [DeductionController::class, 'update'])
        ->name('deducte.update');

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::group(['middleware' => 'employee'], function () {

    // Route::get('dashboard/employee', function () {
    //     return view('backend.employee_dashboard');
    // });

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::group(['middleware' => 'company'], function () {

    // Route::get('dashboard/company', function () {
    //     return view('backend.company_dashboard');
    // });

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
});



// Route::get('dashboard', function () {
//     return view('backend.dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::group(['middleware' => 'superAdmin'],function(){
     Route::get('superAdmin/dashboard', function(){
        return view('backend.super_admin_dashboard');
     });
});
Route::group(['middleware' => 'admin'],function(){
     Route::get('admin/dashboard', function(){
        return view('backend.admin_dashboard');
     });
});
Route::group(['middleware' => 'employee'],function(){
     Route::get('employee/dashboard', function(){
        return view('backend.employee_dashboard');
     });
});
Route::group(['middleware' => 'company'],function(){
     Route::get('company/dashboard', function(){
        return view('backend.company_dashboard');
     });
});

require __DIR__ . '/auth.php';
