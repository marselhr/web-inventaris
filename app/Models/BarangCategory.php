<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangCategory extends Model
{
    use HasFactory;

    protected $table = 'barang_categories';

    protected $guarded =  ['id'];
}
