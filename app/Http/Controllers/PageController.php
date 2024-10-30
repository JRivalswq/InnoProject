<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class PageController extends Controller
{
    public function show():mixed{
        $products = Product::showAll();
        return view('catalogue', ['products' => $products]);
    }
}
