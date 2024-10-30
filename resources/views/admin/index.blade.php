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
    <div>
    <div>
        <a href="{{route('admin.create')}}">Add</a>
    </div>
    @foreach($products as $product)
        <a href="{{ route('admin.show', $product->id) }}"><div>{{ $product->name }}</div></a>
    @endforeach
    </div>
</main>
</body>
</html>
