<div>
    <div class="wrap-breadcrumb">
        <ul>
            <li class="item-link"><a href="#" class="link">home</a></li>
            <li class="item-link"><span>Digital & Electronics</span></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
            <div class="banner-shop">
                <a href="#" class="banner-link">
                    <figure><img src="{{ asset('images/shop-banner.jpg') }}" alt=""></figure>
                </a>
            </div>

            <div class="wrap-shop-control">
                <h1 class="shop-title">Digital & Electronics</h1>
                <div class="wrap-right">
                    <div class="sort-item orderby ">
                        <select name="orderby" class="form-select" wire:model="sorting" >
                            <option value="default" selected="selected">Default sorting</option>
                            <option value="date">Sort by newness</option>
                            <option value="price">Sort by price: low to high</option>
                            <option value="price-desc">Sort by price: high to low</option>
                        </select>
                    </div>

                    <div class="sort-item product-per-page">
                        <select name="post-per-page" class="form-select" wire:model="size" >
                            <option value="12" selected="selected">12 per page</option>
                            <option value="16">16 per page</option>
                            <option value="18">18 per page</option>
                            <option value="21">21 per page</option>
                            <option value="24">24 per page</option>
                            <option value="30">30 per page</option>
                            <option value="32">32 per page</option>
                        </select>
                    </div>

                    <div class="change-display-mode">
                        <a href="#" class="grid-mode display-mode active"><i class="fa fa-th"></i>Grid</a>
                        <a href="list.html" class="list-mode display-mode"><i class="fa fa-th-list"></i>List</a>
                    </div>

                </div>

            </div><!--end wrap shop control-->

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
                {{-- <ul class="page-numbers">
                    <li><span class="page-number-item current" >1</span></li>
                    <li><a class="page-number-item" href="#" >2</a></li>
                    <li><a class="page-number-item" href="#" >3</a></li>
                    <li><a class="page-number-item next-link" href="#" >Next</a></li>
                </ul>
                <p class="result-count">Showing 1-8 of 12 result</p> --}}
            </div>
        </div><!--end main products area-->

        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
            <div class="widget mercado-widget categories-widget">
                <h2 class="widget-title">All Categories</h2>
                <div class="widget-content">
                    <ul class="list-category">
                        @foreach ($categories as $k=>$v )
                            <li class="category-item has-child-cate">
                                <a href="#" class="cate-link">{{ $k }}</a>
                                @if(count($v)>0)
                                <ol style="padding-left: 15px;">
                                    @for($i=0; $i<count($v); $i++)
                                    <li class="category-item"><a href="#" class="cate-link">{{ $v[$i] }}</a></li>
                                    @endfor
                                </ol>
                                @endif
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div><!-- Categories widget-->
<!--
            <div class="widget mercado-widget filter-widget brand-widget">
                <h2 class="widget-title">Brand</h2>
                <div class="widget-content">
                    <ul class="list-style vertical-list list-limited" data-show="6">
                        <li class="list-item"><a class="filter-link active" href="#">Fashion Clothings</a></li>
                        <li class="list-item"><a class="filter-link " href="#">Laptop Batteries</a></li>
                        <li class="list-item"><a class="filter-link " href="#">Printer & Ink</a></li>
                        <li class="list-item"><a class="filter-link " href="#">CPUs & Prosecsors</a></li>
                        <li class="list-item"><a class="filter-link " href="#">Sound & Speaker</a></li>
                        <li class="list-item"><a class="filter-link " href="#">Shop Smartphone & Tablets</a></li>
                        <li class="list-item default-hiden"><a class="filter-link " href="#">Printer & Ink</a></li>
                        <li class="list-item default-hiden"><a class="filter-link " href="#">CPUs & Prosecsors</a></li>
                        <li class="list-item default-hiden"><a class="filter-link " href="#">Sound & Speaker</a></li>
                        <li class="list-item default-hiden"><a class="filter-link " href="#">Shop Smartphone & Tablets</a></li>
                        <li class="list-item"><a data-label='Show less<i class="fa fa-angle-up" aria-hidden="true"></i>' class="btn-control control-show-more" href="#">Show more<i class="fa fa-angle-down" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div> brand widget-->

            <div class="widget mercado-widget widget-product">
                <h2 class="widget-title">Popular Products</h2>
                <div class="widget-content">
                    <ul class="products">
                        <li class="product-item">
                            <div class="product product-widget-style">
                                <div class="thumbnnail">
                                    <a href="detail.html" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                        <figure><img src="{{ asset('images/products/digital_01.jpg')}}" alt=""></figure>
                                    </a>
                                </div>
                                <div class="product-info">
                                    <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker...</span></a>
                                    <div class="wrap-price"><span class="product-price">$168.00</span></div>
                                </div>
                            </div>
                        </li>

                        <li class="product-item">
                            <div class="product product-widget-style">
                                <div class="thumbnnail">
                                    <a href="detail.html" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                        <figure><img src="{{ asset('images/products/digital_17.jpg')}}" alt=""></figure>
                                    </a>
                                </div>
                                <div class="product-info">
                                    <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker...</span></a>
                                    <div class="wrap-price"><span class="product-price">$168.00</span></div>
                                </div>
                            </div>
                        </li>

                        <li class="product-item">
                            <div class="product product-widget-style">
                                <div class="thumbnnail">
                                    <a href="detail.html" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                        <figure><img src="{{ asset('images/products/digital_18.jpg')}}" alt=""></figure>
                                    </a>
                                </div>
                                <div class="product-info">
                                    <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker...</span></a>
                                    <div class="wrap-price"><span class="product-price">$168.00</span></div>
                                </div>
                            </div>
                        </li>

                        <li class="product-item">
                            <div class="product product-widget-style">
                                <div class="thumbnnail">
                                    <a href="detail.html" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                        <figure><img src="{{ asset('images/products/digital_20.jpg')}}" alt=""></figure>
                                    </a>
                                </div>
                                <div class="product-info">
                                    <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker...</span></a>
                                    <div class="wrap-price"><span class="product-price">$168.00</span></div>
                                </div>
                            </div>
                        </li>

                    </ul>
                </div>
            </div><!-- brand widget-->

        </div><!--end sitebar-->

    </div><!--end row-->

</div><!--end container-->


