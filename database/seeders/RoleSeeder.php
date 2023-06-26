<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enums\Permission;
use App\Enums\Role;
use App\Models\Permissions;
use App\Models\Roles;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Seed the role and permissions and role_has_permissions table.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        DB::table(config('permission.table_names.roles'))->truncate();
        DB::table(config('permission.table_names.permissions'))->truncate();
        DB::table(config('permission.table_names.role_has_permissions'))->truncate();

        foreach (Permission::values() as $permission) {
            Permissions::create(['name' => $permission]);
        }

        foreach(Role::cases() as $roleEnum) {
            $role = Roles::create(['name' => $roleEnum->value]);
            $role->givePermissionTo($roleEnum->permissions());
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
