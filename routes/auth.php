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
use App\Http\Controllers\BranchController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\EmployeeAttendenceController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\LeaveTypeController;
use App\Http\Controllers\TerminateController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
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
});

Route::middleware('auth')->group(function () {
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

    Route::post('employee/update/{id}',[EmployeeController::class,'update'])
        ->name('employee.update');

    Route::get('employee/delete/{id}',[EmployeeController::class,'destroy'])
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

    Route::post('leavetype/update/{id}',[LeaveTypeController::class,'update'])
        ->name('leavetype.update');

    Route::get('leavetype/delete/{id}',[LeaveTypeController::class,'destroy'])
        ->name('leavetype.destroy');

        // Applicant
    Route::get('leave/applicant',[LeaveTypeController::class,'leave_apply_index'])
        ->name('leavetype.leave_apply_index');

    Route::get('leave/apply_form',[LeaveTypeController::class,'leave_application'])
        ->name('leave.leave_form');

    Route::post('leave/apply_form',[LeaveTypeController::class,'leave_application'])
        ->name('leave.leave_apply');

    //Holidays
    Route::get('holidays',[HolidayController::class,'index'])
        ->name('holidays');

    Route::get('holidays/entry', [HolidayController::class, 'create'])
        ->name('holidays.create');

    Route::post('holidays',[HolidayController::class,'store'])
        ->name('holidays.store');

    Route::post('holidays/{holiday}',[HolidayController::class,'completed'])
        ->name('completed');

    Route::put('holidays',[HolidayController::class,'edit'])
        ->name('holidays.edit');

    Route::put('holidays',[HolidayController::class,'update'])
        ->name('holidays.update');

    Route::delete('holidays',[HolidayController::class,'destroy'])
        ->name('holiday.destroy');

    // Attendence
    Route::get('attendences',[EmployeeAttendenceController::class,'index'])
        ->name('attendences');

    Route::get('attendence',[EmployeeAttendenceController::class,'attendence'])
        ->name('employee.attendence');

    Route::get('checkin', [EmployeeAttendenceController::class, 'create'])
        ->name('attendence.create');

    Route::post('attendence_checkIn',[EmployeeAttendenceController::class,'store'])
        ->name('attendence.store');

    Route::get('checkout',[EmployeeAttendenceController::class,'edit'])
        ->name('attendence.edit');

    Route::post('attendence_checkOut/{id}',[EmployeeAttendenceController::class,'updated'])
        ->name('attendence.update');

    // Route::get('checkout',[EmployeeAttendenceController::class,'checkout'])
    //     ->name('attendence.checkout');

    // Termination

    Route::get('view',[TerminateController::class,'index'])
        ->name('views');

    Route::get('termination/entry', [TerminateController::class, 'create'])
        ->name('termination');

    Route::post('termination',[TerminateController::class,'tarminated'])
        ->name('tarminated');
});
