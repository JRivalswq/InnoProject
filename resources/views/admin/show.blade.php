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
        <div>{{ $products->id }}</div>
        <div>{{ $products->name }}</div>
        <div>{{ $products->description }}</div>
    </div>
    <div>
        <a href="{{route('admin.edit', $products->id)}}">Edit</a>
    </div>
    <div>
        <form action="{{route('admin.delete', $products->id)}}" method="post">
            @csrf
            @method('delete')
            <input type="submit" value="Delete">
        </form>
    </div>
    <div>
        <a href="{{route('admin.index')}}">Back</a>
    </div>
</main>
</body>
</html>
