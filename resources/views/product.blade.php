<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/css/catalogue.css" rel="stylesheet">
    <title>Products</title>
</head>
<body>
<header>
    <div class="header-wrapper">
        <div class="header_wrapper_logo">
            <ul>
                <li>
                    <a href="{{ route('catalogue.show', ['id' => $product->id, 'currency' => 'BYN']) }}"
                       class="{{ $selectedCurrency == 'BYN' ? 'active' : '' }}">BYN</a>
                </li>
                <li>
                    <a href="{{ route('catalogue.show', ['id' => $product->id, 'currency' => 'USD']) }}"
                       class="{{ $selectedCurrency == 'USD' ? 'active' : '' }}">USD</a>
                </li>
                <li>
                    <a href="{{ route('catalogue.show', ['id' => $product->id, 'currency' => 'EUR']) }}"
                       class="{{ $selectedCurrency == 'EUR' ? 'active' : '' }}">EUR</a>
                </li>
                <li>
                    <a href="{{ route('catalogue.show', ['id' => $product->id, 'currency' => 'RUB']) }}"
                       class="{{ $selectedCurrency == 'RUB' ? 'active' : '' }}">RUB</a>
                </li>
            </ul>
        </div>
        <div class="header_wrapper_button">
            <a href="/admin">Adminer</a>
        </div>
    </div>
</header>
<main>
    <section>
        <h2>{{ $product->name }}</h2>
        <div class="product_wrap">
            <div class="product_image_wrap">
                <img alt="product_image" src="{{ asset('/img/' . $product->image )}}">
            </div>
            <div class="product_info_wrap">
                <h3>Доступные услуги</h3>
                <p>Выберите услуги:</p>
                @foreach($services as $service)
                    <div class="service-option">
                        <input type="checkbox" id="service-{{ $service->id }}" name="services[]" value="{{ $service->converted_price }}" onchange="updatePrice(this.value, this.checked)">
                        <label for="service-{{ $service->id }}">
                            {{ $service->name }} ({{ number_format($service->converted_price, 2, '.', ',') }} {{ $selectedCurrency }})
                        </label>
                    </div>
                @endforeach


                <span>{{ $product->description }}</span>
                <div class="product_info_price">
                    <strong>Цена:
                        <span id="product-price">{{ number_format($convertedPrice, 2, '.', ',') }} {{ $selectedCurrency }}</span>
                    </strong>
                </div>
            </div>
        </div>
    </section>
</main>

<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
