<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $roles = Role::whereIn('id', $request->roles)->pluck('name')->toArray();
        $user->assignRole($roles);

        return redirect()->route('admin.users.index')->with('success', 'Foydalanuvchi muvaffaqiyatli yaratildi.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::with('roles')->findOrFail($id);
        return view('admin.user.show', compact('user'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        $userRoles = $user->roles->pluck('name')->toArray(); // foydalanuvchining hozirgi rollari

        return view('admin.user.edit', compact('user', 'roles', 'userRoles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'password' => ['nullable', 'string', 'min:8'],
            'roles' => ['required', 'array']
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        // Agar parol kiritilgan bo‘lsa, yangilaymiz
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        // Rollarni yangilash
        $roles = Role::whereIn('id', $request->roles)->pluck('name')->toArray();
        $user->syncRoles($roles);

        return redirect()->route('admin.users.index')->with('success', 'Foydalanuvchi muvaffaqiyatli yangilandi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        // SuperAdminni o‘chirishni cheklash
        if ($user->hasRole('SuperAdmin')) {
            return redirect()->route('admin.users.index')->with('error', 'SuperAdmin foydalanuvchini o‘chirish mumkin emas.');
        }

        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'Foydalanuvchi muvaffaqiyatli o‘chirildi.');
    }
}
