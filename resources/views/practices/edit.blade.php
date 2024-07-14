<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Practices</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h1 class="mb-4">Edit Practice</h1>
        <form action="{{ route('practices.update', $practices->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $practices->name }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $practices->email }}" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password">
                <small class="form-text text-muted">Leave blank to keep the current password</small>
            </div>
            <div class="form-group">
                <label for="images">Images:</label>
                <input type="file" class="form-control-file" id="images" name="images[]" multiple>
                <div class="mt-3">
                    @if($practices->images)
                        <div class="row">
                            @foreach(json_decode($practices->images) as $image)
                                <div class="col-md-3">
                                    <img src="{{ asset('storage/' . $image) }}" alt="Image" class="img-thumbnail mb-2" width="100%">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remove_images[]" value="{{ $image }}">
                                        <label class="form-check-label">Remove</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    <!-- Bootstrap JavaScript and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
