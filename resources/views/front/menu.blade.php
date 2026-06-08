<!-- NAVIGATION -->
<div id="navigation">
    <div class="container">
        <div id="responsive-nav">

            <!-- category nav -->
            <div class="category-nav">
                <span class="category-header">
                    Categories <i class="fa fa-list"></i>
                </span>

                @php
    $frontCategories = \App\Models\Category::with(['products' => function ($query) {
        $query->where('status', 1);
    }])->get();
@endphp

<ul class="category-list">

    <li>
        <a href="{{ route('products') }}">ALL PRODUCTS</a>
    </li>

    @foreach($frontCategories as $category)

        <li class="dropdown side-dropdown">

            <a class="dropdown-toggle"
               data-toggle="dropdown"
               aria-expanded="true">

                {{ strtoupper($category->title ?? $category->name) }}

                <i class="fa fa-angle-right"></i>
            </a>

            <div class="custom-menu">

                <ul class="list-links">

                    @forelse($category->products as $product)

                        <li>
                            <a href="{{ route('product.detail', $product->id) }}">
                                {{ $product->title }}
                            </a>
                        </li>

                    @empty

                        <li>
                            <a href="#">
                                No products
                            </a>
                        </li>

                    @endforelse

                </ul>

            </div>

        </li>

    @endforeach

</ul>
</div>
            <!-- /category nav -->

            <!-- menu nav -->
            <div class="menu-nav">
                <span class="menu-header">
                    Menu <i class="fa fa-bars"></i>
                </span>

                <ul class="menu-list">

                    <li>
                        <a href="{{ route('home') }}">HOME</a>
                    </li>

                    <li>
                        <a href="{{ route('products') }}">PRODUCTS</a>
                    </li>

                    <li>
                        <a href="{{ route('cart.index') }}">CART</a>
                    </li>

                    <li>
                        <a href="{{ route('checkout') }}">CHECKOUT</a>
                    </li>

                    @auth
                        @if(Auth::user()->role == 'admin')
                            <li>
                                <a href="{{ route('admin.index') }}">ADMIN PANEL</a>
                            </li>
                        @endif
                    @endauth

                </ul>
            </div>
            <!-- /menu nav -->

        </div>
    </div>
</div>
<!-- /NAVIGATION -->