<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
            [
                'name'          => 'admin',
                'email'         => 'admin@melo.test',
                'password'      => Hash::make('admin'),
                'created_at'    => now()
            ],
            [
                'name'          => 'manager',
                'email'         => 'manager@melo.test',
                'password'      => Hash::make('manager'),
                'created_at'    => now()
            ],
            [
                'name'          => 'blogger',
                'email'         => 'blogger@melo.test',
                'password'      => Hash::make('blogger'),
                'created_at'    => now()
            ],
            [
                'name'          => 'reader',
                'email'         => 'reader@melo.test',
                'password'      => Hash::make('reader'),
                'created_at'    => now()
            ],
        ]);
    }
}
