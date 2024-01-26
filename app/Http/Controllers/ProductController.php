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
        // Validasi input
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'stock' => 'required|integer',
            'price' => 'required|numeric',
            'image' => 'required|image',
        ]);

        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->stock = $request->input('stock');
        $product->price = $request->input('price');

        $image = $request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('imageProduct'), $filename);
        $product->image = $filename;

        $product->save();

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function show($id)
    {
        $product = Product::find($id);

        return view('products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::find($id);

        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'stock' => 'required|numeric',
            'price' => 'required|numeric',
        ]);

        // Temukan produk yang akan diupdate
        $product = Product::find($id);

        // Update produk
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->stock = $request->input('stock');
        $product->price = $request->input('price');

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika perlu
            // Storage::delete($product->image);

            // Unggah gambar yang baru
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('imageProduct'), $filename);
            $product->image = $filename;
        }

        $product->save();

        // Redirect ke halaman daftar produk
        return redirect()->route('products.index');
    }



    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('products.index');
    }
}
