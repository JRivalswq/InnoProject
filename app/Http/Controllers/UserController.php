<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;

class UserController extends Controller
{
    public function show():mixed{
        $products = Product::showAll();
        return view('admin', ['products' => $products]);
    }
}
