<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomRegisterLoginController extends Controller
{
    public function driverLogin()
    {
        return view('auth.driver_login');
    }

    public function driverRegister()
    {
        return view('auth.driver_register');
    }

    public function passangerLogin()
    {
        return view('auth.passanger_login');
    }

    public function passangerRegister()
    {
        return view('auth.passanger_register');
    }
}
