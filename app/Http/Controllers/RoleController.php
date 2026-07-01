<?php

namespace App\Http\Controllers\Admin;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
   
    public function create()
    {
        $permissions = Permission::all();
        return view('admin.role.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    // Validatsiya
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'roles' => ['required', 'array'],
    ]);

    // Rolni yaratish
    $role = Role::create([
        'name' => $request->name,
    ]);

    // Ruxsatlarni biriktirish
    $permissions = Permission::whereIn('id', $request->roles)->pluck('name')->toArray();
    $role->givePermissionTo($permissions);

    // Muvaffaqiyatli redirect
    return redirect()->route('admin.roles.index')->with('success', 'Role created successfully.');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
