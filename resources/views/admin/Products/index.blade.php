@extends('layouts.admin')
@section('title') Products list @endsection

@section('content')

<!--begin::App Main-->
<main class="app-main">

    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-2">
                    <a href="{{ route('admin.product.create') }}" class="btn btn-info mb-2">
                        Add Product
                    </a>
                </div>

                <div class="col-sm-4">
                    <h3 class="mb-0">Products List</h3>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.index') }}">Product</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Products
                        </li>
                    </ol>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content Header-->

    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Categry</th>
                        <th>Title</th>
                        <th>price</th>
                        <th>stock</th>
                        <th>Discount</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th width="180">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>

                            <td>
                                @if($product->category)
                                    {{ $product->category->full_path }}
                                @else
                                    No Category
                                @endif
                            </td>

                            <td>{{ $product->title }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>{{ $product->discount }}</td>
                            <td>
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" width="60">
                                @endif
                            </td>

                            <td>
                                @if($product->status)
                                    <span class="badge bg-success">True</span>
                                @else
                                    <span class="badge bg-danger">False</span>
                                @endif
                            </td>

                            <td>
                                <a href="{{ route('admin.product.show', $product->id) }}"
                                   class="btn btn-info btn-sm">
                                    Show
                                </a>

                                <a href="{{ route('admin.product.edit', $product->id) }}"
                                   class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <form action="{{ route('admin.product.destroy', $product->id) }}"
                                      method="POST"
                                      class="d-inline">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Delete this product?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">
                                No Products found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->

</main>
<!--end::App Main-->

@endsection