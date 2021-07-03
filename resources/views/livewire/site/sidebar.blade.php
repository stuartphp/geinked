<div class="widget mercado-widget categories-widget">
    <h2 class="widget-title"><a href="/shop" style="color: #222">All Products</a></h2>
    <div class="widget-content">
        <ul class="list-category">
            @foreach ($categories as $cat)
                @if ($cat->parent_id == 0)
                    @if (array_key_exists($cat->id, $parents))
                        <li class="category-item @if($cat_main == $cat->slug) open @endif has-child-cate">
                            <a href="/shop/{{ $cat->slug }}" class="cate-link @if($cat_sub == null && $cat_main == $cat->slug) active @endif">{{ $cat->name }}</a>
                            <span class="toggle-control">+</span>
                            <ul class="sub-cate">
                                @foreach ($categories as $sub )
                                    @if ($sub->parent_id == $cat->id)
                                        <li class="category-item"><a href="/shop/{{ $cat->slug }}/{{ $sub->slug }}" class="cate-link @if($cat_sub == $sub->slug) active @endif">{{ $sub->name }}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                    @else
                        <li class="category-item ">
                            <a href="/shop/{{ $cat->slug }}" class="cate-link @if($cat_main == $cat->slug) active @endif">{{ $cat->name }}</a>
                        </li>
                    @endif
                @endif
            @endforeach
        </ul>
    </div>
</div>
