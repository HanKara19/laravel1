
@extends('layouts.admin')

@section('title')
User Detail
@endsection

@section('content')

<main class="app-main">

    <div class="app-content-header">
        <div class="container-fluid">
            <h3 class="mb-0">User Detail</h3>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">

            <div class="card">
                <div class="card-body">

                    <table class="table table-bordered table-striped">

                        <tr>
                            <th width="200">ID</th>
                            <td>{{ $user->id }}</td>
                        </tr>

                        <tr>
                            <th>Image</th>
                            <td>
                                @if($user->image)
                                    <img src="{{ asset('storage/' . $user->image) }}"
                                         width="120"
                                         height="120"
                                         class="img-thumbnail"
                                         style="object-fit: cover;">
                                @else
                                    <span class="badge bg-secondary">No Image</span>
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <th>Name</th>
                            <td>{{ $user->name }}</td>
                        </tr>

                        <tr>
                            <th>Email</th>
                            <td>{{ $user->email }}</td>
                        </tr>

                        <tr>
                            <th>Role</th>
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
                        </tr>

                        <tr>
                            <th>Created At</th>
                            <td>{{ $user->created_at }}</td>
                        </tr>

                        <tr>
                            <th>Updated At</th>
                            <td>{{ $user->updated_at }}</td>
                        </tr>

                    </table>

                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary">
                        Edit
                    </a>

                    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
                        Back
                    </a>

                </div>
            </div>

        </div>
    </div>

</main>

@endsection
```
