<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->id('id_produk');
            $table->char('nama_produk');
            $table->integer('harga_produk');
            $table->foreignId('id_kategori_produk')->references('id_kategori_produk')->on('kategori_produk')->onUpdate('cascade')->onDelete('cascade');
            $table->longText('deskripsi_produk');
            $table->char('foto_produk')->nullable();
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
        Schema::dropIfExists('produk');
    }
}
