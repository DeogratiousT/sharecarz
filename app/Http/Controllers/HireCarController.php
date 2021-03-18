<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\RideRequest;
use Freshbitsweb\Laratables\Laratables;
// use App\Laratables\UsersLaratables;

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

    public function show()
    {
        if (request()->ajax()) {
            return Laratables::recordsOf(RideRequest::class, function($query)
                {
                    return $query->where('passanger_id', Auth::user()->id);
                });
        }

        return view('hire-cars.show');
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

            return response()->json(['success'=>'Pick up point set, set destnation to make order','redirect'=>route('passanger-create-destination',['driver'=>$request->driver])]);

            // return redirect()->route('passanger-create-destination',['driver'=>$request->driver])->with('success', 'Pick up point set, set destnation to make order');
        }

        return back()->with('error','Pick Up Point Not Set');
    }

    public function createDestination(Request $request)
    {
        return view('hire-cars.create_destination',['driver'=>$request->driver]);
    }

    public function saveDestination(Request $request)
    {
        if (request()->ajax()) { 
            $ride = RideRequest::where([['driver_id',$request->driver],['passanger_id',Auth::user()->id]])->first();

            $ride->destination = $request->pos;

            $ride->save();

            return response()->json(['success'=>'Destination point set, Order Made, The Car Owner Will Respond Shortly','redirect'=>route('hire-cars')]);
            // return redirect()->route('hire-cars')->with('success', 'Order Made, The Car Owner Will Respond Shortly');
        }

        return back()->with('error','Destination Point Not Set');
    }
}
