<!-- resources/views/practices/show.blade.php -->
@extends('partials.app')

@section('title', 'Show Practice')

@section('content')
<div class="container my-5">
    <div class="row">
        <!-- Sidebar -->
   

        <!-- Main Content -->
        <div class="col-md-9">
            <h1 class="mb-4">Practice View</h1>
            <div class="card p-4">
                <p><strong>Name:</strong> {{ $practice->name }}</p>
                <p><strong>Email:</strong> {{ $practice->email }}</p>
                <p><strong>Images:</strong></p>
                <div class="row">
                    @if($practice->images)
                        @foreach(json_decode($practice->images) as $image)
                            <div class="col-md-3">
                                <img src="{{ asset('storage/' . $image) }}" alt="Image" class="img-thumbnail mb-2" width="100%">
                            </div>
                        @endforeach
                    @endif
                </div>
                <a href="{{ route('practices.index') }}" class="btn btn-primary mt-3">Back to List</a>
            </div>
        </div>
    </div>
</div>
@endsection
