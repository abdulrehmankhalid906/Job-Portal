<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Permission;

class AssignPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdminRole = Role::where('name', 'Super Admin')->first();
        $companyRole = Role::where('name', 'Company')->first();
    
        $permissions = Permission::get();
    
        $superAdminRole->syncPermissions($permissions);
    
        $companyPermissions = $permissions->whereIn('id', [1, 6]);
        $companyRole->syncPermissions($companyPermissions);
    }
}
