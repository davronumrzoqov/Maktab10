<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index()
    {
        $positions = Position::all();
        return view('admin.position.index', compact('positions'));
    }

    public function create()
    {
        return view('admin.position.create');
    }

    public function store(Request $request)
    {
        $requestData = $request->validate([
            'name_uz' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
        ]);

        Position::create($requestData);
        return redirect()->route('admin.position.index')->with('success', 'Lavozim muvaffaqiyatli yaratildi!');
    }

    public function show(string $id)
    {
        $position = Position::findOrFail($id);
        return view('admin.position.show', compact('position'));
    }

    public function edit(string $id)
    {
        $position = Position::findOrFail($id);
        return view('admin.position.edit', compact('position'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name_uz' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
        ]);

        $position = Position::findOrFail($id);
        $position->update($validated);

        return redirect()->route('admin.position.index')->with('success', 'Lavozim muvaffaqiyatli yangilandi!');
    }

    public function destroy(string $id)
    {
        Position::destroy($id);
        return redirect()->route('admin.position.index')->with('success', 'Lavozim o‘chirildi!');
    }
}
