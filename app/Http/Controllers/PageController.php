<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Services;

class PageController extends Controller
{
    public function show():mixed{
        $products = Product::showAll();
        return view('catalogue', ['products' => $products]);
    }

    public function showId(string $id){
        $product = Product::find($id);
        $services = Services::all();
        return view('product', ['product' => $product, 'services' => $services]);
    }

}
