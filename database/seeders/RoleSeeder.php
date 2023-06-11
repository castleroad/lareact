<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Permissions;
use App\Models\Roles;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        DB::table(config('permission.table_names.roles'))->truncate();
        DB::table(config('permission.table_names.permissions'))->truncate();
        DB::table(config('permission.table_names.role_has_permissions'))->truncate();

        $roles = config('roles');

        $permissions = Arr::get($roles, 'permissions');
        foreach ($permissions as $permission) {
            Permissions::create(['name' => $permission]);
        }

        unset($roles['permissions']);

        foreach($roles as $role => $rolePermissions) {
            $role = Roles::create(['name' => $role]);

            if (in_array('*', Arr::get($rolePermissions, 'permissions'))) {
                $role->givePermissionTo($permissions);
            } else {
                $role->givePermissionTo($rolePermissions);
            }
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
