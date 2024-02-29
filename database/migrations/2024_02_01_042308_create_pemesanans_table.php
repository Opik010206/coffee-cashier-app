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
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->unsignedBigInteger('id');

            $table->unsignedBigInteger('meja_id');
            $table->foreign('meja_id')->references('id')->on('mejas')->onDelete('cascade'); // Foreign Key ke Tabel Meja

            $table->date('tanggal_pemesanan');
            $table->time('jam_mulai');
            $table->time('jam_selesai')->nullable(); // Kolom dapat berisi nilai NULL
            $table->string('nama_pemesan');
            $table->integer('jumlah_pelanggan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanans');
    }
};
