<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table(app(User::class)->getTable())->truncate();

        User::factory()->superAdmin()->create([
            'name'  => 'Super Admin',
            'email' => 'super@admin.com',
            'password' => 'very-secret',
        ]);

        User::factory(3)->admin()->create();
        User::factory(7)->manager()->create();
        User::factory(15)->user()->create();

    }
}
