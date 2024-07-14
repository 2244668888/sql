<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create or Update Product</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Product Update</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('sales.store') }}" method="POST">
            @csrf
            <input type="hidden" name="user_id" value="{{ $user->id }}">
            <input type="hidden" name="category_id" value="{{ $category->id ?? '' }}">
            <div class="form-group">
                <label for="product_id">Product Id</label>
                <input type="text" name="product_id" id="product_id" class="form-control" value="{{ $category->id }}">
            </div>
            <div class="form-group">
                <label for="product_name">Product Name</label>
                <input type="text" name="product_name" id="product_name" class="form-control" value="{{ $category->name ?? old('product_name') }}">
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" name="price" id="price" class="form-control" value="{{ $category->price ?? old('price') }}" readonly>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" name="quantity" id="quantity" class="form-control" value="{{ old('quantity') }}" min="0" step="1">
            </div>
            <div class="form-group">
                <label for="total_price">Total Price</label>
                <input type="text" name="total_price" id="total_price" class="form-control" value="{{ old('total_price') }}" readonly>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <a href="{{ route('categories.index', $user->id) }}" class="btn btn-secondary mt-3">Back to User</a>
    </div>

    <script>
        function calculateTotalPrice() {
            const price = parseFloat(document.getElementById('price').value) || 0;
            const quantity = parseFloat(document.getElementById('quantity').value) || 0;
            const totalPrice = price * quantity;
            document.getElementById('total_price').value = totalPrice.toFixed(2);
        }

        window.addEventListener('DOMContentLoaded', (event) => {
            document.getElementById('quantity').addEventListener('input', calculateTotalPrice);
            calculateTotalPrice();
        });
    </script>
</body>
</html>
