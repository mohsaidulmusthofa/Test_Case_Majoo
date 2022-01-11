<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TablePelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Membuat pelanggan seeder dengan faker id
        $faker = Faker::create('id_ID');
        // Pengulangan
        for ($i = 1; $i <= 5; $i++) {
        DB::table('pelanggan')->insert([
            [
                'id_pelanggan'      => $i,
                'nama_pelanggan'    => $faker->name,
            ],
        ]);
    }
    }
}
