<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DataCategory\CreateCategoryRequest;
use App\Http\Requests\Admin\DataCategory\UpdateCategoryRequest;
use App\Models\BarangCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories   = BarangCategory::orderBy('updated_at', 'DESC')->get();
        return view('admin.pages.kategori-barang.index', compact('categories'));
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
    public function store(CreateCategoryRequest $request)
    {
        try {
            DB::beginTransaction();
            $category = new BarangCategory();
            $category->name = $request->name;
            $category->description = $request->description;
            $category->save();
            DB::commit();
            return redirect()->back()->with('success', 'Berhasil menambahkan data');
        } catch (\Throwable $th) {
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
     * Show the form for editing the specified resource.p
     */
    public function edit(string $id)
    {
        $category = BarangCategory::find($id);
        return response()->json($category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, string $id)
    {
        try {
            DB::beginTransaction();
            $category = BarangCategory::find($id);
            $category->name = $request->name;
            $category->description = $request->description;
            $category->save();
            DB::commit();
            return redirect()->back();
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
