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
            <div class="col-10 my-auto mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5 my-auto">
                                <div class="row mb-2">
                                    <img class="mx-auto my-auto" src="{{ asset('images/logo.png') }}" alt="Logo TDR" style="height: 35%; width: 35%;">
                                </div>
                                
                                <div class="row mb-3">
                                    <h3 align="center" style="font-weight: 600;">Daftar untuk bergabung di {{config('app.name')}}</h3>
                                </div>
                            </div>

                            <div class="col-md-7">
                                <form method="POST" action="{{ route('register') }}" style="text-align: center;">
                                    @csrf

                                    <div class="form-group row mb-3">
                                        <div class="col-12">
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Nama">

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

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

                                    <div class="form-group row mb-3">
                                        <div class="col-12">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"  placeholder="Password" data-toggle="password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-5">
                                        <div class="col-12">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Konfirmasi Password" required autocomplete="new-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary shadow-none w-100">
                                                {{ __('Register') }}
                                            </button>
                                        </div>
                                    </div>

                                    <div class="form-group mb-5">
                                        <p align="center">Sudah punya akun? <a href="{{ url('/login') }}" style="font-weight: 600;">Masuk</a></p>
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
    </div>
</div>

<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="id-pegawai" class="col-md-4 col-form-label text-md-right">ID Pegawai</label>

                            <div class="col-md-6">
                                <input id="id-pegawai" type="text" class="form-control @error('id_pegawai') is-invalid @enderror" name="id_pegawai" value="{{ old('id_pegawai') }}" required autocomplete="id-pegawai" autofocus>

                                @error('id_pegawai')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
