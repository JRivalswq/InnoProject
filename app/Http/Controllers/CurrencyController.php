<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

use App\Models\Currency;

class CurrencyController extends Controller
{
    function getCurrency():array
    {
        return Cache::remember('exchange_rates', 86400, function () {
            $response = Http::get('https://bankdabrabyt.by/export_courses.php');

            if ($response->ok()) {
                $xml = simplexml_load_string($response->body());

                $rates = [];
                foreach ($xml->filials->filial as $filial) {
                    if ((string)$filial['name'] === 'Центральный офис') {
                        foreach ($filial->rates->value as $rate) {
                            $iso = (string) $rate['iso'];
                            $buyRate = (float) $rate['buy'];
                            $rates[$iso] = ['buy' => $buyRate];
                        }
                        break;
                    }
                }

                return $rates;
            }

            return [];
        });
        }

    public function setCurrency(Request $request)
    {
        $currency = $request->input('currency');

        // Проверяем, что валюта поддерживается
        $allowedCurrencies = ['BYN', 'USD', 'EUR', 'RUB'];
        if (!in_array($currency, $allowedCurrencies)) {
            return response()->json(['error' => 'Invalid currency'], 400);
        }

        // Сохраняем валюту в куки
        return response()->json(['success' => true])->cookie(
            'selected_currency', $currency, 1440 // 1440 минут = 24 часа
        );
    }

    }

