<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransportPassangerController extends Controller
{
    public function index()
    {
        return view('transport-passangers.index');
    }
}
