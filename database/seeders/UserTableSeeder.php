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
        $user = User::create([
            'name' => 'Achyut Khadka',
            'email' => 'achyut.khadka@gmail.com',
            'password' => Hash::make('admin')
        ]);

        $role = Role::create(['name' => 'Super Admin']);

        $user->assignRole('Super Admin');

        $admin_role = Role::create(['name' => 'Admin']);
     
        $permissions = Permission::pluck('id','id')->all();
   
        $admin_role->syncPermissions($permissions);
    }
}
