<?php

namespace App\Http\Controllers\Admin;

use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Rollar ro‘yxati
     */
    public function index()
    {
        $roles = Role::with('permissions')->get();
        return view('admin.role.index', compact('roles'));
    }

    /**
     * Yangi rol yaratish formasi
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('admin.role.create', compact('permissions'));
    }

    /**
     * Yangi rol saqlash
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles',
            'permissions' => 'required|array'
        ]);

        $role = Role::create(['name' => $request->name]);

        // Tanlangan permissionlarni rolega biriktirish
        $role->syncPermissions($request->permissions);

        return redirect()
            ->route('admin.roles.index')
            ->with('success', 'Rol muvaffaqiyatli yaratildi.');
    }

    /**
     * Rolni tahrirlash formasi
     */
    public function edit(string $id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        return view('admin.role.edit', compact('role', 'permissions'));
    }

    /**
     * Rolni yangilash
     */
    public function update(Request $request, string $id)
    {
        $role = Role::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . $role->id,
            'permissions' => 'required|array'
        ]);

        $role->update(['name' => $request->name]);
        $permissionNames = Permission::whereIn('id', $request->permissions)
                             ->pluck('name')
                             ->toArray();

            $role->syncPermissions($permissionNames);


        return redirect()
            ->route('admin.roles.index')
            ->with('success', 'Rol muvaffaqiyatli yangilandi.');
    }

    public function show(string $id)
{
    $role = Role::with('permissions')->findOrFail($id);
    return view('admin.role.show', compact('role'));
}

    /**
     * Rolni o‘chirish
     */
    public function destroy(string $id)
    {
        $role = Role::findOrFail($id);

        if (in_array($role->name, ['SuperAdmin', 'Admin'])) {
            return redirect()
                ->route('admin.roles.index')
                ->with('error', 'Ushbu rolni o‘chirish mumkin emas.');
        }

        // Permissionlarni olib tashlash
        $role->syncPermissions([]);
        $role->delete();

        return redirect()
            ->route('admin.roles.index')
            ->with('success', 'Rol muvaffaqiyatli o‘chirildi.');
    }
}
