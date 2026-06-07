@extends('layouts.admin')

@section('title')
User Detail
@endsection

@section('content')

<main class="app-main">

    <div class="app-content-header">
        <div class="container-fluid">
            <h3>User Detail</h3>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">

            <table class="table table-bordered">

                <tr>
                    <th width="200">ID</th>
                    <td>{{ $user->id }}</td>
                </tr>

                <tr>
                    <th>Image</th>
                    <td>
                        @if($user->image)
                            <img src="{{ asset('storage/'.$user->image) }}"
                                 width="120">
                        @else
                            No Image
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
                    <td>{{ $user->role }}</td>
                </tr>

            </table>

        </div>
    </div>

</main>

@endsection