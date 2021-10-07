<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        // Create Roles
        $permissions = Permission::pluck('id','id')->all();
        
        $role = Role::create(['name' => 'Super Admin']);

        $role->syncPermissions($permissions);

        $admin_role = Role::create(['name' => 'Admin']);
        
        $admin_role->syncPermissions($permissions);

        // Create User
        $super_user = User::create([
            'name' => 'Super Admin',
            'email' => 'super.admin@example.com',
            'password' => Hash::make('admin')
        ]);
        
        $super_user->assignRole('Super Admin');

        $user = User::create([
            'name' => 'Achyut Khadka',
            'email' => 'achyut.khadka@gmail.com',
            'password' => Hash::make('admin')
        ]);
        
        $user->assignRole('Super Admin');
    }
}
