@extends('template.main')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center">Categories</h2>

    <div class="d-flex justify-content-between mb-3">
        <button class="btn btn-primary" onclick="window.location.href='{{ route('items.index') }}'">
        <i class="fas fa-home"></i> Home
</button>
    </div>

    <!-- Categories Table -->
    <div class="table-responsive">
        <table class="table table-striped table-hover text-center">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description ?? 'No description available' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Add FontAwesome Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endsection
