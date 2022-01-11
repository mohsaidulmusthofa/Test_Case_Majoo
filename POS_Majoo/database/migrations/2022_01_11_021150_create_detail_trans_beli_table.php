<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailTransBeliTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_trans_beli', function (Blueprint $table) {
            $table->id('id_detail_trans_beli');
            $table->foreignId('id_trans_beli')->references('id_trans_beli')->on('transaksi_pembelian')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('id_produk')->references('id_produk')->on('produk')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('qty');
            $table->integer('subtotal');
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
        Schema::dropIfExists('detail_trans_beli');
    }
}
