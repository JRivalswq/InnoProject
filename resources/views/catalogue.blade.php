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
                <div class="header_wrapper_button">
                    <a href="{{ route('admin.index') }}">Adminer</a>
                </div>
            </div>
        </div>
    </header>
    <main>
        <section>
            <ul class="main_catalogue">
                @foreach($products as $product)
                <li class="main_catalogue_card">
                    <a href="{{ route('catalogue.show', $product->id) }}">
                        <img alt="product_image" src="{{ asset('/img/' . $product->image )}}">
                        <div class="main_catalogue_card_bot">
                            <span>{{ $product->name }}</span>
                            <span>{{ $product->price }} BYN</span>
                        </div>
                    </a>
                </li>
                @endforeach
            </ul>
            <div>
                {{ $products->links() }}
            </div>
        </section>
    </main>
</body>
</html>
