<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryTopp;

class CategoryTop extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoryTop = CategoryTopp::all();
        return view('admin.categoryTop.index', compact('categoryTop'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categoryTop.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validatsiya
        $validated = $request->validate([
            'name_uz' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'url' => 'required|string|max:255',
        ]);

        // Tozalash olib tashlandi — foydalanuvchi to‘liq URL yoki nisbiy yo‘l kirita oladi
        CategoryTopp::create($validated);

        return redirect()->route('admin.CategoryTop.index')
            ->with('success', 'Kategoriya muvaffaqiyatli yaratildi!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = CategoryTopp::findOrFail($id);
        return view('admin.CategoryTop.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = CategoryTopp::findOrFail($id);
        return view('admin.CategoryTop.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name_uz' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'url' => 'required|string|max:255',
        ]);

        // Tozalash olib tashlandi
        $category = CategoryTopp::findOrFail($id);
        $category->update($validated);

        return redirect()->route('admin.CategoryTop.index')
            ->with('success', 'Kategoriya muvaffaqiyatli yangilandi!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = CategoryTopp::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.CategoryTop.index')
            ->with('success', 'Kategoriya muvaffaqiyatli o‘chirildi!');
    }
}
