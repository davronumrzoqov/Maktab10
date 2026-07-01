<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Rollar (agar mavjud bo‘lsa, qayta yaratmaydi)
        $superAdmin = Role::firstOrCreate(['name' => 'Super Admin', 'guard_name' => 'web']);
        $admin = Role::firstOrCreate(['name' => 'Admin', 'guard_name' => 'web']);
        $creator = Role::firstOrCreate(['name' => 'Creator', 'guard_name' => 'web']);

        // Ruxsatlar (permissionlar)
        $createCategory = Permission::firstOrCreate(['name' => 'Create category', 'guard_name' => 'web']);
        $ShowCategory = Permission::firstOrCreate(['name' => 'Show category', 'guard_name' => 'web']);
        $editCategory   = Permission::firstOrCreate(['name' => 'Edit category', 'guard_name' => 'web']);
        $deleteCategory = Permission::firstOrCreate(['name' => 'Delete category', 'guard_name' => 'web']);

        // Agar xohlasang, ruxsatlarni rollarga biriktirish ham mumkin:
        $admin->givePermissionTo([$createCategory, $editCategory]);
        $creator->givePermissionTo([$createCategory]);
        $superAdmin->givePermissionTo(Permission::all());
    }
}
