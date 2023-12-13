@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Formulir Peminjaman barang</h4>
                <p>Silahkan Upload Surat Peminjaman melalui formulir ini</p>
            </div>
            @include('generals._validation')
            <div class="card-content">
                <div class="card-body">
                    <form action="{{ route('request.account.store') }}" method="POST">
                        @csrf
                        <div class="form-body">
                            <div class="form-group">
                                <label for="" class="form-label">Surat Peminjaman</label>
                                <input type="file" class="form-control" name="surat-peminjaman">
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Batal</button>
                            <button type="submit" class="btn btn-primary me-1 mb-1">Kirim</button>
                        </div>
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection
