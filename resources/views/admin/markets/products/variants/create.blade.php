@extends('admin.layouts.master')
@section('title','افزودن مدل محصول')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="container">
            <h6 class="card-title">ایجاد مدل محصول</h6>
            <form action="{{ route('admin.market.product.variant.store',$product->id) }}" method="POST" id="form" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">کد یکتای انبار</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-left" placeholder="کد یکتای انبار" dir="ltr" name="sku" value="{{ old('sku') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">قیمت</label>
                    <div class="col-sm-10">
                        <input  type="number" min="1" class="form-control text-left" dir="ltr" name="price" value="{{ old('price') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">موجودی</label>
                    <div class="col-sm-10">
                        <input type="number" min="1" class="form-control text-left" dir="ltr" name="stock" value="{{ old('stock') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="status">وضعیت</label>
                    <div class="col-sm-10">
                        <select name="status" id="status" class="form-control">
                            <option value="1">فعال</option>
                            <option value="0">غیر فعال</option>
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
