<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Barang;
use App\Models\Peminjaman;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {

        $barangs = Barang::whereNull('deleted_at')->get();

        if (Auth::check() && Auth::user()->role == 0) {
            $data['user_count'] = User::all()->count();
            $data['barang_count'] = Barang::withTrashed()->get()->count();
            $data['peminjaman_count'] = Peminjaman::all()->count();

            return view('admin.pages.dashboard', compact('data'));
        } else {
            return view('welcome', compact('barangs'));
        }
    }
}
