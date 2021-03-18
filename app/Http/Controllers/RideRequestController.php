<?php

namespace App\Http\Controllers;

use App\Models\RideRequest;
use Illuminate\Http\Request;

class RideRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (isset($request->driver)) {
           dd($request->driver); 
            return view('hire-cars.create_my_location');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RideRequest  $rideRequest
     * @return \Illuminate\Http\Response
     */
    public function show(RideRequest $rideRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RideRequest  $rideRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(RideRequest $rideRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RideRequest  $rideRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RideRequest $rideRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RideRequest  $rideRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(RideRequest $rideRequest)
    {
        //
    }
}
