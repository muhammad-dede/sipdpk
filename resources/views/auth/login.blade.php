@extends('layouts.auth')

@section('title', __('Masuk'))

@section('content')
    <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
        <div class="w-100 d-lg-flex align-items-center justify-content-center px-5">
            <img class="img-fluid" src="{{ asset('') }}templates/app/app-assets/images/pages/login-v2.svg"
                alt="Login" />
        </div>
    </div>
    <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
        <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
            <h2 class="card-title fw-bold mb-1">{{ __('Masuk') }}&nbsp;{{ config('app.name') }}
            </h2>
            <p class="card-text mb-2">{{ __('Silahkan masuk dengan akun Anda') }}</p>
            <form class="auth-login-form mt-2" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-1">
                    <label class="form-label" for="email">{{ __('Email') }}</label>
                    <input class="form-control @error('email') is-invalid @enderror" id="email" type="text"
                        name="email" placeholder="john@example.com" aria-describedby="email" autofocus="" tabindex="1"
                        value="{{ old('email') }}" />
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="mb-1">
                    <div class="d-flex justify-content-between">
                        <label class="form-label" for="password">{{ __('Password') }}</label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">
                                <small>{{ __('Lupa Password') }}?</small>
                            </a>
                        @endif
                    </div>
                    <div class="input-group input-group-merge form-password-toggle @error('password') is-invalid @enderror">
                        <input class="form-control form-control-merge @error('password') is-invalid @enderror"
                            id="password" type="password" name="password" placeholder="············"
                            aria-describedby="password" tabindex="2" />
                        <span class="input-group-text cursor-pointer">
                            <i data-feather="eye"></i>
                        </span>
                    </div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="mb-1">
                    <div class="form-check">
                        <input name="remember" class="form-check-input" id="remember" type="checkbox" tabindex="3"
                            value="1" {{ old('remember') ? 'checked' : '' }} />
                        <label class="form-check-label" for="remember">
                            {{ __('Ingat Saya') }}</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100" tabindex="4">
                    {{ __('Masuk') }}
                </button>
            </form>
            @if (Route::has('register'))
                <p class="text-center mt-2">
                    <span>{{ __('Belum punya akun') }}?</span>
                    <a href="{{ route('register') }}">
                        <span>&nbsp;{{ __('Buat akun') }}</span>
                    </a>
                </p>
                <div class="divider my-2">
                    <div class="divider-text">{{ __('atau') }}</div>
                </div>
                <div class="auth-footer-btn d-flex justify-content-center">
                    <a class="btn btn-facebook" href="#">
                        <i data-feather="facebook"></i>
                    </a>
                    <a class="btn btn-twitter white" href="#">
                        <i data-feather="twitter"></i>
                    </a>
                    <a class="btn btn-google" href="#">
                        <i data-feather="mail"></i>
                    </a>
                    <a class="btn btn-github" href="#">
                        <i data-feather="github"></i>
                    </a>
                </div>
            @endif
        </div>
    </div>
@endsection
