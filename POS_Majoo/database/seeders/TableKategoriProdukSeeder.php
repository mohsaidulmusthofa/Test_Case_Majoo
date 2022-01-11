<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TableKategoriProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategori_produk')->insert([
            [
                'id_kategori_produk'            => 1,
                'nama_kategori_produk'          => "Pro",
                'deksripsi_kategori_produk'     => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta, repellat!",
                'foto_kategori_produk'          => "",
                
            ],
            [
                'id_kategori_produk'            => 2,
                'nama_kategori_produk'          => "Advance",
                'deksripsi_kategori_produk'     => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Harum fugiat ipsa dignissimos inventore voluptates vel fuga tempore facere eaque cupiditate!",
                'foto_kategori_produk'          => "",
                
            ],
            [
                'id_kategori_produk'            => 3,
                'nama_kategori_produk'          => "Lifestyle",
                'deksripsi_kategori_produk'     => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta, repellatv oluptates vel fuga tempore facere eaque cupiditat!",
                'foto_kategori_produk'          => "",
                
            ],
            [
                'id_kategori_produk'            => 4,
                'nama_kategori_produk'          => "Desktop",
                'deksripsi_kategori_produk'     => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta, repellat!",
                'foto_kategori_produk'          => "",
                
            ],
        ]);
    }
}
