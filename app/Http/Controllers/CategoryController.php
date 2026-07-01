<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Categorychildren;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Barcha kategoriyalarni ularning bolalari (children) bilan birga olish
        $categories = Category::with('children')->get();

        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();

        // So‘ngra Blade’ga yuboramiz
        return view('admin.category.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name_uz' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:categories,id', // Agar parent kategoriya bo‘lsa
        ]);

        $category = Category::create($validatedData);

        // Agar child kategoriya bo‘lsa — Categorychildren jadvaliga yozamiz
        if ($request->has('children') && is_array($request->children)) {
            foreach ($request->children as $childName) {
                Categorychildren::create([
                    'category_id' => $category->id,
                    'name' => $childName,
                ]);
            }
        }

        return redirect()
            ->route('admin.category.index')
            ->with('success', 'Kategoriya muvaffaqiyatli yaratildi!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::with('children')->findOrFail($id);
        return view('admin.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::with('children')->findOrFail($id);
        $categoryChildren = Categorychildren::all();

        return view('admin.category.edit', compact('category', 'categoryChildren'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name_uz' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
        ]);

        $category = Category::findOrFail($id);
        $category->update($validatedData);

        // Agar child kategoriyalar yangilansa
        if ($request->has('children') && is_array($request->children)) {
            $category->children()->delete(); // Eski bolalarni o‘chiramiz
            foreach ($request->children as $childName) {
                Categorychildren::create([
                    'category_id' => $category->id,
                    'name' => $childName,
                ]);
            }
        }

        return redirect()
            ->route('admin.category.index')
            ->with('success', 'Kategoriya muvaffaqiyatli yangilandi!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);

        // Avval bolalarini o‘chiramiz
        $category->children()->delete();
        $category->delete();

        return redirect()
            ->route('admin.category.index')
            ->with('success', 'Kategoriya muvaffaqiyatli o‘chirildi!');
    }
}
