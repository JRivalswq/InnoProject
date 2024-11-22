<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\CurrencyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;

class PageController extends Controller
{
    public function show()
    {
        $products = Product::paginate(3);
        return view('catalogue', ['products' => $products]);
    }

    public function showId(string $id, Request $request)
    {
        $product = Product::find($id);

        if (!$product) {
            abort(404, 'Product not found');
        }

        $currencyController = new CurrencyController();
        $currencyRates = $currencyController->getCurrency();

        $selectedCurrency = $request->query('currency', Cookie::get('currency', 'BYN'));

        if ($request->has('currency')) {
            Cookie::queue('currency', $selectedCurrency, 60 * 24);
        }

        $convertedPrice = $product->price;

        if (isset($currencyRates[$selectedCurrency]['buy'])) {
            $convertedPrice = $product->price / $currencyRates[$selectedCurrency]['buy'];
        }

        $servicesController = new ServicesController();
        $services = $servicesController->index();

        foreach ($services as $service) {
            $service->converted_price = $service->price;
            if (isset($currencyRates[$selectedCurrency]['buy'])) {
                $service->converted_price = $service->price / $currencyRates[$selectedCurrency]['buy'];
            }
        }

        return view('product', [
            'product' => $product,
            'currency' => $currencyRates,
            'selectedCurrency' => $selectedCurrency,
            'convertedPrice' => $convertedPrice,
            'services' => $services,
        ]);
    }

}
