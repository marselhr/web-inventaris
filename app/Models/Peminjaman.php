<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'peminjamans';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function barang()
    {
        return $this->hasOne(Barang::class, 'kode', 'kode_barang');
    }

    public function detail()
    {
        return $this->hasOne(DetailPeminjaman::class, 'peminjaman_id', 'id');
    }
}
