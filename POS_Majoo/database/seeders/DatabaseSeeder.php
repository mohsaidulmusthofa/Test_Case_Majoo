<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Harus urut, tabel primary key harus di atas tabel foreign key
        $this->call(TableAdminSeeder::class);
        $this->call(TablePelangganSeeder::class);
        $this->call(TableSupplierSeeder::class);
        $this->call(TableKategoriProdukSeeder::class);
        $this->call(TableProdukSeeder::class);
    }
}
