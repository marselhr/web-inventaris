<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('peminjamans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('kode_barang');
            $table->foreign('kode_barang')->references('kode')->on('barangs');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->string('nama_peminjam');
            $table->string('no_hp');
            $table->string('surat_peminjaman');
            $table->boolean('disetujui')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjamans');
    }
};
