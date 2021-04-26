@extends('layouts.app')

@section('content')
<div class="d-flex" id="wrapper">
    <div class="border-right" id="sidebar-wrapper">
        <a href="{{ url('/') }}" style="color: white;">
            <div class="d-flex flex-column justify-content-center">
                <img class="mx-auto my-1" src="{{ asset('images/logo_white.png') }}" alt="Logo TDR" style="height: 30%; width: 30%;">
                <h4 align="center">{{ config('app.name', 'Train Data Recorder') }}</h4>
            </div>
        </a>
        <div class="list-group list-group-flush">
            <a href="{{ url('/') }}" class="list-group-item list-group-item-action">
                <div class="row px-2 py-2">
                    <div class="col-2">
                        <i class="fas fa-tachometer-alt"></i>
                    </div>
                    <div class="col">
                        <p class="mb-0">Dashboard</p>
                    </div>
                </div>
            </a>
            <a href="#" class="list-group-item list-group-item-action">
                <div class="row px-2 py-2">
                    <div class="col-2">
                        <i class="fas fa-desktop"></i>
                    </div>
                    <div class="col">
                        <p class="mb-0">Monitoring</p>
                    </div>
                </div>
            </a>
            <a href="#" class="list-group-item list-group-item-action">
                <div class="row px-2 py-2">
                    <div class="col-2">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="col">
                        <p class="mb-0">Location</p>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <button class="btn btn-transparent" id="menu-toggle">
                <i class="fa fa-bars"></i>
            </button>

            <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button> -->

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
        </nav>

        <div class="container-fluid" style="margin-top: 15px; margin-bottom: 15px;">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
            </div>

            <div class="row">
                <div class="col-xl-4 col-md-12 mb-4">
                    <div class="card shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-top">
                                <div class="col mr-5">
                                    <div class="text-xs font-weight-bold text-uppercase mb-1">Listrik</div>
                                    <div class="row">
                                        <div class="col text-xs">Arus</div>
                                        <div class="col-4 text-right">2</div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-xs">Tegangan</div>
                                        <div class="col-4 text-right">2</div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-xs">Frekuensi</div>
                                        <div class="col-4 text-right">2</div>
                                    </div>
                                    <!-- <div class="h5 mb-0 font-weight-bold text-gray-800">27.5</div> -->
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-bolt fa-2x text-gray-300" style="color: var(--red);"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-12 mb-4">
                    <div class="card shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-top">
                                <div class="col mr-5">
                                    <div class="text-xs font-weight-bold text-uppercase mb-1">Lokasi</div>
                                    <div class="row">
                                        <div class="col text-xs">Latitude</div>
                                        <div class="col-4 text-right">2</div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-xs">Longitude</div>
                                        <div class="col-4 text-right">2</div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-xs">Kecepatan</div>
                                        <div class="col-4 text-right">2</div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-map-marker-alt fa-2x text-gray-300" style="color: var(--red);"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-12 mb-4">
                    <div class="card shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-top">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Waktu Beroperasi</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">27.5</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-stopwatch fa-2x text-gray-300" style="color: var(--red);"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
@endsection
