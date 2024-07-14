<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Categories</title>
    <style>
        .category-box {
            padding: 12px 16px;
            margin: 5px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            color: #0a0a0a;
            font-size: 0.9em;
            background: #f7f4f4; /* Fallback background */
            background: linear-gradient(145deg, #f3eeee, hsl(192, 73%, 75%)); /* Subtle gradient background */
        }

        .category-box .badge {
            padding: 6px 12px;
            border-radius: 12px;
            font-size: 0.8em;
            margin-right: 12px;
            text-align: center;
        }

        .category-box .category-name {
            font-weight: 600;
        }

        /* Optional: Enhance the table appearance */
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 6px 12px;
            border-radius: 4px;
            border: 1px solid #ddd;
            background: #f9f9f9;
            color: #007bff;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current,
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: #007bff;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Add Product</a>
        <table id="productsTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Product Price</th>
                    <th>Product Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>
                        @foreach($product->categories as $category)
                        <div class="category-box" style="background-color: {{ $categoryColors[$category->id] }};">
                            <span class="badge" style="background-color: {{ $badgeColors[$category->id] }};">
                                {{ $category->id }}
                            </span>
                            <span class="category-name">{{ $category->name }}</span>
                        </div>
                        @endforeach
                    </td>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        <img src="{{ asset('public/images/'.$product->image ) }}" width="70px" height="70px" alt="">
                    </td>
                    <td>
                        <a class="btn btn-secondary btn-sm" href="{{ route('products.edit', $product->id) }}">
                            Edit <i class="bi bi-pencil"></i>
                        </a>
                        <a class="btn btn-dark btn-sm" href="{{ route('products.show', $product->id) }}">
                            View <i class="bi bi-eye"></i>
                        </a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline"
                            onsubmit="return confirmDelete()">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                Delete <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha384-J6qa4849blE2+poT0vuK9QKN5ScE34lKxfpBB8a5RxuK0EkfQ6El8Y3QG6L/A4c" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"
        integrity="sha384-pzjw8f+ua7Kw1TIqmr4MCR85QIDDtv2iDbQFzT5yl3nQ4L+d63Dd6lrFy0nbcQl4" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-smHYkd2EDy3e9aaRIzFxz0bDQbbEiwM4xHBPHEl5fHRhrpZvhJ+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function() {
            $('#productsTable').DataTable({ 
                "paging": true,
                "searching": true,
                "info": true,
                "lengthChange": false,
                "pageLength": 5,
                "language": {
                    "search": "Filter Records:"
                }
            });
        });

        function confirmDelete() {
            return confirm('Are you sure you want to delete this item?');
        }
    </script>
</body>
</html>

