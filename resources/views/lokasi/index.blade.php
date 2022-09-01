@extends('layouts.app')

@section('title', __('Lokasi'))

@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">{{ __('Lokasi') }}</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('home') }}">{{ __('Home') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active">
                                        {{ __('Lokasi') }}
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
                                    <a href="{{ route('lokasi.create') }}" class="btn btn-primary">{{ __('Tambah') }}</a>
                                </div>
                                <div class="card-datatable px-1">
                                    <table class="dataTable table">
                                        <thead>
                                            <tr>
                                                <th class="w-1">No</th>
                                                <th>KODE</th>
                                                <th>NAMA</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->kode }}</td>
                                                    <td>{{ $item->nama }}</td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button type="button"
                                                                class="btn btn-sm dropdown-toggle hide-arrow py-0"
                                                                data-bs-toggle="dropdown">
                                                                <i data-feather="more-vertical"></i>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item"
                                                                    href="{{ route('lokasi.edit', $item->id) }}">
                                                                    <i data-feather="edit-2" class="me-50"></i>
                                                                    <span>{{ __('Ubah') }}</span>
                                                                </a>
                                                                <form action="{{ route('lokasi.destroy', $item->id) }}"
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
