<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Table</title>
    <style>
        th,
        td {
            padding: 15px;
            text-align: left;
        }

        th,
        td {
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>

<body>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a class="btn btn-info btn-sm" href="{{ route('category.edit', $category->id) }}">Edit<i
                                    class="bi bi-pencil"></i>
                            </a>
                            <a class="btn btn-dark btn-sm" href="{{ route('category.view', $category->id) }}">View<i
                                class="bi bi-eye"></i>
                        </a>
                            <a href="{{ route('delete', $category->id) }}" class="btn btn-danger btn-sm"
                                data-bs-toggle="modal" data-bs-target="#modal">Delete
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT0vuK9QKN5ScE34lKxfpBB8a5RxuK0EkfQ6El8Y3QG6L/A4c" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-pzjw8f+ua7Kw1TIqmr4MCR85QIDDtv2iDbQFzT5yl3nQ4L+d63Dd6lrFy0nbcQl4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-smHYkd2EDy3e9aaRIzFxz0bDQbbEiwM4xHBPHEl5fHRhrpZvhJ+8abtTE1Pi6jizo" crossorigin="anonymous"></script>