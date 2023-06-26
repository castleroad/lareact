<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enums\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Seed the users table.
     */
    public function run(): void
    {
        DB::table(app(User::class)->getTable())->truncate();
        DB::table(config('permission.table_names.model_has_roles'))->truncate();

        User::factory()->create([
            'name'     => 'Super Admin',
            'email'    => 'super@admin.com',
            'password' => 'very-secret',
        ])->assignRole(Role::SuperAdmin->value);

        User::factory(3)->create()
            ->each(function ($user) {
                $user->assignRole(Role::Admin->value);
            });
        User::factory(7)->create()
            ->each(function ($user) {
                $user->assignRole(Role::Manager->value);
            });
        User::factory(15)->create()
            ->each(function ($user) {
                $user->assignRole(Role::User->value);
            });
    }
}
