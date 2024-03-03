<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create()
    {
        // if(!empty(Auth::check()))
        // {
        //     if(Auth::user()->role_types_id == 1){
        //         return redirect('backend.super_admin_dashboard');
        //     }
        //     else if(Auth::user()->role_types_id == 2){
        //         return redirect('backend.admin_dashboard');
        //     }
        //     else if(Auth::user()->role_types_id == 3){
        //         return redirect('backend.employee_dashboard');
        //     }
        //     else if(Auth::user()->role_types_id == 4){
        //         return redirect('backend.company_dashboard');
        //     }
        // }
        return view('backend.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        if(Auth::user()->role_types_id == 1){
            return redirect('superAdmin/dashboard');
        }
        else if(Auth::user()->role_types_id == 2){
            return redirect('admin/dashboard');
        }
        else if(Auth::user()->role_types_id == 3){
            return redirect('employee/dashboard');
        }
        else if(Auth::user()->role_types_id == 4){
            return redirect('company/dashboard');
        }
        else
        {
            return redirect()->back()->with('success', 'Please enter correct email and password');
        }
        
        // return redirect()->intended(RouteServiceProvider::HOME);

    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    }
}
