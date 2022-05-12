<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'role_id' => 1,
            'first_name' => 'Jorge',
            'second_name' => 'Eduardo',
            'last_name' => 'Peralta',
            'email' => 'corpjorge@hotmail.com',
            'password' => Hash::make('admin'),
            'document' => '1014205146',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'id' => 2,
            'role_id' => 1,
            'first_name' => 'John',
            'second_name' => 'Freddy',
            'last_name' => 'Moreno',
            'email' => 'john.moreno@fyclsingenieria.com',
            'document' => '123456789',
            'office_id' => 1,
            'password' => Hash::make('12342wefdgsasdf@'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'id' => 3,
            'role_id' => 1,
            'first_name' => 'Leandro',
            'last_name' => 'Moreno',
            'email' => '123857@gmail.com',
            'document' => '111111111',
            'office_id' => 3,
            'password' => Hash::make('12342wefdgsasdf@'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'id' => 4,
            'role_id' => 4,
            'first_name' => 'Jorge',
            'second_name' => 'Eduardo',
            'last_name' => 'Peralta',
            'email' => 'corpjorge@gmail.com',
            'document' => '987654321',
            'office_id' => 2,
            'password' => Hash::make('admin'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        \App\Models\User::factory()->count(10)->create();

    }
}
