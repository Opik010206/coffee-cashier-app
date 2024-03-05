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
        Schema::create('produk_titipans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk');
            $table->string('nama_supplier');
            $table->integer('harga_beli');
            $table->integer('harga_jual');
            $table->integer('stock');
            $table->text('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk_titipans');
    }
};
