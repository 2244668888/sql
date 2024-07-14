<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>User Sales</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Sales for {{ $user->name }}</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Category</th>
                    <th>Stock</th>
                </tr>
            </thead>
            <tbody>
                @foreach($user->categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->price }}</td>
                        <td>{{ $category->quantity }}</td>
                        <td>{{ $category->category }}</td>
                        <td>{{ $category->stock }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('users.index') }}" class="btn btn-secondary mt-3">Back to Users</a>
        <a href="{{ route('sales.create', $user->id) }}" class="btn btn-primary mt-3">Create New Product</a>
    </div>
</body>
</html>
