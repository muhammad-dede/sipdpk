@extends('layouts.app')

@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section id="dashboard-ecommerce">
                    <div class="row match-height">
                        <div class="col-lg-4 col-md-12 col-12">
                            <div class="card card-developer-meetup">
                                <div class="meetup-img-wrapper rounded-top text-center">
                                    <img src="{{ asset('') }}templates/app/app-assets/images/illustration/email.svg"
                                        alt="Meeting Pic" height="170" />
                                </div>
                                <div class="card-body">
                                    <div class="meetup-header d-flex align-items-center">
                                        <div class="meetup-day">
                                            <h6 class="mb-0">
                                                {{ \Carbon\Carbon::parse(date('Y-m-d'))->isoFormat('dd') }}
                                            </h6>
                                            <h3 class="mb-0">
                                                {{ \Carbon\Carbon::parse(date('Y-m-d'))->isoFormat('D') }}
                                            </h3>
                                        </div>
                                        <div class="my-auto">
                                            <h4 class="card-title mb-25">{{ auth()->user()->name }}</h4>
                                            <p class="card-text mb-0">{{ auth()->user()->email }}</p>
                                        </div>
                                    </div>
                                    <div class="mt-0">
                                        <a href="{{ route('account.profile') }}"
                                            class="btn btn-primary">{{ __('Pengaturan') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8 col-md-6 col-12">
                            <div class="card card-statistics">
                                <div class="card-header">
                                    <h4 class="card-title">{{ __('Statistik') }}</h4>
                                </div>
                                <div class="card-body statistics-body">
                                    <div class="row">
                                        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                            <div class="d-flex flex-row">
                                                <div class="avatar bg-light-primary me-2">
                                                    <div class="avatar-content">
                                                        <i data-feather='book-open' class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="my-auto">
                                                    <h4 class="fw-bolder mb-0">{{ $data_rc->count() }}</h4>
                                                    <p class="card-text font-small-3 mb-0">RC</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                            <div class="d-flex flex-row">
                                                <div class="avatar bg-light-info me-2">
                                                    <div class="avatar-content">
                                                        <i data-feather='file-text' class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="my-auto">
                                                    <h4 class="fw-bolder mb-0">{{ $data_dpa->count() }}</h4>
                                                    <p class="card-text font-small-3 mb-0">DPA</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                                            <div class="d-flex flex-row">
                                                <div class="avatar bg-light-danger me-2">
                                                    <div class="avatar-content">
                                                        <i data-feather='archive' class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="my-auto">
                                                    <h4 class="fw-bolder mb-0">{{ $data_samsat->count() }}</h4>
                                                    <p class="card-text font-small-3 mb-0">Samsat</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-6 col-12">
                                            <div class="d-flex flex-row">
                                                <div class="avatar bg-light-success me-2">
                                                    <div class="avatar-content">
                                                        <i data-feather='layout' class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="my-auto">
                                                    <h4 class="fw-bolder mb-0">{{ $data_stnk->count() }}</h4>
                                                    <p class="card-text font-small-3 mb-0">STNK</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
@endsection
