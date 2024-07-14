<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My App')</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        #wrapper {
            display: flex;
            min-height: 100vh;
        }
        #sidebar-wrapper {
            width: 250px;
            background: #f8f9fa;
        }
        #page-content-wrapper {
            width: 100%;
        }
        .sidebar-heading {
            padding: 1rem;
            background-color: #343a40;
            color: white;
            font-size: 1.25rem;
        }
    </style>
</head>
<body>
    <div id="wrapper">
        @include('partials.sidebar') <!-- Include the sidebar here -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                @yield('content') <!-- Main content will be here -->
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
