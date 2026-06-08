
@extends('layouts.admin')

@section('title')
Users List
@endsection

@section('content')

<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <h3 class="mb-0">Users List</h3>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card">
                <div class="card-body table-responsive p-0">

                    <table class="table table-bordered table-striped table-hover mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th width="220">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>

                                    <td>
                                        @if($user->image)
                                            <img src="{{ asset('storage/' . $user->image) }}"
                                                 width="60"
                                                 height="60"
                                                 class="img-thumbnail"
                                                 style="object-fit: cover;">
                                        @else
                                            <span class="badge bg-secondary">No Image</span>
                                        @endif
                                    </td>

                                    <td>{{ $user->name }}</td>

                                    <td>{{ $user->email }}</td>

                                    <td>
                                        @if($user->roles && $user->roles->count() > 0)
                                            @foreach($user->roles as $role)
                                                <span class="badge bg-primary">
                                                    {{ ucfirst($role->name) }}
                                                </span>
                                            @endforeach
                                        @else
                                            <span class="badge bg-secondary">
                                                {{ ucfirst($user->role ?? 'user') }}
                                            </span>
                                        @endif
                                    </td>

                                    <td>
                                        <a href="{{ route('admin.users.show', $user->id) }}"
                                           class="btn btn-info btn-sm">
                                            Show
                                        </a>

                                        <a href="{{ route('admin.users.edit', $user->id) }}"
                                           class="btn btn-primary btn-sm">
                                            Edit
                                        </a>

                                        <form action="{{ route('admin.users.destroy', $user->id) }}"
                                              method="POST"
                                              style="display:inline;">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Delete this user?')">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">
                                        No users found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>
</main>

@endsection
```
