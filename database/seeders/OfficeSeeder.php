<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('offices')->insert([
            'id' => 1,
            'name' => 'Oficina Funza',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('offices')->insert([
            'id' => 2,
            'name' => 'Oficina Facatativá',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('offices')->insert([
            'id' => 3,
            'name' => 'Oficina Suba',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
