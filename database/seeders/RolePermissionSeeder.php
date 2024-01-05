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
    }
}
