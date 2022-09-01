@extends('layouts.app')

@section('title', __('Ubah Lokasi'))

@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">{{ __('Ubah Lokasi') }}</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('home') }}">{{ __('Home') }}</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('lokasi.index') }}">{{ __('Lokasi') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active">
                                        {{ __('Ubah') }}
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
                                    <h4 class="card-title">{{ __('Form Lokasi') }}</h4>
                                </div>
                                <div class="card-body">
                                    <div class="fw-bold mb-2 text-secondary">
                                        <span>{{ __('Input dengan tanda ') }}</span>
                                        <span class="text-danger">*</span>
                                        <span>{{ __('wajib diisi!') }}</span>
                                    </div>
                                    <form class="form form-horizontal" action="{{ route('lokasi.update', $lokasi->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="kode">
                                                            {{ __('Kode') }}
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="text" id="kode"
                                                            class="form-control @error('kode') is-invalid @enderror"
                                                            name="kode" placeholder="{{ __('Kode') }}"
                                                            value="{{ old('kode') ?? $lokasi->kode }}" />
                                                        @error('kode')
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
                                                        <label class="col-form-label" for="nama">
                                                            {{ __('Nama') }}
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="text" id="nama"
                                                            class="form-control @error('nama') is-invalid @enderror"
                                                            name="nama" placeholder="{{ __('Nama') }}"
                                                            value="{{ old('nama') ?? $lokasi->nama }}" />
                                                        @error('nama')
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
                                                <a href="{{ route('lokasi.index') }}"
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
