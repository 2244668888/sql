<!-- resources/views/partials/sidebar.blade.php -->

<div class="card p-3 sidebar">
    <h5>Categories</h5>
    <ul class="list-group">
        <li class="list-group-item">
            <a href="{{ route('dashboard') }}">Dashboard</a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('practices.index') }}">Practices</a>
        </li>
        <li class="list-group-item bg-success">
            <a href="#">Category 1</a>
        </li>
        <li class="list-group-item">
            <a href="#">Category 2</a>
        </li>
        <li class="list-group-item">
            <a href="#">Category 3</a>
        </li>
    </ul>
</div>
