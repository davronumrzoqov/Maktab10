<?php

namespace App\Http\Controllers;

use App\Models\Statictik;
use Illuminate\Http\Request;

class StatictikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $statictik = Statictik::all();
        return view('admin.statictik.index', compact('statictik'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.statictik.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'classesCount' => 'required|integer',
            'studentsCount' => 'required|integer',
            'teachersCount' => 'required|integer',
            'graduatesCount' => 'required|integer',
        ]);

        Statictik::create($validatedData);

        return redirect()->route('admin.statictik.index')->with('success', 'Statistika muvaffaqiyatli qo‘shildi!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $statictik = Statictik::findOrFail($id);
        return view('admin.statictik.show', compact('statictik'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $statictik = Statictik::findOrFail($id);
        return view('admin.statictik.edit', compact('statictik'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'classesCount' => 'required|integer',
            'studentsCount' => 'required|integer',
            'teachersCount' => 'required|integer',
            'graduatesCount' => 'required|integer',
        ]);

        $statictik = Statictik::findOrFail($id);
        $statictik->update($validatedData);

        return redirect()->route('admin.statictik.index')->with('success', 'Ma’lumot yangilandi!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Statictik::destroy($id);
        return redirect()->route('admin.statictik.index')->with('success', 'Ma’lumot o‘chirildi!');
    }
}
