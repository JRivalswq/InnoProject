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
    <div class="create_form_wrap">
        <div>
            <a href="{{route('admin.index')}}">Back</a>
        </div>
        <form class="create_form" action="{{ route('admin.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name"  class="form-control" id="name" placeholder="{{$products[0]["name"]}}">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description" placeholder="{{$products[0]["description"]}}"></textarea>
                <label for="brand">Brand</label>
                <input type="text" name="brand" class="form-control" id="brand" placeholder="{{$products[0]["brand"]}}">
                <label for="release_date">Release date (YYYY-MM--DD)</label>
                <input type="text" name="release_date" class="form-control" id="release_date" placeholder="{{$products[0]["release_date"]}}">
                <label for="price">Price</label>
                <input type="number" name="price" class="form-control" id="price" placeholder="{{$products[0]["price"]}}">
                <label for="image">Img name</label>
                <input type="text" name="image" class="form-control" id="image" placeholder="{{$products[0]["image"]}}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</main>
</body>
</html>
