<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\RideRequest;

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

    public function store(Request $request)
    {
        $user = Auth::user();

        if (request()->ajax()) {
            $user->geopoint = $request->pos;
            $user->save();

            return redirect()->route('hire-cars');
        }
    }

    public function saveCar(Request $request)
    {
        RideRequest::firstOrCreate([
            'driver_id' => $request->driver,
            'passanger_id' => Auth::user()->id,
        ]);

        return redirect()->route('passanger-create-pick-up',['driver'=>$request->driver])->with('success', 'Set pick up point to make order');
    }

    public function createPickUp(Request $request)
    {
        return view('hire-cars.create_pick_up',['driver'=>$request->driver]);
    }

    public function savePickUp(Request $request)
    {
        if (request()->ajax()) { 
            $ride = RideRequest::where([['driver_id',$request->driver],['passanger_id',Auth::user()->id]])->first();

            $ride->current_location = $request->pos;

            $ride->save();

            return redirect()->route('hire-cars')->with('success', 'Pick up point set, set destnation to make order');
        }

        return back()->with('error','Pick Up Point Not Set');
    }
}
