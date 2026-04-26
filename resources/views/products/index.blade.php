<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Products</title>
    
</head>
<body>
    <h3>Products</h3>
    <a href="{{ route('products.create') }}">Add Product</a>

    <br>
    <table class="border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>Image</th>
                <th>Title</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>    
            @forelse ($products as $product)
                <tr>
                    <td><img src="{{ asset('storage/products/' . $product->image) }}" alt="{{ $product->title }}" width="100"></td>
                    <td>{{ $product->title }}</td>
                    <td>{{ "Rp" . number_format($product->price, 2, ',', '.') }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        <a href="{{ route('products.show', $product->id) }}">Show</a>
                        <a href="{{ route('products.edit', $product->id) }}">Edit</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">data product tidak ada.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    
    <br>
    {{ $products->links() }}

    @if (session('success'))
        <script>alert('{{ session('success') }}');</script>
    @endif
</body>
</html>