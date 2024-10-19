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
            'Manage User',
            'Manage Roles',
            'Manage Permissions',
            'Manage Packages',
            'Manage Feedback',
            'Manage Countries',
            'Manage Cities',
            'Manage Site'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
