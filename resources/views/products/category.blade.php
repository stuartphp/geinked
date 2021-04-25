@extends('layouts.site')
@section('content')
<!--main area-->
<main id="main" class="main-site left-sidebar">
    <div class="container">
    @livewire('shop-component', ['cat'=>$cat,'slug'=>$slug])
    </div>
</main>
<!--main area-->
@endsection

