@extends('admin.app')

@push('customCss')
    <link rel="stylesheet"
        href="{{ asset('assets/admin/assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/assets/compiled/css/table-datatable-jquery.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/assets/extensions/choices.js/public/assets/styles/choices.css') }}">
@endpush

@push('customJs')
    <script src="{{ asset('assets/admin/assets/extensions/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/admin/assets/extensions/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/admin/assets/static/js/pages/datatables.js') }}"></script>



    <script src="{{ asset('assets/admin/assets/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
    <script src="{{ asset('assets/admin/assets/static/js/pages/form-element-select.js') }}"></script>
    <script>
        new DataTable('#datatable');
    </script>
@endpush
@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Permohonan Akun</h3>

            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pengguna</li>
                    </ol>
                </nav>
            </div>
        </div>

    </div>
    <!-- Basic Tables start -->
    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="datatable">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>email</th>
                                <th>No Telp</th>
                                <th>Ormawa</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $d)
                                <tr>
                                    <td>{{ $d->name }}</td>
                                    <td>{{ $d->email ?? '-' }}</td>
                                    <td>{{ $d->no_hp }}</td>
                                    <td>{{ $d->organisasi ?? '-' }}</td>
                                    <td>
                                        <a href="{{ route('admin.account.verify.send', $d->id) }}"
                                            class="btn btn-sm btn-success">Periksa</a>
                                    </td>

                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </section>
    <!-- Basic Tables end -->

    @include('admin.pages.barang.modals.add')
@endsection
