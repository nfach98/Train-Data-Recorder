@extends('layouts.app')

@section('head')
<style type="text/css">
    html, body {
        height: 100%;
        margin: 0;
    }

    #app{
        height: 100%;
        background-image: url("{{ asset('images/background_login.jpg') }}");
        background-repeat:no-repeat;
        background-size:cover;
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
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"  placeholder="Password" data-toggle="password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
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
</div>
@endsection
