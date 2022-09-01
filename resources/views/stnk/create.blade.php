@extends('layouts.app')

@section('title', __('Tambah STNK'))

@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">{{ __('Tambah STNK') }}</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('home') }}">{{ __('Home') }}</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('stnk.index') }}">{{ __('STNK') }}</a>
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
                                    <h4 class="card-title">{{ __('Form STNK') }}</h4>
                                </div>
                                <div class="card-body">
                                    <div class="fw-bold mb-2 text-secondary">
                                        <span>{{ __('Input dengan tanda ') }}</span>
                                        <span class="text-danger">*</span>
                                        <span>{{ __('wajib diisi!') }}</span>
                                    </div>
                                    <form class="form form-horizontal" action="{{ route('stnk.store') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="nopol">
                                                            {{ __('No Polisi') }}
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="text" id="nopol"
                                                            class="form-control @error('nopol') is-invalid @enderror"
                                                            name="nopol" placeholder="{{ __('No Polisi') }}"
                                                            value="{{ old('nopol') }}" />
                                                        @error('nopol')
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
                                                            value="{{ old('nama') }}" />
                                                        @error('nama')
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
                                                        <label class="col-form-label" for="alamat">
                                                            {{ __('Alamat') }}
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" cols="30"
                                                            rows="3" placeholder="{{ __('Alamat') }}">{{ old('alamat') }}</textarea>
                                                        @error('alamat')
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
                                                        <label class="col-form-label" for="tgl_awal_pkb">
                                                            {{ __('Tanggal Awal PKB') }}
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="date" id="tgl_awal_pkb"
                                                            class="form-control @error('tgl_awal_pkb') is-invalid @enderror"
                                                            name="tgl_awal_pkb" placeholder="{{ __('Tanggal Awal PKB') }}"
                                                            value="{{ old('tgl_awal_pkb') }}" />
                                                        @error('tgl_awal_pkb')
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
                                                        <label class="col-form-label" for="id_samsat">
                                                            {{ __('Samsat') }}
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <select name="id_samsat" class="select2 form-select" id="id_samsat">
                                                            <option></option>
                                                            @foreach ($data_samsat as $item)
                                                                <option value="{{ $item->id }}"
                                                                    {{ old('id_samsat') == $item->id ? 'selected' : '' }}>
                                                                    {{ $item->uptd_gerai }} - {{ $item->wilayah }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('id_samsat')
                                                            <small class="text-danger" role="alert">
                                                                {{ $message }}
                                                            </small>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-9 offset-sm-3 mt-1">
                                                <button type="submit"
                                                    class="btn btn-primary me-1">{{ __('Simpan') }}</button>
                                                <a href="{{ route('stnk.index') }}"
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

@push('js')
    <script>
        $(document).ready(function() {
            $('.select2').each(function() {
                var $this = $(this);
                $this.wrap('<div class="position-relative"></div>');
                $this.select2({
                    placeholder: "{{ __('Samsat') }}",
                    allowClear: true,
                    dropdownAutoWidth: true,
                    width: '100%',
                    dropdownParent: $this.parent()
                });
            });
        });
    </script>
@endpush
