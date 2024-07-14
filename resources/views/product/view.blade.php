<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product View</title>
    <style>
        .container {
            max-width: 600px;
            margin-top: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-control-plaintext {
            background-color: #f5f5f5;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 5px;
        }

        .image-preview {
            max-width: 100%;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mb-4">Product View</h1>
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                <label for="category_id">Categories</label>
                <input type="text" id="category_id" class="form-control-plaintext" value="{{ $product->categories->pluck('name')->implode(', ') }}" disabled>
            </div>
            
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control-plaintext" value="{{ $product->product_name }}" disabled>
            </div>
            
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="text" name="quantity" id="quantity" class="form-control-plaintext" value="{{ $product->quantity }}" disabled>
            </div>
            
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" name="price" id="price" class="form-control-plaintext" value="{{ $product->price }}" disabled>
            </div>
            
            <div class="form-group">
                <label for="image">Image</label>
                <div class="image-preview">
                    <img src="{{ asset('public/images/'.$product->image) }}" alt="Product Image">
                </div>
            </div>

            <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to Products</a>
        </form>
    </div>
</body>
</html>
