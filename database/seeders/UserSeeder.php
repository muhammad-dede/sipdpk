<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrator = User::create([
            'name' => 'Administrator',
            'email' => 'administrator@email.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
        ]);

        $administrator->assignRole('administrator');

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
        ]);

        $admin->assignRole('admin');
    }
}
