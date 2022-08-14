<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_pesanan', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pesanan')->unique();
            $table->foreignId('pelanggan_id');
            $table->foreignId('benang_id');
            $table->string('berat_bahan');
            $table->date('tanggal_mulai')->nullable()->default(null);
            $table->date('tanggal_selesai');
            $table->bigInteger('harga_awal');
            $table->bigInteger('harga_final')->nullable()->default(null);
            $table->string('status')->nullable()->default(null);
            $table->string('isLunas')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_pesanan');
    }
}
