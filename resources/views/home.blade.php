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
        <p style="text-align:justify">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsam sunt cumque aut cupiditate eum aliquam sapiente officia sed nostrum non provident quos, itaque error, incidunt, minus dolorem quam nobis maiores illum temporibus voluptate assumenda. Dolor, reprehenderit quidem, facilis culpa sint expedita porro at cupiditate, exercitationem ea architecto id voluptatibus unde velit? Dolores labore expedita vitae voluptas explicabo unde! Ducimus earum qui consectetur consequatur eius soluta dignissimos culpa maiores commodi, a dicta voluptas doloribus numquam quam officia! Fugiat deserunt inventore ut, repudiandae in non eaque doloribus exercitationem laboriosam quas suscipit? Recusandae saepe quas sunt temporibus unde ratione ad. Doloribus voluptas sit quae ratione eum obcaecati assumenda voluptatibus illum velit? Laudantium dolores itaque beatae illum, libero modi deleniti incidunt similique, minima, voluptatibus odit nostrum nisi asperiores illo perspiciatis vel unde facere maxime at fuga repellat aspernatur? Libero qui rerum officiis expedita architecto quasi odit corrupti, voluptatem, minima maiores facere nesciunt optio ullam!</p>
    </div>
@endsection
