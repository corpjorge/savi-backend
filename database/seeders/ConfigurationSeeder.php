<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('configurations')->insert([
            'id' => 1,
            'absenceTime' => '1',
            'officeName' => 'FEDEF',
            'officePhoto' => '',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
