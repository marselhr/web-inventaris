<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBaarangInventarisRequest;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangs = Barang::all();
        return view('admin.pages.barang.index', compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateBaarangInventarisRequest $request)
    {

        try {
            DB::beginTransaction();

            if ($request->hasFile('cover')) {
                $file = $request->file('cover');
                $fileName = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('sampul-barang'), $fileName);
            } else {
                $fileName = 'dummy-cover.png';
            }
            $barang =  new Barang();
            $barang->kode = $request->kode;
            $barang->name = $request->name;
            $barang->cover = $fileName;
            $barang->harga_sewa = $request->harga_sewa;
            $barang->description = $request->description;
            $barang->qty = $request->qty;
            $barang->category_id = $request->kategori;
            $barang->status = $request->status;
            $barang->buy_year = $request->buy_year;
            $barang->save();
            DB::commit();
            return redirect()->back()->with('success', 'berhasil ditambahkan');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->back()->with('errors', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $kode)
    {
        try {
            DB::beginTransaction();
            $barang = Barang::where('kode', $kode);
            $barang->delete();
            DB::commit();
            return redirect()->back();
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }
}
