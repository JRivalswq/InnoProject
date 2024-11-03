<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="/css/admin.css" rel="stylesheet">

    <title>Products</title>
</head>
<body>
<header>
    <div class="header-wrapper">
        <div class="header_wrapper_logo"></div>
        <div class="header_wrapper_button">
            <a href="/">Catalogue</a>
        </div>
    </div>
</header>
<main>
    <section class="admin_section">
        <div class="admin_wrap">
        @foreach($products as $product)
            <div class="admin_item_wrap">
                <span>
                    <a href="{{ route('admin.show', $product->id) }}" class="admin_item_link">
                        {{ $product->name }} {{$product->release_date}} {{ $product->price }}
                    </a>
                </span>
            </div>
            @endforeach
        </div>
        <div>
            <a href="{{route('admin.create')}}" class="btn">Add</a>
        </div>
    </section>
</main>
</body>
</html>
