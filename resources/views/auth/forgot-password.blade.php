@extends('layouts.auth')

@section('title', __('Lupa Password'))

@section('content')
    <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
        <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img class="img-fluid"
                src="{{ asset('') }}templates/app/app-assets/images/pages/forgot-password-v2.svg" alt="Forgot password" />
        </div>
    </div>
    <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
        <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
            <h2 class="card-title fw-bold mb-1">{{ __('Lupa Password') }}? 🔒</h2>
            <p class="card-text mb-2">
                {{ __('Masukan email Anda dan kami akan mengirimkan instruksi untuk mereset password Anda') }}
            </p>
            @if (session('status'))
                <div class="text-success">
                    {{ session('status') }}
                </div>
            @endif
            <form class="auth-forgot-password-form mt-2" action="{{ route('password.email') }}" method="POST">
                @csrf
                <div class="mb-1">
                    <label class="form-label" for="email">Email</label>
                    <input class="form-control @error('email') is-invalid @enderror" id="email" type="text"
                        name="email" placeholder="john@example.com" aria-describedby="email" autofocus="" tabindex="1"
                        {{ old('email') }} />
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary w-100" tabindex="2">
                    {{ __('Kirim Tautan Reset Password') }}
                </button>
            </form>
            <p class="text-center mt-2">
                <a href="{{ route('login') }}">
                    <i data-feather="chevron-left"></i>
                    {{ __('Kembali') }}
                </a>
            </p>
        </div>
    </div>
@endsection
