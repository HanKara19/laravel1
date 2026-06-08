@extends('layouts.master')

@section('title')
    Products
@endsection

@section('content')

<div class="section">
    <div class="container">

        <div class="row">

            <div class="col-md-12">
                <div class="section-title">
                    <h2 class="title">All Products</h2>
                </div>
            </div>

            @foreach($products as $product)

                <div class="col-md-3 col-sm-6 col-xs-6">

                    <div class="product product-single">

                        <div class="product-thumb">
                            <a href="{{ route('product.detail', $product->id) }}">
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}"
                                         alt="{{ $product->title }}"
                                         style="height:220px; object-fit:contain; width:100%; background:#fff;">
                                @else
                                    <img src="{{ asset('assets') }}/img/product01.jpg"
                                         alt=""
                                         style="height:220px; object-fit:contain; width:100%; background:#fff;">
                                @endif
                            </a>
                        </div>

                        <div class="product-body">

                            <h3 class="product-price">
                                ${{ number_format($product->price, 2) }}
                            </h3>

                            <h2 class="product-name">
                                <a href="{{ route('product.detail', $product->id) }}">
                                    {{ $product->title }}
                                </a>
                            </h2>

                            <div class="product-btns">

                                <a href="{{ route('product.detail', $product->id) }}"
                                   class="main-btn quick-view">
                                    <i class="fa fa-search-plus"></i>
                                    View
                                </a>

                                <form action="{{ route('cart.add', $product->id) }}"
                                      method="POST"
                                      style="display:inline-block; margin-top:5px;">

                                    @csrf

                                    <input type="hidden" name="quantity" value="1">

                                    <button type="submit"
                                            class="primary-btn add-to-cart">
                                        <i class="fa fa-shopping-cart"></i>
                                        Add to Cart
                                    </button>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </div>
</div>

@endsection