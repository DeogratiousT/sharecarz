<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class HireCarController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['passanger']);
    }

    public function index()
    {
        $drivers = User::where('role_id','2')->get();
        
        return view('hire-cars.index',['drivers'=>$drivers]);
    }

    public function store()
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
