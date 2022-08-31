<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailBayarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_detailbayar', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pesanan_id');
            $table->date('tgl_bayar');
            $table->string('cara_bayar');
            $table->bigInteger('jumlah_bayar');
            $table->string('bank');
            $table->string('keterangan');
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
        Schema::dropIfExists('tbl_detailbayar');
    }
}
