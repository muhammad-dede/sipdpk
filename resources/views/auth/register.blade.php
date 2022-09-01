@extends('layouts.auth')

@section('title', __('Daftar'))

@section('content')
    <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
        <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img class="img-fluid"
                src="{{ asset('') }}templates/app/app-assets/images/pages/register-v2.svg" alt="Register V2" /></div>
    </div>
    <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
        <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
            <h2 class="card-title fw-bold mb-1">{{ __('Buat Akun') }}</h2>
            <p class="card-text mb-2">{{ __('Masukan data Anda untuk membuat akun') }}!</p>
            <form class="auth-register-form mt-2" action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-1">
                    <label class="form-label" for="name">{{ __('Nama') }}</label>
                    <input class="form-control @error('name') is-invalid @enderror" id="name" type="text"
                        name="name" placeholder="johndoe" aria-describedby="name" autofocus="" tabindex="1"
                        value="{{ old('name') }}" />
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="mb-1">
                    <label class="form-label" for="email">{{ __('Email') }}</label>
                    <input class="form-control @error('email') is-invalid @enderror" id="email" type="text"
                        name="email" placeholder="john@example.com" aria-describedby="email" tabindex="2"
                        value="{{ old('email') }}" />
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="mb-1">
                    <label class="form-label" for="password">{{ __('Password') }}</label>
                    <div class="input-group input-group-merge form-password-toggle @error('password') is-invalid @enderror">
                        <input class="form-control form-control-merge @error('password') is-invalid @enderror"
                            id="password" type="password" name="password" placeholder="············"
                            aria-describedby="password" tabindex="3" />
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
                    <label class="form-label" for="password_confirmation">{{ __('Konfirmasi Password') }}</label>
                    <div class="input-group input-group-merge form-password-toggle">
                        <input class="form-control form-control-merge" id="password_confirmation" type="password"
                            name="password_confirmation" placeholder="············" aria-describedby="password_confirmation"
                            tabindex="4" />
                        <span class="input-group-text cursor-pointer">
                            <i data-feather="eye"></i>
                        </span>
                    </div>
                </div>
                <div class="mb-1">
                    <div class="form-check">
                        <input name="terms" class="form-check-input @error('terms') is-invalid @enderror" id="terms"
                            type="checkbox" tabindex="4" value="1" />
                        <label class="form-check-label" for="terms">{{ __('Saya setuju dengan') }}<a
                                href="#">&nbsp;privacy policy &
                                terms</a></label>
                    </div>
                </div>
                <button class="btn btn-primary w-100" tabindex="5">{{ __('Daftar') }}</button>
            </form>
            @if (Route::has('login'))
                <p class="text-center mt-2">
                    <span>{{ __('Sudah punya akun') }}?</span>
                    <a href="{{ route('login') }}">
                        <span>&nbsp;{{ __('Masuk') }}</span>
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
