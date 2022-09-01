@extends('layouts.app')

@section('title', __('Tambah User'))

@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">{{ __('Tambah User') }}</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Home') }}</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('user.index') }}">{{ __('User') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active">
                                        {{ __('Tambah') }}
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section id="basic-horizontal-layouts">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">{{ __('Form User') }}</h4>
                                </div>
                                <div class="card-body">
                                    <div class="fw-bold mb-2 text-secondary">
                                        <span>{{ __('Input dengan tanda ') }}</span>
                                        <span class="text-danger">*</span>
                                        <span>{{ __('wajib diisi!') }}</span>
                                    </div>
                                    <form class="form form-horizontal" action="{{ route('user.store') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="name">
                                                            {{ __('Nama') }}
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="text" id="name"
                                                            class="form-control @error('name') is-invalid @enderror"
                                                            name="name" placeholder="{{ __('Nama') }}"
                                                            value="{{ old('name') }}" />
                                                        @error('name')
                                                            <div class="invalid-feedback" role="alert">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="email">
                                                            {{ __('Email') }}
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="email" id="email"
                                                            class="form-control @error('email') is-invalid @enderror"
                                                            name="email" placeholder="{{ __('Email') }}"
                                                            value="{{ old('email') }}" />
                                                        @error('email')
                                                            <div class="invalid-feedback" role="alert">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="password">
                                                            {{ __('Password') }}
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="password" id="password"
                                                            class="form-control @error('password') is-invalid @enderror"
                                                            name="password" placeholder="{{ __('Password') }}" />
                                                        @error('password')
                                                            <div class="invalid-feedback" role="alert">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="role">
                                                            {{ __('Role') }}
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <select name="role" id="role"
                                                            class="form-select @error('role') is-invalid @enderror">
                                                            <option value="">--Pilih--</option>
                                                            @foreach ($data_role as $item)
                                                                <option value="{{ $item->name }}"
                                                                    {{ old('role') == $item->name ? 'selected' : '' }}>
                                                                    {{ $item->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('role')
                                                            <div class="invalid-feedback" role="alert">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-9 offset-sm-3 mt-1">
                                                <button type="submit"
                                                    class="btn btn-primary me-1">{{ __('Simpan') }}</button>
                                                <a href="{{ route('user.index') }}"
                                                    class="btn btn-outline-secondary">{{ __('Kembali') }}</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
