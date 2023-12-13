@extends('layouts.app')

@push('customJs')
    <script src="{{ asset('assets/admin/assets/extensions/jquery/jquery.js') }}"></script>
    <script>
        const modal = new bootstrap.Modal('#modal-action');
        const alert = new bootstrap.Modal('#alert-login');
        $('.card').on('click', '.action', function() {
            let data = $(this).data();
            modal.show();
            $('#inputKodeBarang').val(data.kode_barang)

        })
        $('.card').on('click', '.action-guest', function() {
            let data = $(this).data();
            alert.show();
        })
        $('.tombol').click(function() {
            $.ajax({
                type: 'POST',
                url: $(this).data('url'),
                data: {
                    _token: "{{ csrf_token() }}",
                    id: $(this).data('id-barang')
                },
            })
        })
    </script>
@endpush

@section('content')
    @include('generals.alert-login')
    <div class="container">

        <h5 class="page-title mb-5">Barang Inventaris Kami</h5>

        @include('generals._validation')
        <div class="d-flex flex-wrap justify-content-evenly">
            @foreach ($barangs as $barang)
                <div class="p-2">
                    <div class="card" style="width: 18rem;">
                        <div class="card-content">
                            <img src="{{ asset('sampul-barang/' . $barang->cover) }}" style="height: 130px ; width: 100%"
                                class="card-img-top img-fluid" alt="...">
                            <div class="card-body pb-5">
                                <h5 class="card-title text-truncate"><a href="">{{ $barang->name }}</a></h5>
                                <p class="card-text text-truncate">{{ $barang->description }}</p>

                                <h6>Rp {{ number_format($barang->harga_sewa, 0, '.', '.') }}</h6>
                                <div class="badge bg-light-success d-block mb-2">Dapat Dipinjam</div>
                                @guest

                                    <button type="button" class="btn btn-primary float-end action-guest">Ajukan
                                        pinjaman</button>
                                @endguest
                                @auth
                                    <button type="button" class="btn btn-primary float-end action"
                                        id="aju-pinjam-{{ $barang->id }}" data-url="{{ route('ajukan-pinjam', $barang) }}"
                                        data-kode_barang="{{ $barang->kode }}">Ajukan pinjaman</button>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @include('generals.modal-pinjam')
@endsection
