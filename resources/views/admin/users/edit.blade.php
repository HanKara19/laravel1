@extends('layouts.admin')

@section('title')
Edit User
@endsection

@section('content')

<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <h3 class="mb-0">Edit User</h3>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">

            <form action="{{ route('admin.users.update', $user->id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <label>Name</label>
                <input type="text" name="name" class="form-control"
                       value="{{ old('name', $user->name) }}">
                <br>

                <label>Email</label>
                <input type="email" name="email" class="form-control"
                       value="{{ old('email', $user->email) }}">
                <br>

                <label>Role</label>
                <select name="role" class="form-select">
                    <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
                <br>

                <label>Profile Image</label>
                <input type="file" name="image" class="form-control">
                <br>

                @if($user->image)
                    <img src="{{ asset('storage/' . $user->image) }}"
                         width="100"
                         class="img-thumbnail">
                    <br><br>
                @endif

                <button type="submit" class="btn btn-primary">
                    Save User
                </button>

                <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
                    Back
                </a>

            </form>

        </div>
    </div>
</main>

@endsection