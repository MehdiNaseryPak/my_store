@extends('admin.layouts.master')
@section('title','لیست ویژگی های مدل محصول')
@section('content')

    <livewire:admin.market.product.product-variant-attribute-list :productVariantId="$productVariant->id" />

@endsection
