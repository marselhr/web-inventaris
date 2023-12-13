@extends('layouts.app')

@push('customJs')
    <script src="{{ asset('assets/admin/assets/extensions/jquery/jquery.js') }}"></script>

    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}"></script>
    <script>
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function() {
            // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    /* You may add your own implementation here */

                    $.ajax({
                        type: 'POST',
                        url: "{{ route('delete.peminjaman.unpaid', $detail_peminjaman->peminjaman_id) }} ",
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(res) {
                            window.location.href = '/status-pinjam'
                        }
                    })
                },
                onPending: function(result) {
                    /* You may add your own implementation here */
                    alert("wating your payment!");
                    console.log(result);
                },
                onError: function(result) {
                    /* You may add your own implementation here */
                    alert("payment failed!");
                    console.log(result);
                },
                onClose: function() {
                    /* You may add your own implementation here */
                    alert('you closed the popup without finishing the payment');
                }
            })
        });
    </script>
@endpush
@section('content')
    <div class="container h-100">
        <div class="col-12 col-md-3 mx-auto">

            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <h4 class="card-title mb-0">Pembayaran</h4>
                    </div>
                    <div class="card-body">
                        <p class="card-text text-truncate">
                            Barang: {{ $item->barang->name }}
                        </p>
                        <p>Harga: Rp {{ number_format($detail_peminjaman->total_price, 0, '.', '.') }}</p>
                        <button id="pay-button" type="button" class="btn btn-primary w-100">Bayar Sekarang</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
