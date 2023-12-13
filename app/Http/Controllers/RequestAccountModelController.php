<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestAccountRequest;
use App\Models\RequestAccountModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RequestAccountModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pengajuan-akun');
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
    public function store(RequestAccountRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = new RequestAccountModel();
            $data->name = $request->name;
            $data->email = $request->email;
            $data->no_hp = $request->contact;
            $data->organisasi = $request->organisasi;
            $data->save();
            DB::commit();
            return redirect()->back()->with('success', 'permohonan akun diproses');
        } catch (\Throwable $th) {

            dd($th->getMessage());
            DB::rollBack();
            return redirect()->back()->with('errors', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(RequestAccountModel $requestAccountModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RequestAccountModel $requestAccountModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RequestAccountModel $requestAccountModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RequestAccountModel $requestAccountModel)
    {
        //
    }
}
