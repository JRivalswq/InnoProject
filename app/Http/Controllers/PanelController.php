<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Panel;
use App\Models\Product;

class PanelController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('admin/index', ['products' => $products]);
    }


    public function create()
    {
        $products = Product::all();
        return view('admin/create', ['products' => $products]);
    }


    public function store()
    {
        $data = request()->validate([
            'name' => 'string',
            'description' => 'string',
            'brand' => 'string',
            'release_date' => 'string',
            'price' => 'string',
            'image' => 'string'
        ]);

        $product = Product::create($data);
        return redirect()->route('admin.index');
    }


    public function show(string $id)
    {
        $products = Product::findOrFail($id);
        return view('admin.show', ['products' => $products]);
    }


    public function edit(string $id)
    {
        $products = Product::findOrFail($id);
        return view('admin.edit', ['products' => $products]);
    }


    public function update(string $id)
    {
        $product = Product::findOrFail($id);
        $data = request()->validate([
            'name' => 'string',
            'description' => 'string',
            'brand' => 'string',
            'release_date' => 'string',
            'price' => 'string',
            'image' => 'string'
        ]);

        $product->update($data);
        return redirect()->route('admin.show', $product->id);
    }


    public function destroy(string $id)
    {
        $products = Product::findOrFail($id);
        $products->delete();
        return redirect()->route('admin.index');
    }

}
