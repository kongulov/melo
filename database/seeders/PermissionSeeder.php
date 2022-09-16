<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            [ 'guard_name' => 'api', 'created_at' => now(), 'name' => 'all' ],
            [ 'guard_name' => 'api', 'created_at' => now(), 'name' => 'role.list' ],
            [ 'guard_name' => 'api', 'created_at' => now(), 'name' => 'role.create' ],
            [ 'guard_name' => 'api', 'created_at' => now(), 'name' => 'role.update' ],
            [ 'guard_name' => 'api', 'created_at' => now(), 'name' => 'role.delete' ],
            [ 'guard_name' => 'api', 'created_at' => now(), 'name' => 'permission.list' ],
            [ 'guard_name' => 'api', 'created_at' => now(), 'name' => 'permission.create' ],
            [ 'guard_name' => 'api', 'created_at' => now(), 'name' => 'permission.update' ],
            [ 'guard_name' => 'api', 'created_at' => now(), 'name' => 'permission.delete' ],
            [ 'guard_name' => 'api', 'created_at' => now(), 'name' => 'role.attach.permission' ],
            [ 'guard_name' => 'api', 'created_at' => now(), 'name' => 'role.detach.permission' ],
            [ 'guard_name' => 'api', 'created_at' => now(), 'name' => 'role.attach.user' ],
            [ 'guard_name' => 'api', 'created_at' => now(), 'name' => 'role.detach.user' ],
            [ 'guard_name' => 'api', 'created_at' => now(), 'name' => 'post.create' ],
            [ 'guard_name' => 'api', 'created_at' => now(), 'name' => 'post.delete' ],
            [ 'guard_name' => 'api', 'created_at' => now(), 'name' => 'post.update' ],
        ]);
    }
}
