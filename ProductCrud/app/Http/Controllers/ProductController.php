<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $path = $request->file('rasm')->store('photos', 'public');

        Product::create([
            'name' => $request->name,
            'photo' => $path,
            'price' => $request->price,
            'count' => $request->count,
            'brend' => $request->brend,
        ]);

        return redirect()->route('products.index')->with('success', 'Product added!');
    }
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update([
            'name' => $request->name,
            'photo' => $request->photo,
            'price' => $request->price,
            'count' => $request->count,
            'brend' => $request->brend,
        ]);

        return redirect()->route('products.index')->with('success', 'Product updated!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted!');
    }
}
