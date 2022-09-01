@extends('layouts.app')

@section('title', __('Tambah Pertelaan Arsip'))

@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">{{ __('Tambah Pertelaan Arsip') }}</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('home') }}">{{ __('Home') }}</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('dpa.index') }}">{{ __('Daftar Pertelaan Arsip') }}</a>
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
                                    <h4 class="card-title">{{ __('Daftar Pertelaan Arsip') }}</h4>
                                </div>
                                <div class="card-body">
                                    <div class="fw-bold mb-2 text-secondary">
                                        <span>{{ __('Data Record Centre Yang belum diarsipkan ') }}</span>
                                    </div>
                                    <form class="form form-horizontal" action="{{ route('dpa.store') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <table class="table">
                                                        <thead>
                                                            <th>No Polisi</th>
                                                            <th>Nama</th>
                                                            <th>Tanggal Awal PKB</th>
                                                            <th>Tanggal Akhir PKB</th>
                                                            <th>RAK</th>
                                                        </thead>
                                                        <tbody>
                                                            @forelse ($data_rc as $item)
                                                                <tr>
                                                                    <td>
                                                                        {{ $item->stnk ? $item->stnk->nopol : '-' }}
                                                                    </td>
                                                                    <td>
                                                                        {{ $item->stnk ? $item->stnk->nama : '-' }}
                                                                    </td>
                                                                    <td>{{ $item->stnk ? \Carbon\Carbon::parse($item->stnk->tgl_awal_pkb)->isoFormat('D MMMM Y') : '-' }}
                                                                    </td>
                                                                    <td>
                                                                        {{ \Carbon\Carbon::parse($item->tgl_akhir_pkb)->isoFormat('D MMMM Y') }}
                                                                    </td>
                                                                    <td>
                                                                        <input type="hidden" name="id_rc[]"
                                                                            value="{{ $item->id }}">
                                                                        <input type="hidden" name="id_stnk[]"
                                                                            value="{{ $item->id_stnk }}">
                                                                        <select name="id_rak[]" class="form-select">
                                                                            <option></option>
                                                                            @foreach ($data_rak as $item)
                                                                                <option value="{{ $item->id }}"
                                                                                    {{ old('id_rak') == $item->id ? 'selected' : '' }}>
                                                                                    {{ $item->kode }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                            @empty
                                                                <tr>
                                                                    <td colspan="5" class="text-center">
                                                                        {{ __('Tidak ada Record Centre') }}
                                                                    </td>
                                                                </tr>
                                                            @endforelse
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 mt-1">
                                                <button type="submit"
                                                    class="btn btn-primary me-1">{{ __('Simpan') }}</button>
                                                <a href="{{ route('dpa.index') }}"
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
