@extends('layouts.app')

@section('title', __('Pengaturan'))

@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">{{ __('Pengaturan') }}</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('home') }}">{{ __('Home') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active">
                                        {{ __('Pengaturan') }}
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <div class="row">
                    <div class="col-12">
                        @include('account.nav-pills')
                        <!-- profile -->
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h4 class="card-title">{{ __('Ubah Password') }}</h4>
                            </div>
                            <div class="card-body py-2 my-25">
                                <form action="{{ route('user-password.update') }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-12 col-sm-6 col-md-12 mb-1">
                                            <label class="form-label"
                                                for="current_password">{{ __('Password Saat Ini') }}</label>
                                            <div
                                                class="input-group form-password-toggle input-group-merge @error('current_password') is-invalid @enderror">
                                                <input type="password"
                                                    class="form-control @error('current_password') is-invalid @enderror"
                                                    id="current_password" name="current_password" placeholder="············"
                                                    data-msg="Please current password" />
                                                <div class="input-group-text cursor-pointer">
                                                    <i data-feather="eye"></i>
                                                </div>
                                            </div>
                                            @error('current_password')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-sm-6 mb-1">
                                            <label class="form-label" for="password">{{ __('Password Baru') }}</label>
                                            <div
                                                class="input-group form-password-toggle input-group-merge @error('password') is-invalid @enderror">
                                                <input type="password" id="password" name="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    placeholder="············" />
                                                <div class="input-group-text cursor-pointer">
                                                    <i data-feather="eye"></i>
                                                </div>
                                            </div>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-sm-6 mb-1">
                                            <label class="form-label" for="password_confirmation">
                                                {{ __('Konfirmasi Password Baru') }}
                                            </label>
                                            <div class="input-group form-password-toggle input-group-merge">
                                                <input type="password" class="form-control" id="password_confirmation"
                                                    name="password_confirmation" placeholder="············" />
                                                <div class="input-group-text cursor-pointer">
                                                    <i data-feather="eye"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <p class="fw-bolder">{{ __('Ketentuan') }}:</p>
                                            <ul class="ps-1 ms-25">
                                                <li class="mb-50">{{ __('Minimal 8 karakter') }}</li>
                                                <li class="mb-50">{{ __('Terdiri dari huruf besar dan kecil') }}</li>
                                                <li>{{ __('Terdiri dari angka, simbol, atau karakter spasi') }}</li>
                                            </ul>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit"
                                                class="btn btn-primary me-1 mt-1">{{ __('Simpan') }}</button>
                                            <button type="reset"
                                                class="btn btn-outline-secondary mt-1">{{ __('Batal') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
