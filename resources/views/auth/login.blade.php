@extends('layouts.app')

@section('styles')
<style type="text/css">
    html, body {
        height: 100%;
        margin: 0;
    }

    #app{
        height: 100%;
        background-image: url({{ asset('images/background_login.jpg') }});
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
                            <h3 align="center" style="font-weight: 600;">Selamat datang di <br/> {{config('app.name')}}</h3>
                        </div>

                        <form method="POST" action="{{ route('login') }}" style="text-align: center;">
                            @csrf

                            <div class="form-group row mb-3">
                                <div class="col-12">
                                    <input id="id-pegawai" type="text" class="form-control @error('id_pegawai') is-invalid @enderror" name="id_pegawai" value="{{ old('id_pegawai') }}" required autocomplete="id_pegawai" autofocus>

                                    @error('id_pegawai')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <div class="col-12">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-5">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary w-100">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <p>Ahmad Eka Fauzi © 2021</p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
