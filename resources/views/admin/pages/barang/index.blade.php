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
                <h3>Data Barang Inventaris</h3>

            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Barang</li>
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
                            Data Barang
                        </h5>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <button type="button" data-bs-toggle="modal" class="btn btn-primary float-start float-lg-end"
                            data-bs-target="#modalAdd"></i>Tambah Barang</a>
                    </div>
                </div>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="datatable">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Harga Sewa</th>
                                <th>Merek</th>
                                <th>Jumlah</th>
                                <th>Tahun Pembelian</th>
                                <th>Status</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barangs as $barang)
                                <tr>
                                    <td>{{ $barang->kode }}</td>
                                    <td>{{ $barang->name }}</td>
                                    <td>Rp {{ number_format($barang->harga_sewa, 0, '.', '.') }}</td>
                                    <td>{{ $barang->brand ?? '-' }}</td>
                                    <td>{{ $barang->qty }}</td>
                                    <td>{{ $barang->buy_year ?? '-' }}</td>
                                    <td>{{ $barang->status }}</td>
                                    <td>
                                        <span class="badge bg-success">{{ $barang->keterangan }}</span>
                                    </td>
                                    <td>
                                        <button type="button" data-kode_barang="{{ $barang->kode }}"
                                            class="btn btn-sm btn-info action-edit">Edit</button>

                                        <form action="{{ route('admin.barang.destroy', $barang->kode) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="confirm('Yakin Menghapus data?')"> Hapus</button>
                                        </form>
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
