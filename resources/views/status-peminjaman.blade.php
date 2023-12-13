@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Peminjaman Anda</h4>
            </div>
            @include('generals._validation')
            <div class="card-content">
                <div class="card-body">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="datatable">
                                <thead>
                                    <tr>
                                        <th>Nama Peminjam</th>
                                        <th>Barang</th>
                                        <th>Jumlah</th>
                                        <th>Harga Satuan</th>
                                        <th>Status</th>
                                        <th>Pembayaran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($peminjamans as $peminjaman)
                                        <tr>
                                            <td>{{ $peminjaman->nama_peminjam }}</td>
                                            <td>{{ $peminjaman->barang->name }}</td>
                                            <td>{{ $peminjaman->qty ?? '1' }} </td>
                                            <td>{{ number_format($peminjaman->barang->harga_sewa, 0, '.', '.') }}</td>
                                            <td>
                                                @if ($peminjaman->disetujui)
                                                    <span class="badge bg-light-success">Disetujui</span>
                                                @else
                                                    <span class="badge bg-light-warning">Menunggu Persetujuan</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($peminjaman->disetujui)
                                                    @if ($peminjaman->detail && $peminjaman->detail->status_pembayaran == 'paid')
                                                        <span class="badge bg-light-success">Telah Dibayar</span>
                                                    @elseif ($peminjaman->detail || $peminjaman->detail == null || $peminjaman->detail->status_pemayaran == 'unpaid')
                                                        <a href="{{ route('pinjam.proses.pembayaran', $peminjaman) }}"
                                                            class="btn btn-primary ">Lakukan
                                                            Pembayaran</a>
                                                    @endif
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
