@extends('template.main')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center">My Inventory</h2>

    <!-- Add Item Button -->
    <div class="d-flex justify-content-between mb-3">
        <button class="btn btn-success" onclick="window.location.href='{{ route('items.create') }}'">
            <i class="fas fa-plus"></i> Add Item
        </button>
        <button class="btn btn-primary" onclick="window.location.href='{{ route('categories.index') }}'">
    Categories
</button>
    </div>

    <!-- Inventory Table -->
    <div class="table-responsive">
        <table class="table table-striped table-hover text-center">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Category</th>
                    <th>Item Name</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->category->name ?? 'No Category' }}</td>
                    <td>{{ $item->name }}</td>
                    <td>${{ number_format($item->price, 2) }}</td>
                    <td>
                    <button class="btn btn-warning btn-sm" onclick="window.location.href='{{ route('items.edit', $item->id) }}'">
    <i class="fas fa-edit"></i> Edit
</button>

                        <button class="btn btn-danger btn-sm" onclick="deleteItem(this)">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
function deleteItem(button) {
        let row = button.parentElement.parentElement;
        row.remove();
    }
    </script>

<!-- Add FontAwesome Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endsection

