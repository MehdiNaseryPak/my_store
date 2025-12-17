@extends('admin.layouts.master')
@section('title','لیست رنگ های محصول')
@section('content')

    <livewire:admin.product-color.product-color-list :productId="$product->id" />

@endsection
