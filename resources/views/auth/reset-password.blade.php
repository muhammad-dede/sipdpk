@extends('layouts.auth')

@section('title', __('Reset Password'))

@section('content')
<div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
    <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img class="img-fluid"
            src="{{ asset('') }}templates/app/app-assets/images/pages/reset-password-v2.svg" alt="Reset" />
    </div>
</div>
<div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
    <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
        <h2 class="card-title fw-bold mb-1">{{ __('Reset Password') }} 🔒</h2>
        <p class="card-text mb-2">
            {{ __('Password baru Anda harus berbeda dari password yang digunakan sebelumnya') }}</p>
        <form class="auth-reset-password-form mt-2" action="{{ route('password.update') }}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
            <div class="mb-1">
                <label class="form-label" for="email">{{ __('Email') }}</label>
                <input class="form-control @error('email') is-invalid @enderror" id="email" type="text"
                    name="email" placeholder="john@example.com" aria-describedby="email" tabindex="1"
                    value="{{ old('email') ?? $request->email }}" />
                @error('email')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
                @enderror
            </div>
            <div class="mb-1">
                <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">{{ __('Password Baru') }}</label>
                </div>
                <div
                    class="input-group input-group-merge form-password-toggle  @error('password') is-invalid @enderror">
                    <input class="form-control form-control-merge  @error('password') is-invalid @enderror"
                        id="password" type="password" name="password" placeholder="············"
                        aria-describedby="password" autofocus="" tabindex="2" />
                    <span
                        class="input-group-text cursor-pointer">
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
                <div class="d-flex justify-content-between">
                    <label class="form-label" for="password_confirmation">{{ __('Konfirmasi Password Baru') }}</label>
                </div>
                <div class="input-group input-group-merge form-password-toggle">
                    <input class="form-control form-control-merge" id="password_confirmation" type="password"
                        name="password_confirmation" placeholder="············" aria-describedby="password_confirmation"
                        tabindex="3" /><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-100" tabindex="3">{{ __('Reset Password') }}</button>
        </form>
        <p class="text-center mt-2">
            <a href="{{ route('login') }}">
                <i data-feather="chevron-left"></i>
                {{ __('Masuk') }}
            </a>
        </p>
    </div>
</div>
@endsection
