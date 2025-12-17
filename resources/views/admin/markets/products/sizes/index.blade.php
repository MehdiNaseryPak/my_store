@extends('admin.layouts.master')
@section('title','لیست سایز های محصول')
@section('content')

    <livewire:admin.product-size.product-size-list :productId="$product->id" />

@endsection
