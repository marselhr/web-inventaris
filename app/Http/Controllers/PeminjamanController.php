<?php

namespace App\Http\Controllers;

use App\Models\DetailPeminjaman;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use WithFileUploads;

class PeminjamanController extends Controller
{
    public function pinjamBarang(Request $request)
    {
        try {

            DB::beginTransaction();

            $request->validate([
                'surat_peminjaman' => 'required|mimes:pdf|max:2480'
            ]);
            if ($request->hasFile('surat_peminjaman')) {
                $file = $request->file('surat_peminjaman');
                $fileName = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('surat_peminjaman'), $fileName);
            }

            $data = new Peminjaman();
            $data->kode_barang = $request->kode_barang;
            $data->user_id = Auth::user()->id;
            $data->nama_peminjam = $request->name;
            $data->no_hp = $request->no_hp;

            $data->surat_peminjaman = $fileName;
            $data->save();
            DB::commit();
            return to_route('lihat.status.pinjam');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('errors', $th->getMessage());
        }
    }

    public function lihatStatusPeminjaman()
    {
        $peminjamans = Peminjaman::where('user_id', Auth::user()->id)->orderBy('updated_at', 'DESC')->get();

        return view('status-peminjaman', compact('peminjamans'));
    }

    public function prosesPembayaran($id)
    {
        try {
            DB::beginTransaction();

            $item = Peminjaman::find($id);

            $gross_amount = $item->barang->harga_sewa;





            \Midtrans\Config::$serverKey = config('midtrans.server_key');
            // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
            \Midtrans\Config::$isProduction = false;
            // Set sanitization on (default)
            \Midtrans\Config::$isSanitized = true;
            // Set 3DS transaction for credit card to true
            \Midtrans\Config::$is3ds = true;

            $kode = uniqid('ORDER-');
            $params = array(
                'transaction_details' => array(
                    'order_id' => $kode,
                    'gross_amount' => $gross_amount,
                ),

            );

            $detail_peminjaman = new DetailPeminjaman();
            $detail_peminjaman->kode = $kode;
            $detail_peminjaman->peminjaman_id = $item->id;
            $detail_peminjaman->total_price = $gross_amount;
            $detail_peminjaman->save();

            DB::commit();
            $snapToken = \Midtrans\Snap::getSnapToken($params);

            return view('preview-bayar', compact('snapToken', 'item', 'detail_peminjaman'));
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    public function deleteUnpaidData($peminjaman_id)
    {
        try {
            DetailPeminjaman::where('peminjaman_id', $peminjaman_id)->where('status_pembayaran', 'unpaid')->delete();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
