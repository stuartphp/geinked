<div class="widget mercado-widget categories-widget">
    <h2 class="widget-title">All Categories</h2>
    <div class="widget-content">
        <ul class="list-category">
            @foreach ($categories as $k=>$v)
                @foreach($v as $cat)
                    @if (array_key_exists($k, $parents))
                        Multiple
                    @else
                        Single
                    @endif
                @endforeach
            @endforeach

        </ul>
    </div>
</div>
