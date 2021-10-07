<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        // Role Permissions
        $permissions = [
            'role-list',
            'role-edit',
            'role-delete'
        ];
      
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission, 'group' => 'role']);
        }

        // User Permissions
        $user_permissions = [
            'user-list',
            'user-edit',
            'user-delete'
        ];
      
        foreach ($user_permissions as $user_permission) {
            Permission::create(['name' => $user_permission, 'group' => 'user']);
        }
    }
}
