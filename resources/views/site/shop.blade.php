@extends('layouts.site')
@section('content')
<!--main area-->
<main id="main" class="main-site left-sidebar">
    <div class="container">
    @livewire('shop-component')
    </div>
</main>
<!--main area-->
@endsection
