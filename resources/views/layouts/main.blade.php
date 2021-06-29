@extends('layouts.app')

@section('head')
  @yield('script')
@endsection

@section('content')
  <!-- <div class="d-flex" id="wrapper">
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
                          <p class="font-weight-bold mb-0">Dashboard</p>
                      </div>
                  </div>
              </a>

              <a class="list-group-item list-group-item-action" data-toggle="collapse" href="#menu-monitoring" role="button" aria-expanded="false" aria-controls="menu-monitoring">
                  <div class="row px-2 py-2">
                      <div class="col-2">
                          <i class="fas fa-desktop"></i>
                      </div>
                      <div class="col">
                          <p class="font-weight-bold mb-0">Monitoring</p>
                      </div>
                  </div>
              </a>

              <div class="collapse list-group list-group-flush" id="menu-monitoring">
                  <a href="{{ url('/monitoring') }}" class="list-group-item list-group-item-action">
                      <div class="row px-2">
                          <div class="col">
                              <p class="mb-0">Motor Car 1</p>
                          </div>
                      </div>
                  </a>

                  <a href="{{ url('/monitoring') }}" class="list-group-item list-group-item-action">
                      <div class="row px-2">
                          <div class="col">
                              <p class="mb-0">Motor 1</p>
                          </div>
                      </div>
                  </a>

                  <a href="{{ url('/monitoring') }}" class="list-group-item list-group-item-action">
                      <div class="row px-2">
                          <div class="col">
                              <p class="mb-0">Trailer Car 1</p>
                          </div>
                      </div>
                  </a>
              </div>

              <a href="{{ url('/location') }}" class="list-group-item list-group-item-action">
                  <div class="row px-2 py-2">
                      <div class="col-2">
                          <i class="fas fa-map-marker-alt"></i>
                      </div>
                      <div class="col">
                          <p class="font-weight-bold mb-0">Location</p>
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

              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                  <span class="navbar-toggler-icon"></span>
              </button>

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

      </div>
  </div> -->

  <div class="sidebar">
      <ul class="sidebar-nav">
         <!--  <a href="{{ url('/') }}" class="logo" style="color: white;">
              <div class="d-flex flex-column justify-content-center">
                  <img class="mx-auto my-1" src="{{ asset('images/logo_white.png') }}" alt="Logo TDR" style="height: 50%; width: 50%;">
                  <h4 class="link-text" align="center">{{ config('app.name', 'Train Data Recorder') }}</h4>
              </div>
          </a> -->
          <li class="logo">
            <img src="{{ asset('images/logo_white.png') }}" alt="Logo TDR">
          </li>

          <li class="side-item">
            <a href="{{ url('/') }}" class="side-link">
              <i class="fas fa-tachometer-alt"></i>
              <span class="link-text">Dashboard</span>
            </a>
          </li>

          <li class="side-item side-dropdown">
            <div class="side-link">
              <i class="fas fa-desktop"></i>
              <span class="link-text">Monitoring</span>
            </div>
          </li>

          <div class="side-dropdown-group">
            <div class="side-item">
              <a href="{{ url('/monitoring/motor') }}" class="side-sublink">
                <span class="link-text">Motor {{ Auth::user()->id_train }}</span>
              </a>
            </div>

            <div class="side-item">
              <a href="{{ url('/monitoring/motor-car') }}" class="side-sublink">
                <span class="link-text">Motor Car {{ Auth::user()->id_train }}</span>
              </a>
            </div>

            <div class="side-item">
              <a href="{{ url('/monitoring/trailer') }}" class="side-sublink">
                <span class="link-text">Trailer {{ Auth::user()->id_train }}</span>
              </a>
            </div>
          </div>

          <li class="side-item">
              <a href="{{ url('/location') }}" class="side-link">
                <i class="fas fa-map-marker-alt"></i>
                <span class="link-text">Location</span>
              </a>
          </li>
      </ul>
  </div>

  <main>
      <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
          <!-- <button class="btn btn-transparent" id="menu-toggle">
              <i class="fa fa-bars"></i>
          </button>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
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

      @yield('page')
  </main>

  <script>
    var dropdownGroupDisplay = "none";

    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });

    var dropdown = document.getElementsByClassName("side-dropdown");
    var i;

    for (i = 0; i < dropdown.length; i++) {
      dropdown[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var dropdownContent = this.nextElementSibling;
        if (dropdownContent.style.display === "block") {
          dropdownGroupDisplay = "none";
          dropdownContent.style.display = "none";
          if (typeof(Storage) !== "undefined") {
            sessionStorage.setItem("dropdownGroupDisplay", dropdownGroupDisplay);
          }
        } 
        else {
          dropdownGroupDisplay = "block";
          dropdownContent.style.display = "block";
          if (typeof(Storage) !== "undefined") {
            sessionStorage.setItem("dropdownGroupDisplay", dropdownGroupDisplay);
          }
        }
      });
    }

    $(".sidebar").mouseleave(function(e) {
      $(".side-dropdown-group").css("display", "none");
      console.log("AAA");
    });

    $(".sidebar").mouseenter(function(e) {
      $(".side-dropdown-group").css("display", sessionStorage.getItem("dropdownGroupDisplay"));
      console.log("AAA");
    });
  </script>
@endsection