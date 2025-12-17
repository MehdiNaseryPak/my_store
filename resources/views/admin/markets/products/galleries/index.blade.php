@extends('admin.layouts.master')
@section('title','لیست عکس های محصول')
@section('content')

    <livewire:admin.product-gallery.product-gallery-list :productId="$product->id" />

@endsection
