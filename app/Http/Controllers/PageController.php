<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\ServicesController;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function show()
    {
        $products = Product::all();
        return view('catalogue', ['products' => $products]);
    }

    public function showId(string $id)
    {
        $product = Product::find($id);

        if (!$product) {
            abort(404, 'Product not found');
        }

        $servicesController = new ServicesController();
        $services = $servicesController->index();

        return view('product', [
            'product' => $product,
            'services' => $services,
        ]);
    }
}
