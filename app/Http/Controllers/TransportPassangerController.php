<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\RideRequest;

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
        $rides = RideRequest::with('passanger')->where('driver_id',Auth::user()->id)->whereNotIn('status', ['rejected', 'complete'])->get();
        return view('transport-passangers.index',['rides'=>$rides]);
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

    public function approve(Request $request)
    {
        $ride = RideRequest::where([['passanger_id',$request->passanger],['driver_id',Auth::user()->id]])->first();

        $ride->status = 'approved';

        $ride->save();

        return redirect()->route('transport-passangers')->with('success','Ride Request Accepted');
    }

    public function reject(Request $request)
    {
        $ride = RideRequest::where([['passanger_id',$request->passanger],['driver_id',Auth::user()->id]])->first();

        $ride->status = 'rejected';

        $ride->save();

        return redirect()->route('transport-passangers')->with('success','Ride Request Rejected');
    }

    public function complete(Request $request)
    {
        $ride = RideRequest::where([['passanger_id',$request->passanger],['driver_id',Auth::user()->id]])->first();

        $ride->status = 'complete';

        $ride->save();

        return redirect()->route('transport-passangers')->with('success','Ride Request Complete');
    }
}
