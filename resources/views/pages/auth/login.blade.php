@extends('layouts.auth')

@section('title', 'Login')

@section('content')
<section class="section">
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                <div class="login-brand">
                    <img src="{{ asset('assets/img/icon.png') }}" class="icon mb-3" alt="icon">
                    <p class="font-weight-bold text-primary" style="font-size:16px;">{{ env('APP_FULLNAME') }}</p>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4>Login</h4>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}" autocomplete="off">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email/Username</label>
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror"
                                    name="email" tabindex="1" autofocus>
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                {{--  aktifkan ini jika .env email sudah di seting  --}}
                                <div class="d-block">
                                    <label for="password" class="control-label">Password</label>
                                    <div class="float-right">
                                        {{--  <a href="{{ route('password.request') }}" class="text-small">
                                        Lupa Password?
                                        </a> --}}
                                    </div>
                                </div>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    tabindex="2">
                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                    Login
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="simple-footer">
                    Copyright 2024 &copy; {{ env('APP_NAME') }}.
                </div>
            </div>
        </div>
    </div>
</section>
@endsection