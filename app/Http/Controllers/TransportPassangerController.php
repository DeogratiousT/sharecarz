<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class TransportPassangerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('driver');
    }

    public function index()
    {
        return view('transport-passangers.index');
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        if (request()->ajax()) {
            $user->geopoint = $request->pos;
            $user->save();

            return redirect()->route('transport-passangers');
        }

        return back();
    }
}
