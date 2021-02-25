<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomRegisterLoginController extends Controller
{
    public function driverRegister()
    {
        return view('auth.driver_register');
    }

    public function passangerRegister()
    {
        return view('auth.passanger_register');
    }
}
