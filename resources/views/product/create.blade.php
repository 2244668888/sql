<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Product</title>
    <style>
        /* Custom styles for the form */
        .container {
            max-width: 600px;
            margin-top: 30px;
        }

        .form-control-file {
            border-radius: 12px;
            padding: 10px;
        }

        .form-select2 {
            border-radius: 12px;
            background: linear-gradient(145deg, #f5f5f5, #e0e0e0);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-group label {
            font-weight: bold;
        }

        .category-badge {
            display: inline-block;
            padding: 8px 12px;
            margin: 5px;
            border-radius: 20px;
            color: #fff;
            background-color: #007bff; /* Default color */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        /* Badge colors */
        .category-badge.cat-1 { background-color: #FF5733; }
        .category-badge.cat-2 { background-color: #33FF57; }
        .category-badge.cat-3 { background-color: #3357FF; }
        .category-badge.cat-4 { background-color: #F3C300; }
        .category-badge.cat-5 { background-color: #C70039; }
        .category-badge.cat-6 { background-color: #1E90FF; }
        .category-badge.cat-7 { background-color: #FFD700; }
        .category-badge.cat-8 { background-color: #DA70D6; }

        /* Responsive adjustments */
        @media (max-width: 576px) {
            .form-select2 {
                width: 100% !important;
            }
        }

        /* Select2 width adjustment */
        .form-select2 {
            width: 100% !important; /* Ensures the select box takes full width */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Create New Product</h1>
        <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="category_id">Category</label>
                <select name="category_id[]" id="category_id" class="form-select2" multiple="multiple">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" class="cat-{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter product name!" required>
            </div>
            
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" name="quantity" id="quantity" class="form-control" placeholder="Enter product quantity!" required>
            </div>
            
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" step="0.01" name="price" id="price" class="form-control" placeholder="Enter product price!" required>
            </div>
            
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control-file" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.form-select2').select2({
                placeholder: "Select categories",
                allowClear: true
            });
        });
    </script>
</body>
</html>
