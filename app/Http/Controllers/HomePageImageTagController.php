<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomePageImageTag;

class HomePageImageTagController extends Controller
{
    public function index()
    {
        $HomePageImageTag = HomePageImageTag::all();
        return view('admin.HomePageImageTag.index', compact('HomePageImageTag'));
    }

    public function create()
    {
        return view('admin.HomePageImageTag.create');
    }

    public function store(Request $request)
    {
        $requestData = $request->validate([
            'title_uz' => 'required',
            'title_ru' => 'required',
        ]);

        HomePageImageTag::create($requestData);
        return redirect()->route('admin.HomePageImageTag.index')->with('success', 'Tag yaratildi');
    }

    public function show(string $id)
    {
        $tag = HomePageImageTag::findOrFail($id);
        return view('admin.HomePageImageTag.show', compact('tag'));
    }

    public function edit(string $id)
    {
        $tag = HomePageImageTag::findOrFail($id);
        return view('admin.HomePageImageTag.edit', compact('tag'));
    }

    public function update(Request $request, string $id)
    {
        $requestData = $request->validate([
            'title_uz' => 'required',
            'title_ru' => 'required',
        ]);

        $tag = HomePageImageTag::findOrFail($id);
        $tag->update($requestData);

        return redirect()->route('admin.HomePageImageTag.index')->with('success', 'Tag yangilandi');
    }

    public function destroy(string $id)
    {
        HomePageImageTag::destroy($id);
        return redirect()->route('admin.HomePageImageTag.index')->with('success', 'Tag o‘chirildi');
    }
}
