@extends('layouts.app')

@section('content')
    <header class="masthead" style="background-image: url('img/car.jpg')">
        <div class="overlay"></div>
        <div class="container" style="position:relative; top:80px">
            @yield('main-content')
        </div>
    </header>
@endsection