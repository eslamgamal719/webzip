<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'first_name' => Str::random(10),
            'last_name' => Str::random(10),
            'email' => 'test@test.test',
            'password' => Hash::make('12345678'),
            'phone' => '12345678',
            'bio' => Str::random(191),
        ]);
        DB::table('users')->insert([
            'first_name' => Str::random(10),
            'last_name' => Str::random(10),
            'email' => 'test2@test.test',
            'password' => Hash::make('23456789'),
            'phone' => '23456789',
            'bio' => Str::random(191),
        ]);
    }
}
