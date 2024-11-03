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
        <div class="header_wrapper_logo"></div>
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
                        <input type="checkbox" id="service-{{ $service->id }}" name="services[]" value="{{ $service->price }}" onchange="updatePrice(this.value, this.checked)">
                        <label for="service-{{ $service->id }}">{{ $service->name }} ({{ $service->price }} BYN)</label>
                    </div>
                @endforeach

                <span>{{ $product->description }}</span>
                <div class="product_info_price">
                    <strong>Цена: <span id="product-price" data-base-price="{{ $product->price }}">{{ $product->price }}</span> BYN</strong>
                </div>
            </div>
        </div>
    </section>
</main>

<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
