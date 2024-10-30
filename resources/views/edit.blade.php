@extends('auth.layouts')

@section('content')
<div class="container my-4">
    <h2>Edit User</h2>
    <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Input Nama -->
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
        </div>

        <!-- Input Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
        </div>

        <!-- Input Foto -->
        <div class="mb-3">
            <label for="photo" class="form-label">Photo</label><br>
            @if($user->photo)
                <img src="{{ asset('storage/' . $user->photo) }}" width="100px" class="img-thumbnail mb-2">
            @else
                <p>No photo available</p>
            @endif
            <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
        </div>

        <!-- Tombol Submit -->
        <button type="submit" class="btn btn-success">Update User</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection