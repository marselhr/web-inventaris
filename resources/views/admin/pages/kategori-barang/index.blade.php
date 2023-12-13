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
        const modalEdit = new bootstrap.Modal($('#modalEdit'))
        $('#table1').on('click', '.action-edit', function() {
            const data = $(this).data()
            modalEdit.show()
            $("#myForm").attr('action', data.url_update);
            $.ajax({
                type: 'GET',
                url: data.url_edit,
                success: function(res) {
                    $('input[name=name]').val(res.name)
                    $('textarea[name=description]').val(res.description)
                }
            })
        })
    </script>
@endpush
@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Kategori Barang Inventaris</h3>

            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Kategori Barang</li>
                    </ol>
                </nav>
            </div>
        </div>

        @include('generals._validation')
    </div>
    <!-- Basic Tables start -->
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last ">

                        <h5 class="card-title">
                            Data Kategori
                        </h5>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <button type="button" data-bs-toggle="modal" class="btn btn-primary float-start float-lg-end"
                            data-bs-target="#modalAdd"></i>Tambah
                            Kategori</a>
                    </div>
                </div>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td>
                                        <button type="button" data-id_kategori="{{ $category->id }}"
                                            data-url_edit="{{ route('admin.category.edit', $category->id) }}"
                                            data-url_update="{{ route('admin.category.update', $category->id) }}"
                                            class="btn btn-sm btn-info action-edit">Edit</button>
                                        <div class="btn btn-sm btn-danger">Hapus</div>
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

    @include('admin.pages.kategori-barang.modals.add')
    @include('admin.pages.kategori-barang.modals.edit')
@endsection
