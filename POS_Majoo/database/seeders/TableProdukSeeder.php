<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TableProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produk')->insert([
            [
                'id_produk'             => 1,
                'nama_produk'           => "Majoo Pro",
                'harga_produk'          => 2750000,
                'id_kategori_produk'    => 1,
                'deskripsi_produk'      => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta, repellat!",
                'foto_produk'           => "majoopro.jpg",
                
            ],
            [
                'id_produk'             => 2,
                'nama_produk'           => "Majoo Advance",
                'harga_produk'          => 2750000,
                'id_kategori_produk'    => 2,
                'deskripsi_produk'      => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Harum fugiat ipsa dignissimos inventore voluptates vel fuga tempore facere eaque cupiditate!",
                'foto_produk'           => "majooadvance.jpg",
                
            ],
            [
                'id_produk'             => 3,
                'nama_produk'           => "Majoo Lifestyle",
                'harga_produk'          => 2750000,
                'id_kategori_produk'    => 3,
                'deskripsi_produk'      => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta, repellatv oluptates vel fuga tempore facere eaque cupiditat!",
                'foto_produk'           => "majoolifestyle.jpg",
                
            ],
            [
                'id_produk'             => 4,
                'nama_produk'           => "Majoo Desktop",
                'harga_produk'          => 2750000,
                'id_kategori_produk'    => 4,
                'deskripsi_produk'      => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta, repellat!",
                'foto_produk'           => "majoodesktop.jpg",
                
            ],
        ]);
    }
}