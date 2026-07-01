<?php

namespace App\Http\Controllers;

use App\Models\UsefulResource;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class UserfulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usefulResources = UsefulResource::all();
        return view('admin.usefulResource.index', compact('usefulResources'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.usefulResource.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'title_uz' => 'required|string|max:255',
            'title_ru' => 'required|string|max:255',
            'body_uz'  => 'required|string',
            'body_ru'  => 'required|string',
            'url'      => 'required|url',
        ]);

        // Rasmni yuklash
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('admin/images/'), $imageName);
            $requestData['image'] = $imageName;
        } else {
            $requestData['image'] = 'default.jpg';
        }

        // QR kod yaratish (URL asosida)
        $qrImage = 'qr_' . time() . '.png';
        QrCode::format('png')
            ->size(200)
            ->generate($requestData['url'], public_path('admin/images/' . $qrImage));

        // QR kod fayl nomini saqlaymiz
        $requestData['qr_code'] = $qrImage;

        // Ma'lumotni bazaga yozish
        UsefulResource::create($requestData);

        return redirect()->route('admin.usefulResource.index')->with('success', 'Resurs muvaffaqiyatli qo‘shildi!');
    }


    public function show(string $id)
    {
        $resource = UsefulResource::findOrFail($id);
        return view('admin.usefulResource.show', compact('resource'));
    }

    public function edit(string $id)
    {
        $resource = UsefulResource::findOrFail($id);
        return view('admin.usefulResource.edit', compact('resource'));
    }

    public function update(Request $request, string $id)
{
    $resource = UsefulResource::findOrFail($id);

    $requestData = $request->validate([
        'title_uz' => 'required|string|max:255',
        'title_ru' => 'required|string|max:255',
        'body_uz'  => 'required|string',
        'body_ru'  => 'required|string',
        'url'      => 'required|url',
        'image'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $imageName = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('admin/images/'), $imageName);
        $requestData['image'] = $imageName;

        if ($resource->image && $resource->image !== 'default.jpg') {
            $oldImagePath = public_path('admin/images/' . $resource->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }
    } else {
        $requestData['image'] = $resource->image;
    }

    if ($requestData['url'] !== $resource->url) {
        $qrImage = 'qr_' . time() . '.png';
        QrCode::format('png')
            ->size(200)
            ->generate($requestData['url'], public_path('admin/images/' . $qrImage));
        $requestData['qr_code'] = $qrImage;
    }

    $resource->update($requestData);

    return redirect()
        ->route('admin.usefulResource.index')
        ->with('success', 'Resurs muvaffaqiyatli yangilandi!');
}
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        UsefulResource::destroy($id);
        return redirect()->route('admin.usefulResource.index');
    }
}
