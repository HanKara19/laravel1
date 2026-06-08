@extends('layouts.admin')

@section('title', 'Edit User')

@section('content')

<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <h3 class="mb-0">Edit User</h3>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.users.update', $user->id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text"
                           name="name"
                           class="form-control"
                           value="{{ old('name', $user->name) }}"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email"
                           name="email"
                           class="form-control"
                           value="{{ old('email', $user->email) }}"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Role</label>

                    <select name="role" class="form-select" required>
                        @foreach($roles as $role)
                            <option value="{{ $role->name }}"
                                {{ old('role', $user->role) == $role->name || $user->roles->contains('name', $role->name) ? 'selected' : '' }}>
                                {{ ucfirst($role->name) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Profile Image</label>
                    <input type="file"
                           name="image"
                           class="form-control">
                </div>

                @if($user->image)
                    <div class="mb-3">
                        <img src="{{ asset('storage/' . $user->image) }}"
                             width="100"
                             height="100"
                             class="img-thumbnail"
                             style="object-fit: cover;">
                    </div>
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