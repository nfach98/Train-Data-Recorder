@extends('layouts.app')

@section('head')
<style type="text/css">
    html, body {
        height: 100%;
        margin: 0;
    }

    #app{
        height: 100vh;
    }

    .background {
        position: fixed; 
        top: 0; 
        left: 0; 
        width: 100vw; 
        height: 100vh;
        z-index: -1;
    }

    .background img {
        position: absolute; 
        top: 0; 
        left: 0; 
        right: 0; 
        bottom: 0; 
        margin: auto; 
        min-width: 50%;
        min-height: 50%;
    }

    .form-icon {
        float: right;
        margin-left: -25px;
        margin-right: .75rem;
        margin-top: -1.65rem;
        position: relative;
        z-index: 2;
    }
</style>
@endsection

@section('content')
<div id="app">
    <div class="container h-100">
        <div class="row d-flex h-100">
            <div class="col-md-4 my-auto mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <img class="mx-auto my-auto" src="{{ asset('images/logo.png') }}" alt="Logo TDR" style="height: 35%; width: 35%;">
                        </div>

                        <div class="col my-3 mx-auto">
                            <h3 align="center" style="font-weight: 600;">{{ __('sign.welcome_login') }} <br/> {{config('app.name')}}</h3>
                        </div>

                        <form method="POST" action="{{ route('login') }}" style="text-align: center;">
                            @csrf

                            <div class="form-group row mb-3">
                                <div class="col-12">
                                    <input id="id-pegawai" type="text" class="form-control @error('id_pegawai') is-invalid @enderror" name="id_pegawai" value="{{ old('id_pegawai') }}" required autocomplete="id_pegawai" placeholder="ID Pegawai">

                                    @error('id_pegawai')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <div class="col-12">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"  placeholder="Password" data-toggle="password" style="padding-right: 3rem">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <span class="fas fa-eye form-icon" id="toggle-password"></span>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <div class="col-12">
                                    <div class="custom-control custom-checkbox mb-3">
                                      <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                      <label class="custom-control-label shadow-none" for="remember">
                                          {{ __('sign.remember_me') }}
                                      </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary shadow-none w-100">
                                        {{ __('sign.login') }}
                                    </button>
                                </div>
                            </div>

                            <div class="form-group mb-5">
                                <p align="center">{{ __('sign.dont_have_acc') }} <a href="{{ url('/register') }}" style="font-weight: 600;">{{ __('sign.register') }}</a></p>
                            </div>

                            <div class="form-group mb-0">
                                <p class="mb-0" style="font-size: .8em;">Ahmad Eka Fauzi © 2021</p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <img class="background" src="{{ asset('images/background_login.jpg') }}">
</div>

<script type="text/javascript">
    $("#toggle-password").click(function() {

      $(this).toggleClass("fa-eye fa-eye-slash");
      var input = $($(this).attr("toggle"));
      if ($("#password").attr("type") == "password") {
        $("#password").attr("type", "text");
        $(this).css("color", "var(--red)");
      } else {
        $("#password").attr("type", "password");
        $(this).css("color", "black");
      }
    });
</script>
@endsection
