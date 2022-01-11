<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TableSupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('supplier')->insert([
            [
                'id_supplier'      => 1,
                'nama_supplier'    => "Sayyid Elektronika",
            ],
            [
                'id_supplier'      => 2,
                'nama_supplier'    => "Malang Elektronika",
            ],
            [
                'id_supplier'      => 3,
                'nama_supplier'    => "Budi Elektronika",
            ],
            [
                'id_supplier'      => 4,
                'nama_supplier'    => "Hari Elektronika",
            ],
        ]);
    }
}
