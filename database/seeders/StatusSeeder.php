<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert(
            [
                'name' => 'active',
                'name_es' => 'Activa',
                'color' => 'success',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        DB::table('statuses')->insert(
            [
                'name' => 'cancelled',
                'name_es' => 'Cancelada',
                'color' => 'danger',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        DB::table('statuses')->insert(
            [
                'name' => 'on_wait',
                'name_es' => 'En espera',
                'color' => 'warning',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        DB::table('statuses')->insert(
            [
                'name' => 'on_call',
                'name_es' => 'En llamada',
                'color' => 'info',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        DB::table('statuses')->insert(
            [
                'name' => 'unrated',
                'name_es' => 'Sin calificar',
                'color' => 'secondary',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        DB::table('statuses')->insert(
            [
                'name' => 'closed',
                'name_es' => 'Cerrada',
                'color' => 'dark',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
