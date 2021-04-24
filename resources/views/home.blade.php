@extends('layouts.app')

@section('content')
<div class="d-flex" id="wrapper">

    <div class="border-right" id="sidebar-wrapper">
        <a class="navbar-brand" href="{{ url('/') }}" style="color: white;">
            <div>
                <img class="mx-auto" src="{{ asset('images/logo.png') }}" alt="Logo TDR" style="height: 50%; width: 50%;">
                <h4 align="center">{{ config('app.name', 'Train Data Recorder') }}</h4>
            </div>
        </a>
      <div class="list-group list-group-flush">
        <a href="#" class="list-group-item list-group-item-action">
            <div>
                <i class="fas fa-tachometer-alt"></i>
                <p class="mb-0">Dashboard</p>
            </div>
        </a>
        <a href="#" class="list-group-item list-group-item-action">
            <div class="px-0 py-0">
                <i class="fas fa-desktop"></i>
                <p class="mb-0">Monitoring</p>
            </div>
        </a>
        <a href="#" class="list-group-item list-group-item-action">
             <div class="px-0 py-0">
                <i class="fas fa-map-marker-alt"></i>
                <p class="mb-0">Location</p>
            </div>
        </a>
      </div>
    </div>

    <div id="page-content-wrapper">

        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <button class="btn btn-primary" id="menu-toggle">
                <i class="fa fa-bars"></i>
            </button>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif
                        
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                @if (is_null(Auth::user()->avatar))
                                    <img id="profile-avatar" class="img-profile rounded-circle mr-2" src="{{ asset('images/avatar_person.png') }}" style="background-color: {{ Auth::user()->color }};" 
                                    width="32" height="32">
                                @else
                                    <img id="profile-avatar" class="img-profile rounded-circle mr-2" src="{{ Auth::user()->avatar }}"
                                    width="32" height="32">
                                @endif
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user"></i>
                                    Profile
                                </a>

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();" style="color: var(--red);">
                                    <i class="fas fa-sign-out-alt"></i>
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
        </nav>

        <div class="container-fluid">
            <h1 class="mt-4">Simple Sidebar</h1>
            <p>The starting state of the menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will change.</p>
            <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>. The top navbar is optional, and just for demonstration. Just create an element with the <code>#menu-toggle</code> ID which will toggle the menu when clicked.</p>
        </div>
    </div>
  </div>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

<!-- <div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img class="mx-auto my-auto" src="{{ asset('images/logo.png') }}" alt="Logo TDR" style="height: 2em; width: 2em;">
                {{ config('app.name', 'Train Data Recorder') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">

                </ul>

                <ul class="navbar-nav ml-auto">
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif
                        
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                @if (is_null(Auth::user()->avatar))
                                    <img id="profile-avatar" class="img-profile rounded-circle mr-2" src="{{ asset('images/avatar_person.png') }}" style="background-color: {{ Auth::user()->color }};" 
                                    width="32" height="32">
                                @else
                                    <img id="profile-avatar" class="img-profile rounded-circle mr-2" src="{{ Auth::user()->avatar }}"
                                    width="32" height="32">
                                @endif
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user"></i>
                                    Profile
                                </a>

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();" style="color: var(--red);">
                                    <i class="fas fa-sign-out-alt"></i>
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
</div> -->
@endsection
