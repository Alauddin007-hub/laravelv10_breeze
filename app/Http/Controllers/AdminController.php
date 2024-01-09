<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function login(){
        return view('admin.login');
    }

    public function store(Request $request)
    {
        $user = $request->all();
        // dd($user);

        if(Auth::guard('admin')->attempt(['email'=> $user['email'],
        'password'=> $user['password']])){
            // echo "All are ok";
            return redirect()->route('admin.dashboard');
        } else {
            // echo "Problem";
            return view('admin.login');
        }
    }
    
    // public function store(LoginRequest $request): RedirectResponse
    // {
    //     $request->authenticate();

    //     $request->session()->regenerate();

    //     return redirect()->intended(RouteServiceProvider::HOME);
    // }
}
