<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Barang extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'barangs';
    protected $primary_key = 'kode';
    protected $fillable = [
        'kode',
        'category_id',
        'cover',
        'name',
        'harga_sewa',
        'description',
        'status',
        'qty',
        'buy_year',
        'keterangan'
    ];
}
