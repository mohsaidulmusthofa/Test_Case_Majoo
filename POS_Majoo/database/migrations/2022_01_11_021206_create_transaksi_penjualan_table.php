<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiPenjualanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_penjualan', function (Blueprint $table) {
            $table->id('id_trans_jual');
            $table->foreignId('id_admin')->references('id_admin')->on('admin')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('id_pelanggan')->references('id_pelanggan')->on('pelanggan')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('grand_total');
            $table->date('tgl_jual');
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
        Schema::dropIfExists('transaksi_penjualan');
    }
}
