@extends('layouts.master')

@section('slider')
     @include('front.slider')
@endsection

@section('content')
     	<!-- Featured Products Section -->
		 <div class="section" style="margin-top: 120px;">
    <div class="container">

        <div class="row">

            <div class="col-md-12">
                <div class="section-title">
                    <h2 class="title">Featured Technology Products</h2>
                </div>
            </div>

            @php
    $featuredProducts = [
        [
            'id' => 6,
            'title' => 'iPhone 17',
            'price' => '49,999.99',
            'image' => '1_org_zoom.webp',
        ],
        [
            'id' => 7,
            'title' => 'iPhone 15',
            'price' => '67,777.00',
            'image' => 'iPhone 15 1.jpeg',
        ],
        [
            'id' => 10,
            'title' => 'iPhone 16',
            'price' => '56,999.00',
            'image' => 'iPhone 16 1.webp',
        ],
        [
            'id' => 11,
            'title' => 'iPhone 18',
            'price' => '180,000.00',
            'image' => 'The iPhone 18.jpeg',
        ],
        [
            'id' => 8,
            'title' => 'HP Omen Max 16',
            'price' => '89,000.00',
            'image' => 'OMEN Max 16 inch Gaming Laptop.png',
        ],
        [
            'id' => 9,
            'title' => 'Lenovo LOQ',
            'price' => '99,999.00',
            'image' => 'Lenovo Loq 15IAX9.jpg',
        ],
        [
            'id' => 13,
            'title' => 'Gaming Headset',
            'price' => '12,000.00',
            'image' => 'kulaklık1.jpeg',
        ],
        [
            'id' => 12,
            'title' => 'Smart Watch',
            'price' => '25,000.00',
            'image' => 'smartwatch.jpeg',
        ],
		[
            'id' => 12,
            'title' => 'Smart Watch',
            'price' => '25,000.00',
            'image' => 'smartwatch.jpeg',
        ],
		[
            'id' => 14,
            'title' => 'PC',
            'price' => '250,000.00',
            'image' => 'Apple iMac.webp',
        ],
		[
            'id' => 15,
            'title' => 'Phone Accessories',
            'price' => '100.00',
            'image' => 'phone-accessories.png',
        ],
		
    ];
@endphp

            @foreach($featuredProducts as $item)

                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="product product-single">

                        <div class="product-thumb">
						<a href="{{ route('product.detail', $item['id']) }}">
                                <img src="{{ asset('assets/img/products/' . $item['image']) }}"
                                     alt="{{ $item['title'] }}"
                                     style="height:220px; object-fit:contain; width:100%; background:#fff;">
                            </a>
                        </div>

                        <div class="product-body">

                            <h3 class="product-price">
                                ${{ $item['price'] }}
                            </h3>

                            <h2 class="product-name">
							<a href="{{ route('product.detail', $item['id']) }}">
                                    {{ $item['title'] }}
                                </a>
                            </h2>

                            <div class="product-btns">
							<a href="{{ route('product.detail', $item['id']) }}" class="primary-btn add-to-cart">
    <i class="fa fa-search-plus"></i>
    View Product
</a>
                            </div>

                        </div>

                    </div>
                </div>

            @endforeach

        </div>

    </div>
</div>
<!-- /Featured Products Section -->
 @endsection