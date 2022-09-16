<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\PermissionRegistrar;

class ConfigPermissionAndRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // permission_id => role_id;
        $assigned = [ 1=>1, 2=>2, 3=>2, 4=>2, 5=>2, 6=>2, 7=>2, 8=>2, 9=>2, 10=>2, 11=>2, 12=>2, 13=>2, 14=>3, 15=>3, 16=>3 ];

        $roles = Role::all();
        $permissions = Permission::all();

        foreach ($permissions as $permission) {
            $roleId = $assigned[$permission->id];
            $role = $roles->where('id', $roleId)->first();
            $permission->assignRole($role);
        }

        $users = User::all();

        foreach ($users as $user) {
            $role = $roles->where('id', $user->id)->first();
            $user->assignRole($role);
        }
    }
}
