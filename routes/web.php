<?php

use App\Http\Controllers\ProfileController;
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
    return view('backend.login');
});
Route::get('pdf', function () {
    return view('backend.slip_generate.pdf');
});



            // Multi user
Route::group(['middleware' => 'superAdmin'], function(){

    Route::get('dashboard/super_admin', function () {
        return view('backend.super_admin_dashboard');
    });
});

Route::group(['middleware' => 'adnin'], function(){

    Route::get('dashboard/admin', function () {
        return view('backend.admin_dashboard');
    });
});

Route::group(['middleware' => 'employee'], function(){

    Route::get('dashboard/employee', function () {
        return view('backend.employee_dashboard');
    });
});

Route::group(['middleware' => 'company'], function(){

    Route::get('dashboard/company', function () {
        return view('backend.company_dashboard');
    });
});



Route::get('dashboard', function () {
    return view('backend.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
