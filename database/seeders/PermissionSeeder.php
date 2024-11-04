<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'Manage Jobs',
            'Manage Users',
            'Manage Roles',
            'Manage Permissions',
            'Manage Packages',
            'Manage Feedback',
            'Manage Countries',
            'Manage Cities',
            'Manage Site',
            'Manage Companies'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
