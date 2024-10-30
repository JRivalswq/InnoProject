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
        <form class="create_form" action="{{ route('admin.update', $products->id ) }}" method="post">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name"  class="form-control" id="name" placeholder="{{$products->name}}">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description" placeholder="{{$products->description}}"></textarea>
                <label for="brand">Brand</label>
                <input type="text" name="brand" class="form-control" id="brand" placeholder="{{$products->brand}}">
                <label for="release_date">Release date (YYYY-MM--DD)</label>
                <input type="text" name="release_date" class="form-control" id="release_date" placeholder="{{$products->release_date}}">
                <label for="price">Price</label>
                <input type="number" name="price" class="form-control" id="price" placeholder="{{$products->price}}">
                <label for="image">Img name</label>
                <input type="text" name="image" class="form-control" id="image" placeholder="{{$products->image}}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</main>
</body>
</html>
