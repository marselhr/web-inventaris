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
        Schema::create('barangs', function (Blueprint $table) {
            $table->string('kode')->primary()->nullable(false);
            $table->foreignId('category_id')->references('id')->on('barang_categories')->cascadeOnDelete();
            $table->string('cover')->nullable();
            $table->integer('harga_sewa');
            $table->string('name', 100);
            $table->string('brand', 100)->nullable();
            $table->text('description');
            $table->integer('qty');
            $table->year('buy_year')->nullable();
            $table->enum('status', ['b', 'kb', 'rb'])->comment('b=baik, kb=kurang baik dan rb=rusab berat');
            $table->enum('keterangan', ['ada', 'tidak-ada'])->default('ada');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
