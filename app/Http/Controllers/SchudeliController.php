<?php

namespace App\Http\Controllers;

use App\Models\Schudeli;
use App\Models\SmenaType;
use App\Models\Lesson;
use Illuminate\Http\Request;

class SchudeliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schudeli = Schudeli::with('smena', 'lesson')->get();
        return view('admin.schudeli.index', compact('schudeli'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $smenatype = SmenaType::all();
        $lessons = Lesson::all();
        return view('admin.schudeli.create', compact('smenatype', 'lessons'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'smena_id' => 'required|integer',
            'lesson_id' => 'required|integer',
            'week_day' => 'required|string',
            'time' => 'required',
            'room' => 'required|string',
            'file' => 'required|mimes:pdf|max:2048', // PDF cheklovi 2MB
        ]);

        $fileName = null;
        if ($request->hasFile('file')) {
            $fileName = time().'_'.$request->file('file')->getClientOriginalName();
            $request->file('file')->move(public_path('admin/files'), $fileName);
        }

        Schudeli::create([
            'smena_id' => $request->smena_id,
            'lesson_id' => $request->lesson_id,
            'week_day' => $request->week_day,
            'time' => $request->time,
            'room' => $request->room,
            'file' => $fileName,
        ]);

        return redirect()->route('admin.schudeli.index')->with('success', 'PDF saqlandi!');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $schudeli = Schudeli::with('smena', 'lesson')->findOrFail($id);
        return view('admin.schudeli.show', compact('schudeli'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $schudeli = Schudeli::findOrFail($id);
        $smenatype = SmenaType::all();
        $lessons = Lesson::all();
        return view('admin.schudeli.edit', compact('schudeli', 'smenatype', 'lessons'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $requestData = $request->validate([
            'smena_id' => 'required',
            'lesson_id' => 'required',
            'week_day' => 'required',
            'room' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp,pdf',
            'time' => 'required',
        ]);

        $schudeli = Schudeli::findOrFail($id);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('admin/images/'), $imageName);
            $requestData['image'] = $imageName;
        } else {
            $requestData['image'] = $schudeli->image; // eski rasmni saqlab qolamiz
        }

        $schudeli->update($requestData);

        return redirect()->route('admin.schudeli.show', $schudeli->id)->with('success', 'Dars jadvali yangilandi!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Schudeli::destroy($id);
        return redirect()->route('admin.schudeli.index')->with('success', 'Dars jadvali o‘chirildi!');
    }
}
