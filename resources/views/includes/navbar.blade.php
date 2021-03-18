<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="{{ route('home') }}">Sharecarz</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="mdi mdi-dots-vertical"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">Home</a>
          </li>
          @auth
            @if (Auth::user()->inRole(['administrator']))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('users.index') }}">Users</a>
                </li>
            @endif
          @endauth
          <!-- Authentication Links -->
                            
            @guest
                <li class="nav-item mx-1">
                    <a class="nav-link btn btn-outline-secondary" href="{{ route('transport-passangers') }}">{{ __('Transport Passangers') }}</a>
                </li>
                <li class="nav-item mx-1">
                    <a class="nav-link btn btn-outline-info" href="{{ route('hire-cars') }}">{{ __('Hire a Car') }}</a>
                </li>
                <li class="nav-item mx-1">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }} <span><i class="mdi mdi-login"></i></span></a>
                </li>
            @else
                @if (Auth::user()->inRole(['administrator','car-owner']))
                    <li class="nav-item mx-1">
                        <a class="nav-link btn btn-outline-secondary" href="{{ route('transport-passangers') }}">{{ __('Transport Passangers') }}</a>
                    </li>
                @endif
                @if (Auth::user()->inRole(['administrator','passanger']))  
                    <li class="nav-item mx-1">
                        <a class="nav-link" href="{{ route('hire-cars-my-rides') }}">{{ __('My Rides') }}</a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link btn btn-outline-info" href="{{ route('hire-cars') }}">{{ __('Hire a Car') }}</a>
                    </li>
                @endif
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
      </div>
    </div>
  </nav>

  {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav> --}}