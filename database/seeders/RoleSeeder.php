<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [ 'guard_name' => 'api', 'created_at' => now(), 'name' => 'Admin' ],
            [ 'guard_name' => 'api', 'created_at' => now(), 'name' => 'Manager' ],
            [ 'guard_name' => 'api', 'created_at' => now(), 'name' => 'Blogger' ]
        ]);
    }
}
