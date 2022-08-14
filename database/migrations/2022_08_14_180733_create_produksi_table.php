<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_produksi', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pesanan',20)->nullable()->default(null);
            $table->date('tgl_masuk_benang')->nullable()->default(null);
            $table->string('jumlah_benang',255)->nullable()->default(null);
            $table->date('tgl_mulai')->nullable()->default(null);
            $table->date('tgl_selesai')->nullable()->default(null);
            $table->string('jumlah_produk',10)->nullable()->default(null);
            $table->foreignId('pesanan_id')->nullable()->default(null);
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
        Schema::dropIfExists('produksi');
    }
}
