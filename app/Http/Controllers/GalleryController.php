<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Models\HomePageImageTag;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $HomePageImageTag = HomePageImageTag::all();
        $gallerys = Gallery::all();
        return view('admin.gallery.index', compact('gallerys', 'HomePageImageTag'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $HomePageImageTag = HomePageImageTag::all();
        return view('admin.gallery.create', compact('HomePageImageTag'));
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
            $requestData['image'] = 'default.jpg'; // default rasm
        }

        Gallery::create($requestData);
        return redirect()->route('admin.gallery.index')->with('success', 'Gallery created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $gallery = Gallery::findOrFail($id);
        $HomePageImageTag = HomePageImageTag::all();
        return view('admin.gallery.show', compact('gallery', 'HomePageImageTag'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $gallery = Gallery::findOrFail($id);
        $HomePageImageTag = HomePageImageTag::all();
        return view('admin.gallery.edit', compact('gallery', 'HomePageImageTag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $gallery = Gallery::findOrFail($id);

        $requestData = $request->validate([
            'title_uz' => 'required',
            'title_ru' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Eski rasmni o'chirish
            if ($gallery->image && file_exists(public_path('admin/images/' . $gallery->image))) {
                unlink(public_path('admin/images/' . $gallery->image));
            }

            $file = $request->file('image');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('admin/images/'), $imageName);
            $requestData['image'] = $imageName;
        }

        $gallery->update($requestData);

        return redirect()->route('admin.gallery.index')->with('success', 'Gallery updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gallery = Gallery::findOrFail($id);
        if ($gallery->image && file_exists(public_path('admin/images/' . $gallery->image))) {
            unlink(public_path('admin/images/' . $gallery->image));
        }
        $gallery->delete();

        return redirect()->route('admin.gallery.index')->with('success', 'Gallery deleted successfully');
    }
}
