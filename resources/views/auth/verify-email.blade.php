@extends('layouts.auth')

@section('title', __('Verifikasi Email'))

@section('content')
    <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
        <div class="w-100 d-lg-flex align-items-center justify-content-center px-5">
            <img class="img-fluid"
                src="{{ asset('') }}templates/app/app-assets/images/illustration/verify-email-illustration.svg"
                alt="verify" />
        </div>
    </div>
    <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
        <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
            <h2 class="card-title fw-bolder mb-1">Verifikasi email &#x2709;&#xFE0F;</h2>
            <p class="card-text mb-2">
                Tautan aktivasi akun telah dikirim ke email Anda:
                <span class="fw-bolder">{{ auth()->user()->email }}</span>
                <br>
                Silakan ikuti tautan aktivasi untuk melanjutkan.
            </p>
            @if (session('status') == 'verification-link-sent')
                <div class="text-success">
                    {{ __('Tautan verifikasi email baru telah dikirim ke email Anda!') }}
                </div>
            @endif
            <p>{{ __('Tidak menerima email') }}?</p>
            <form action="{{ route('verification.send') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary w-100">{{ __('Kirim Ulang') }}</button>
            </form>
            <p class="text-center mt-1">
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <span class="text-danger">&nbsp;{{ __('Keluar') }}</span>
                </a>
            </p>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
@endsection
