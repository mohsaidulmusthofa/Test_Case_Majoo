<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiPembelianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_pembelian', function (Blueprint $table) {
            $table->id('id_trans_beli');
            $table->foreignId('id_admin')->references('id_admin')->on('admin')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('id_supplier')->references('id_supplier')->on('supplier')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('grand_total');
            $table->date('tgl_beli');
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
        Schema::dropIfExists('transaksi_pembelian');
    }
}
