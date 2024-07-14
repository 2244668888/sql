<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practice List</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Optional: Link to your CSS -->
    <style>
        /* Optional: Custom CSS to ensure no extra margins or paddings */
        body {
            padding-top: 20px;
            padding-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 p-0">
                @include('partials.sidebar')  <!-- Sidebar Include -->
            </div>

            <!-- Main Content -->
            <div class="col-md-9">
                <h1 class="my-4">Practice List</h1>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="mb-3">
                    <a href="{{ route('practices.create') }}" class="btn btn-primary">Add New Practice</a>
                </div>

                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Sr #</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Images</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($practices as $practice)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $practice->name }}</td>
                                <td>{{ $practice->email }}</td>
                                <td>
                                    @if($practice->images)
                                        @foreach(json_decode($practice->images) as $image)
                                            <img src="{{ asset('storage/' . $image) }}" alt="Image" width="100" class="img-thumbnail">
                                        @endforeach
                                    @endif
                                </td>
                                <td class="d-flex justify-content-between">
                                    <a href="{{ route('practices.show', $practice->id) }}" class="btn btn-info btn-sm">View</a>
                                    <a href="{{ route('practices.edit', $practice->id) }}" class="btn btn-warning btn-sm mx-1">Edit</a>
                                    <form action="{{ route('practices.destroy', $practice->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
