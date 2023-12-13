<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\DetailPeminjaman;

class HandleAfterPaymentController extends Controller
{
    public function handle(Request $request)
    {

        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        $notif = new \Midtrans\Notification();

        $transaction = $notif->transaction_status;
        $type = $notif->payment_type;
        $order_id = $notif->order_id;
        $fraud = $notif->fraud_status;

        if ($transaction == 'capture') {
            if ($type == 'credit_card') {
                if ($fraud == 'accept') {
                    // TODO set payment status in merchant's database to 'Success'
                    DetailPeminjaman::where('kode', $request->order_id)->update([
                        'status_pembayaran' => 'Paid',
                    ]);
                }
            }
        } else if ($transaction == 'settlement') {
            // TODO set payment status in merchant's database to 'Settlement'
            DetailPeminjaman::where('kode', $request->order_id)->update(['status_pembayaran' => 'Paid',]);
        }
    }
}
