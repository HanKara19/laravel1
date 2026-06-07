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

            <table class="table table-bordered">
            <tr>
    <th>ID</th>
    <th>Image</th>
    <th>Name</th>
    <th>Email</th>
    <th>Role</th>
    <th>Actions</th>
</tr>

@foreach($users as $user)
<tr>
    <td>{{ $user->id }}</td>

    <td>
        @if($user->image)
            <img src="{{ asset('storage/' . $user->image) }}"
                 width="60"
                 height="60"
                 class="img-thumbnail">
        @else
            No Image
        @endif
    </td>

    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>{{ $user->role }}</td>

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
@endforeach
            </table>

        </div>
    </div>
</main>

@endsection