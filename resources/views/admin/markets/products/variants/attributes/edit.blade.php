@extends('admin.layouts.master')
@section('title','ویرایش ویژگی مدل محصول')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="container">
            <h6 class="card-title">ویرایش ویژگی مدل محصول</h6>
            <form action="{{ route('admin.market.product.variant.attribute.update',[$productVariant->id,$productVariantAttribute->id]) }}" method="POST" id="form" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="category_attribute_id">ویژگی دسته بندی</label>
                    <div class="col-sm-10">
                        <select name="category_attribute_id" id="category_attribute_id" class="form-control">
                            @foreach ($categoryAttributes as $attr)
                                <option value="{{$attr->id}}" @if($productVariantAttribute->category_attribute_id == $attr->id) selected @endif>{{ $attr->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">مقدار</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-left" placeholder="مقدار" dir="ltr" name="value" value="{{ old('value',$productVariantAttribute->value) }}">
                    </div>
                </div>
                <div class="form-group row">
                    <button class="btn btn-success btn-uppercase">
                        <i class="ti-check-box m-r-5"></i> ذخیره
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
