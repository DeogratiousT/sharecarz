@extends('layouts.app')

@section('content')
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/car.jpg')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>Sharecarz</h1>
                    <span class="subheading">Enjoy Safe Trips with us</span>
                    @guest
                        <span>
                            <a href="{{ route('transport-passangers') }}" class="btn btn-outline-dark mt-3 text-light">Transport Passangers</a>
                            <a href="{{ route('hire-cars') }}" class="btn btn-outline-info mt-3 text-light">Hire a Car</a>
                        </span>
                    @else
                        <span>
                            @if (Auth::user()->inRole(['administrator','car-owner']))
                                <a href="{{ route('transport-passangers') }}" class="btn btn-outline-dark mt-3 text-light">Transport Passangers</a>                                
                            @endif
                            @if (Auth::user()->inRole(['administrator','passanger']))
                                <a href="{{ route('hire-cars') }}" class="btn btn-outline-info mt-3 text-light">Hire a Car</a>
                            @endif
                        </span> 
                    @endguest
                </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <h2 class="post-title" style="text-align:center">ABOUT US</h2>
        <p style="text-align:justify">ShareCarz is a web based application that creates a carpooling (ridesharing) platform. The application enbles drivers to register for ShareCarz and duly update their travel details accordingly. Travelers access carpooling details from the platform and also include their choices on the kind of person they prefer for the journey. Drivers can either accept or decline their choices according to the specifications of travel partner’s indicated. The platform is overseen and regulated by the administrators who are responsible for solid performance of the platform.</p>
    </div>
@endsection
