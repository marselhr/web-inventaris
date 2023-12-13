@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Formulir Permohonan Akun</h4>
            </div>
            @include('generals._validation')
            <div class="card-content">
                <div class="card-body">
                    <form action="{{ route('request.account.store') }}" method="POST" class="form form-vertical">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="fullname">Nama Lengkap</label>
                                        <input type="text" id="fullname" class="form-control" name="name"
                                            placeholder="Nama Lengkap">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="email-id-vertical">Email</label>
                                        <input type="email" id="email-id-vertical" class="form-control" name="email"
                                            placeholder="Email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="contact-info-vertical">No HP/WA</label>
                                        <input type="number" id="contact-info-vertical" class="form-control" name="contact"
                                            placeholder="Mobile">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="contact-info-vertical">Asal Ormawa</label>
                                        <input type="text" id="contact-info-vertical" class="form-control"
                                            name="organisasi" placeholder="Asal Organisasimu">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-8  form-group">
                                <div class="form-check">
                                    <div class="checkbox">
                                        <input type="checkbox" id="checkbox1" class="form-check-input">
                                        <label for="checkbox1">Saya menyatakan bahwa data yang saya masukkan adalah data
                                            yang valid</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-8  form-group">
                                <div class="form-check">
                                    <div class="checkbox">
                                        <input type="checkbox" id="checkbox1" class="form-check-input">
                                        <label for="checkbox1">Saya siap ditindak sesuai dengan pelanggaran penggunaan
                                            data</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
