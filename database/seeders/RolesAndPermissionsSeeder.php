<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $roles = [
            ['name' => 'admin'],
            ['name' => 'kasir samsat'],
            ['name' => 'kepala samsat'],
            ['name' => 'pptk'],
            ['name' => 'kepala dinas'],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
