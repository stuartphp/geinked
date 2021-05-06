<div>
    <div class="wrap-iten-in-cart">
            @if(Cart::count()>0)
            <h3 class="box-title">Products Name</h3>
            <ul class="products-cart">
                @foreach (Cart::content() as $item)
                <li class="pr-cart-item">
                    <div class="product-image">
                        <figure><img src="{{ asset('images/products')}}/{{ $item->model->image }}" alt="{{ $item->model->name }}"></figure>
                    </div>
                    <div class="product-name">
                        <a class="link-to-product" href="{{ route('product.detail', ['slug'=>$item->model->slug]) }}">{{ $item->model->name }}</a>
                    </div>
                    <div class="price-field produtc-price"><p class="price">R {{ $item->model->regular_price }}</p></div>
                    <div class="quantity">
                        <div class="quantity-input">
                            <input type="text" name="product-quatity" value="{{ $item->qty }}" data-max="120" pattern="[0-9]*" >
                            <a class="btn btn-increase" href="#" wire:click.prevent="increment('{{ $item->rowId }}')"></a>
                            <a class="btn btn-reduce" href="#" wire:click.prevent="decrement('{{ $item->rowId }}')"></a>
                        </div>
                    </div>
                    <div class="price-field sub-total"><p class="price">R {{ $item->subtotal }}</p></div>
                    <div class="delete">
                        <a href="#" class="btn btn-delete" title="" wire:click.prevent="destroy('{{ $item->rowId }}')">
                            <span>Delete from your cart</span>
                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                </li>
                @endforeach
            </ul>
            @else
                <p>No items in your Cart!</p>
            @endif
        </div>

        <div class="summary">
            <div class="order-summary">
                <h4 class="title-box">Order Summary</h4>
                <p class="summary-info"><span class="title">Subtotal</span><b class="index">R {{ Cart::subtotal() }}</b></p>
                <p class="summary-info"><span class="title">VAT</span><b class="index">R {{ Cart::tax() }}</b></p>
                <p class="summary-info"><span class="title">Shipping</span><b class="index">{{ $shipping }}</b></p>
                <p class="summary-info total-info "><span class="title">Total</span><b class="index">R {{ Cart::total() }}</b></p>
            </div>
            <div class="checkout-info">
                <label class="checkbox-field">
                    <input class="frm-input " name="have-code" id="have-code" value="" type="checkbox"><span>I have promo code</span>
                </label>
                <a class="btn btn-checkout" href="/checkout">Check out</a>
                <div class="row">
                    <div class="col-md-6"><a class="link-to-shop" href="/shop">Continue Shopping<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></div>
                    <div class="col-md-6"><a class="link-to-shop" href="#" wire:click.prevent="destroyAll">Clear Shopping Cart</a></div>
                </div>
            </div>
        </div>
</div>





