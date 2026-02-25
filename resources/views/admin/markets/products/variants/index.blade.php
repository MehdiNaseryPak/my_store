@extends('admin.layouts.master')
@section('title','لیست مدل های محصول')
@section('content')

    <livewire:admin.market.product.product-variant-list :productId="$product->id" />

@endsection
