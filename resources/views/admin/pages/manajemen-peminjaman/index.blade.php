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

        const modalSurat = new bootstrap.Modal($('#modalSurat'))
        $('#datatable').on('click', '.lihat-surat', function() {
            const data = $(this).data();
            modalSurat.show()
            $("#myForm").attr('action', data.url_update);
            $.ajax({
                type: 'GET',
                url: data.url_get,
                success: function(data) {
                    let srcValue = $('#embedPdf').attr('src');
                    $('#embedPdf').attr('src', `${srcValue}/${data.surat_peminjaman}`)

                }
            })
        })
    </script>
@endpush
@section('content')
    @include('admin.pages.manajemen-peminjaman.modal.surat')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Peminjaman</h3>

            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Peminjaman</li>
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
                            Data Peminjaman
                        </h5>
                    </div>

                </div>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="datatable">
                        <thead>
                            <tr>
                                <th>Kode Barang</th>
                                <th>Nama Pemohon</th>
                                <th>Jumlah</th>
                                <th>Surat Pengantar</th>
                                <th>Status</th>
                                <th>Status Pembayaran</th>
                                <th>Terakhir Diperbarui</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($peminjamans as $peminjaman)
                                <tr>
                                    <td>{{ $peminjaman->kode_barang ?? '-' }}</td>
                                    <td>{{ $peminjaman->nama_peminjam . ' dari ' . $peminjaman->user->organisasi }}</td>
                                    <td>{{ $peminjaman->qty ?? '1' }}</td>
                                    <td><a style="cursor: pointer" class="lihat-surat"
                                            data-id_peminjaman="{{ $peminjaman->id }}"
                                            data-url_get="{{ route('admin.peminjaman.surat', $peminjaman->id) }}"
                                            data-url_update="{{ route('admin.peminjaman.approve', $peminjaman->id) }}">Lihat
                                            Surat</a>
                                    </td>
                                    <td>
                                        @if ($peminjaman->disetujui)
                                            <span class="badge bg-light-success">Disetujui</span>
                                        @else
                                            <span class="badge bg-light-warning">Menunggu Disetujui</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($peminjaman->detail && $peminjaman->detail->status_pembayaran == 'paid')
                                            <span class="badge bg-light-success">Telah Dibayar</span>
                                        @elseif ($peminjaman->detail || $peminjaman->detail == null || $peminjaman->detail->status_pemayaran == 'unpaid')
                                            @if ($peminjaman->detail != null)
                                                <span class="badge bg-light-secondary">Belum Dibayar</span>
                                            @endif
                                        @endif
                                    </td>
                                    <td>{{ date('d M Y H:i:s', strtotime($peminjaman->updated_at)) }}</td>
                                    <td>
                                        <button type="button" data-id_peminjaman="{{ $peminjaman->id }}"
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

    @include('admin.pages.barang.modals.add')
@endsection
