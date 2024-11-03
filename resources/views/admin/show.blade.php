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
            <div class="admin_item_wrap">
                <span class="admin_show_title">Id:</span>
                <div>{{ $products->id }}</div>
                <span class="admin_show_title">Name:</span>
                <div>{{ $products->name }}</div>
                <span class="admin_show_title">Description:</span>
                <div>{{ $products->description }}</div>
                <span class="admin_show_title">Brand:</span>
                <div>{{ $products->brand }}</div>
                <span class="admin_show_title">Release date:</span>
                <div>{{ $products->release_date }}</div>
                <span class="admin_show_title">Price:</span>
                <div>{{ $products->price }}</div>
                <span class="admin_show_title">Image:</span>
                <div>{{ $products->image }}</div>
            </div>
        </div>

            <div class="admin_show_btns">
                <div>
                    <a href="{{route('admin.edit', $products->id)}}" class="btn">Edit</a>
                </div>
                <div>
                    <form action="{{route('admin.delete', $products->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Delete" class="btn">
                    </form>
                </div>
                <div>
                    <a href="{{route('admin.index')}}" class="btn">Back</a>
                </div>
            </div>
    </section>
</main>
</body>
</html>
