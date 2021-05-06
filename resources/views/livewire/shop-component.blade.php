<div>
    <div class="wrap-breadcrumb">
        <ul>
            <li class="item-link"><a href="#" class="link">home</a></li>
            @isset($parent_title)
            <li class="item-link"><a href="/shop/{{ $parent_slug }}" class="link">{{ $parent_title }}</a></li>
            @endisset
            <li class="item-link"><span>{{ $category_title }}</span></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
            <div class="banner-shop">
                <a href="#" class="banner-link">
                    <figure><img src="{{ asset('images/'.$category_image) }}" alt="{{ $category_title }}"></figure>
                </a>
            </div>
            <div class="wrap-shop-control">
                <h1 class="shop-title">{{ $category_title }}</h1>
                <div class="wrap-right">
                    <div class="sort-item orderby ">
                        <select name="orderby" class="form-select except-chosen" wire:model="sorting" >
                            <option value="default" selected="selected">Default sorting</option>
                            <option value="date">Sort by newness</option>
                            <option value="price">Sort by price: low to high</option>
                            <option value="price-desc">Sort by price: high to low</option>
                        </select>
                    </div>

                    <div class="sort-item product-per-page">
                        <select name="post-per-page" class="form-select except-chosen" wire:model="size" >
                            <option value="12" selected="selected">12 per page</option>
                            <option value="16">16 per page</option>
                            <option value="18">18 per page</option>
                            <option value="21">21 per page</option>
                            <option value="24">24 per page</option>
                            <option value="30">30 per page</option>
                            <option value="32">32 per page</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <ul class="product-list grid-products equal-container">
                    @foreach ($products as $product )
                    <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
                        <div class="product product-style-3 equal-elem ">
                            <div class="product-thumnail">
                                <a href="{{ route('product.detail', ['slug'=>$product->slug]) }}" title="{{ $product->name }}">
                                    <figure><img src="{{ asset('images/products')}}/{{ $product->image }}" alt="{{ $product->name }}"></figure>
                                </a>
                            </div>
                            <div class="product-info">
                                <a href="{{ route('product.detail', ['slug'=>$product->slug]) }}" class="product-name"><span>{{ $product->name }}</span></a>
                                <div class="wrap-price"><span class="product-price">R {{ $product->regular_price }}</span></div>
                                <a href="#" wire:click.prevent="store('{{ $product->id }}', '{{ $product->name }}', '{{ $product->regular_price }}')" class="btn add-to-cart">Add To Cart</a>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>

            </div>

            <div class="wrap-pagination-info">
                {{ $products->links() }}
            </div>
        </div>

        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
            <div class="widget mercado-widget categories-widget">
                <h2 class="widget-title">All Categories</h2>
                <div class="widget-content">
                    <ul class="list-category">
                        @foreach ($categories as $k=>$v )
                            @if ($k == 0)
                                @foreach ( $v as $q=>$w)
                                    @if (array_key_exists($q, $categories))
                                    <li class="category-item has-child-cate @if($parent_slug==$w[1]) open @endif">
                                        <a href="/shop/{{ $w[1] }}" class="@if($category_slug==$w[1]) active @endif">{{ $w[0] }} </a>
									    <span class="toggle-control">+</span>
                                        <ul class="sub-cate">
                                            @foreach ($categories as $e=>$r )
                                                @if ($e==$q)
                                                    @foreach ($r as $t=>$y )
                                                        <li class="category-item"><a href="/shop/{{ $w[1] }}/{{ $y[1] }}" class=" @if($category_slug==$y[1]) active @endif" >{{ $y[0] }}</a></li>
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                    @else
                                    <li class="category-item">
                                        <a href="/shop/{{ $w[1] }}" class=" @if($category_slug==$w[1]) active @endif">{{ $w[0] }}</a>
                                    </li>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach

                    </ul>
                </div>
            </div>
            @livewire('products.popular')

        </div><!--end sitebar-->

    </div><!--end row-->

</div><!--end container-->


