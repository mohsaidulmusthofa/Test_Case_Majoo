<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TableAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin')->insert([
            [
                'id_admin'      => 1,
                'nama_admin'    => "Super Admin",
                'email'         => "superadmin@majoo.com",
                'password'      => bcrypt('majoo123')
            ]
        ]);
    }
}
