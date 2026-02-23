@extends('admin.layouts.master')
@section('title','لیست عکس های محصول')
@section('content')

    <livewire:admin.market.product.product-gallery-list :productId="$product->id" />

@endsection
