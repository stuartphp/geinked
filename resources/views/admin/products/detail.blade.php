@extends('layouts.app')
@section('content')
   @include('admin.products.menu', ['menu'=>'detail', 'id'=>$id])
   @livewire('admin.products.detail', ['id'=>$id])
@endsection
