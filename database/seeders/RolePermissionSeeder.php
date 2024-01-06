<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin_user = User::where('email', 'superadmin@admin.com')->first();

        $role = Role::create([
            'name' => 'admin',
            'guard_name' => 'web',
        ]);

        $permissions = Permission::where('guard_name', 'web')->pluck('id')->all();

        $admin_user->assignRole($role);
        $role->syncPermissions($permissions);

        //------------------------------------------------------------------------
        /**
        * Another way to seed user and role and permission together
        * you can make you seeder file name as AdminUserAndRolePermissionSeeder
        */
        //------------------------------------------------------------------------
        /*
         // Admin Seeder
        $user = Admin::create([
            'name' => 'Super Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456')
        ]);
        // Create Role
        $role = Role::create(['name' => 'Super Admin', 'guard_name' => 'admin']);
        // Create Permissions
        $permissions = Permission::where('guard_name', 'admin')->pluck('id', 'id')->all();
        // set multiple permissions to this role
        $role->syncPermissions($permissions);
        // Finnaly assign the role to a user
        $user->assignRole([$role->id]);
        */


        
    }
}
