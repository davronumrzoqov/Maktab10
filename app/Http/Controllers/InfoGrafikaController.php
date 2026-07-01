<?php

namespace App\Http\Controllers;

use App\Models\InfoGrafika;
use Illuminate\Http\Request;
use App\Models\HomePageImageTag;

class InfoGrafikaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $HomePageImageTag = HomePageImageTag::all();
        $infoGrafika  = InfoGrafika::all();
        return view('admin.infografika.index', compact('infoGrafika','HomePageImageTag'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.infografika.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'title_uz' => 'required',
            'title_ru' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('admin/images/'), $imageName);
            $requestData['image'] = $imageName;
        } else {
            $requestData['image'] = 'default.jpg';
        }

        InfoGrafika::create($requestData);
        return redirect()->route('admin.infografika.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $infoGrafika = InfoGrafika::findOrFail($id);
        $HomePageImageTag = HomePageImageTag::all();
        return view('admin.infografika.show', compact('infoGrafika','HomePageImageTag'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $infoGrafika = InfoGrafika::findOrFail($id);
        $HomePageImageTag = HomePageImageTag::all();
        return view('admin.infografika.edit', compact('infoGrafika','HomePageImageTag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $infoGrafika = InfoGrafika::findOrFail($id);

        $requestData = $request->validate([
            'title_uz' => 'required',
            'title_ru' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('admin/images/'), $imageName);
            $requestData['image'] = $imageName;
        }

        $infoGrafika->update($requestData);
        return redirect()->route('admin.infografika.index')->with('success', 'InfoGrafika updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $infoGrafika = InfoGrafika::findOrFail($id);

        if ($infoGrafika->image && file_exists(public_path('admin/images/' . $infoGrafika->image))) {
            unlink(public_path('admin/images/' . $infoGrafika->image));
        }

        $infoGrafika->delete();
        return redirect()->route('admin.infografika.index')->with('success', 'InfoGrafika deleted successfully');
    }
}
