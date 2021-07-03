<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
      <a href="/admin/products/detail/{{ $id }}" class="nav-link @if($menu=='detail') active @endif" id="detail-tab">Detail</a>
    </li>
    <li class="nav-item" role="presentation">
      <a href="/admin/products/options/{{ $id }}" class="nav-link @if($menu=='options') active @endif" id="Options-tab" >Options</a>
    </li>
    <li class="nav-item" role="presentation">
      <a href="/admin/products/images/{{ $id }}" class="nav-link @if($menu=='images') active @endif" id="Images-tab">Images</a>
    </li>
    <li class="nav-item" role="presentation">
      <a href="/admin/products/reviews/{{ $id }}" class="nav-link @if($menu=='reviews') active @endif" id="Reviews-tab">Reviews</a>
    </li>
    <li class="nav-item" role="presentation">
      <a href="/admin/products/activities/{{ $id }}" class="nav-link @if($menu=='activities') active @endif" id="Activities-tab">Activities</a>
    </li>
</ul>

