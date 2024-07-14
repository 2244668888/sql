<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Category</title>
</head>
<body>
    <div class="container">
        <h1>Category Edit </h1>
        <form action="{{ route('categories.update',$categories->id) }}"method="post">
            @csrf
            @method('PUT')
            <label>ID</label><br>
            <input type="text" name="id" id="id" value="{{ $categories->id}}"><br><br>
            <label>Name</label><br>
            <input type="text" name="name" id="name" value="{{ $categories->name}}"><br><br>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>