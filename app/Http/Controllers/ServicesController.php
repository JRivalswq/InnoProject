<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Services;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index(){
        $services = Services::all();
        return $services;
    }
}
