@extends('admin.layouts.master')
@section('title','ویرایش مدل محصول')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="container">
            <h6 class="card-title">ویرایش مدل محصول</h6>
            <form action="{{ route('admin.market.product.variant.update',[$product->id,$productVariant->id]) }}" method="POST" id="form" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">کد یکتای انبار</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-left" placeholder="کد یکتای انبار" dir="ltr" name="sku" value="{{ old('sku',$productVariant->sku) }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">قیمت</label>
                    <div class="col-sm-10">
                        <input  type="number" min="1" class="form-control text-left" dir="ltr" name="price" value="{{ old('price',$productVariant->price) }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">موجودی</label>
                    <div class="col-sm-10">
                        <input type="number" min="1" class="form-control text-left" dir="ltr" name="stock" value="{{ old('stock',$productVariant->stock) }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="status">وضعیت</label>
                    <div class="col-sm-10">
                        <select name="status" id="status" class="form-control">
                            <option value="1" @if($productVariant->status) selected @endif>فعال</option>
                            <option value="0" @if(!$productVariant->status) selected @endif>غیر فعال</option>
                        </select>
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
