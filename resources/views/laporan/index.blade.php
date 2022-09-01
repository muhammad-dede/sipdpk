@extends('layouts.app')

@section('title', __('Laporan Daftar Pertelaan Arsip'))

@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">{{ __('Laporan Daftar Pertelaan Arsip') }}</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('home') }}">{{ __('Home') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active">
                                        {{ __('Laporan Daftar Pertelaan Arsip') }}
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section id="responsive-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-datatable px-1 mt-1">
                                    <form class="row pt-1 form" action="{{ route('laporan.index') }}" method="GET">
                                        <div class="col-auto mb-1">
                                            <label for="start_date" class="form-label">Dari Tanggal</label>
                                            <input name="start_date" type="date" class="form-control" id="start_date"
                                                value="{{ $start_date }}">
                                        </div>
                                        <div class="col-auto mb-1">
                                            <label for="end_date" class="form-label">Hingga Tanggal</label>
                                            <input name="end_date" type="date" class="form-control" id="end_date"
                                                value="{{ $end_date }}">
                                        </div>
                                        <div class="col-auto mb-1">
                                            <label for="rak" class="form-label">RAK</label>
                                            <select name="rak" class="form-select" id="rak">
                                                <option value="">--Pilih--</option>
                                                @foreach ($data_rak as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ $rak == $item->id ? 'selected' : '' }}>
                                                        {{ $item->kode }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-auto mb-1">
                                            <label class="form-label">.</label>
                                            <button type="submit"
                                                class="btn btn-primary form-control btn-filter">Filter</button>
                                        </div>
                                        <div class="col-auto mb-1">
                                            <label class="form-label">.</label>
                                            <button type="submit"
                                                class="btn btn-danger form-control btn-cetak">Cetak</button>
                                        </div>
                                    </form>
                                    <table class="dataTable table">
                                        <thead>
                                            <tr>
                                                <th>NO POLISI</th>
                                                <th>NAMA</th>
                                                <th>ALAMAT</th>
                                                <th>TANGGAL AWAL PKB</th>
                                                <th>TANGGAL AKHIR PKB</th>
                                                <th>RAK</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($data as $item)
                                                <tr>
                                                    <td>
                                                        {{ $item->stnk ? $item->stnk->nopol : '-' }}
                                                    </td>
                                                    <td>{{ $item->stnk ? $item->stnk->nama : '-' }}</td>
                                                    <td>{{ $item->stnk ? $item->stnk->alamat : '-' }}</td>
                                                    <td>{{ $item->stnk ? \Carbon\Carbon::parse($item->stnk->tgl_awal_pkb)->isoFormat('D MMMM Y') : '-' }}
                                                    </td>
                                                    <td>
                                                        {{ $item->rc ? \Carbon\Carbon::parse($item->rc->tgl_akhir_pkb)->isoFormat('D MMMM Y') : '-' }}
                                                    </td>
                                                    <td>
                                                        {{ $item->rak ? $item->rak->kode : '-' }}
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="6" class="text-center">{{ __('Tidak ada data') }}
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
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
            $(".btn-filter").click(function(event) {
                $(".form").attr('action', "{{ route('laporan.index') }}");
            });
            $(".btn-cetak").click(function(event) {
                $(".form").attr('action', "{{ route('laporan.cetak') }}");
            });
        });

        @if (Session::has('success'))
            toastr['success']("{{ Session::get('success') }}", 'Success!', {
                showDuration: 1000,
                closeButton: true,
                tapToDismiss: false,
            });
        @endif
    </script>
@endpush
