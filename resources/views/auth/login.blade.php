<!-- resources/views/auth/login.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container" style="background-image: url('{{ asset('img/Login-image.png') }}'); background-size: cover; background-position: center; min-height: 100vh;  min-width: 100vw; display: flex; align-items: center; justify-content: center; position: relative;">
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5);"></div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
                    <div class="card" style="width: 600px; background-color: #f5f5f5; border-radius: 15px">
                        <div class="card-header text-center" style="padding-top: 15px; padding-bottom: 15px;">
                            <img src="{{ asset('img/flash 1.png') }}" alt="Logo" style="width: 20px; height: 20px; middle; margin-right: 8px;">
                            <strong>{{ __('Electric Cooperative System') }}</strong>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="email" class="col-form-label">{{ __('Username') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="password" class="col-form-label">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="d-flex justify-content-between mb-3">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link p-0 text-black" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>

                                <div class="d-flex justify-content-center" style="background-color: #F5A738; border-radius: 10px;">
                                    <button type="submit" class="btn w-100 text-white" style="font-weight: bold">
                                        {{ __('Login') }}
                                    </button>
                                </div>

                                <div class="text-center mt-3">
                                    <p style="font-size: 13px; margin: 0;">All Rights Reserved 2024</p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>

@endsection
