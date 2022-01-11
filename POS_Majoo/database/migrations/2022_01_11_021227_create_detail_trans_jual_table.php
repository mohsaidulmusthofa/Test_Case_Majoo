<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailTransJualTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_trans_jual', function (Blueprint $table) {
            $table->id('id_detail_trans_jual');
            $table->foreignId('id_trans_jual')->references('id_trans_jual')->on('transaksi_penjualan')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('id_produk')->references('id_produk')->on('produk')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('qty');
            $table->integer('sub_total');
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
        Schema::dropIfExists('detail_trans_jual');
    }
}
