<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
            'id' => 1,
            'category_id' => 1,
            'name' => 'Servicio 1',
            'description' => 'desc Serv 1',
            'minutes' => '60',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('services')->insert([
            'id' => 2,
            'category_id' => 1,
            'name' => 'Servicio 2',
            'description' => 'desc Serv 2',
            'minutes' => '60',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('services')->insert([
            'id' => 3,
            'category_id' => 2,
            'name' => 'Servicio 3',
            'description' => 'desc Serv 3',
            'minutes' => '60',
            'created_at' => now(),
            'updated_at' => now()
        ]);




    }
}
