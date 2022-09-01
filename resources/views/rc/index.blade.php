@extends('layouts.app')

@section('title', __('Record Centre'))

@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">{{ __('Record Centre') }}</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('home') }}">{{ __('Home') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active">
                                        {{ __('Record Centre') }}
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
                                <div class="card-header border-bottom d-flex justify-content-between">
                                    <h4 class="card-title">{{ __('Data') }}</h4>
                                    <div>
                                        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                                            data-bs-target="#import-excel">
                                            {{ __('Import Excel') }}
                                        </button>
                                        <a href="{{ route('rc.create') }}" class="btn btn-primary">{{ __('Tambah') }}</a>
                                    </div>
                                </div>
                                <div class="card-datatable px-1">
                                    <table class="dataTable table">
                                        <thead>
                                            <tr>
                                                <th class="w-1">No</th>
                                                <th>NO POLISI</th>
                                                <th>TANGGAL AWAL PKB</th>
                                                <th>TANGGAL AKHIR PKB</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->stnk ? $item->stnk->nopol : '-' }}</td>
                                                    <td>{{ $item->stnk ? \Carbon\Carbon::parse($item->stnk->tgl_awal_pkb)->isoFormat('D MMMM Y') : '-' }}
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($item->tgl_akhir_pkb)->isoFormat('D MMMM Y') }}
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button type="button"
                                                                class="btn btn-sm dropdown-toggle hide-arrow py-0"
                                                                data-bs-toggle="dropdown">
                                                                <i data-feather="more-vertical"></i>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item"
                                                                    href="{{ route('rc.edit', $item->id) }}">
                                                                    <i data-feather="edit-2" class="me-50"></i>
                                                                    <span>{{ __('Ubah') }}</span>
                                                                </a>
                                                                <form action="{{ route('rc.destroy', $item->id) }}"
                                                                    class="d-inline form-delete" method="POST">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button type="submit"
                                                                        class="dropdown-item w-100 btn-delete">
                                                                        <i data-feather="trash" class="me-50"></i>
                                                                        <span>{{ __('Hapus') }}</span>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
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
    {{-- Modal Import Excel --}}
    <div class="modal fade text-start modal-success" id="import-excel" tabindex="-1" aria-labelledby="myModalLabel110"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form action="{{ route('rc.import.excel') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel110">{{ __('Import Excel Record Centre') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <span>{{ __('Tata cara import excel Record Centre') }}</span>
                        <ul>
                            <li>{{ __('Unduh template excel.') }}
                                <br>
                                <a href="{{ route('rc.download.template-excel') }}"
                                    class="btn btn-primary my-1">{{ __('Unduh') }}</a>
                            </li>
                            <li>{{ __('Isi data Record Centre sesuai kolom di Excel.') }}</li>
                            <li>{{ __('Import Excel yang telah diisi pada inputan dibawah.') }}</li>
                        </ul>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 mb-1 mb-sm-0">
                                <label for="excel_file" class="form-label">Import Excel</label>
                                <input name="excel_file" class="form-control" type="file" id="excel_file"
                                    accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" required />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">{{ __('Simpan') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('.dataTable').DataTable();

            $(".btn-delete").click(function(event) {
                event.preventDefault();
                let form = $(this).closest("form");
                Swal.fire({
                    title: "{{ __('Anda yakin ingin mengapus') }}?",
                    text: "{{ __('Data tidak akan dapat dikembalikan') }}!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: "{{ __('Ya, hapus') }}!",
                    customClass: {
                        confirmButton: 'btn btn-primary',
                        cancelButton: 'btn btn-outline-danger ms-1'
                    },
                    buttonsStyling: false
                }).then(function(result) {
                    if (result.value) {
                        form.submit();
                    }
                });
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
