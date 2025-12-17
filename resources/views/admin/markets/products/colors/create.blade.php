@extends('admin.layouts.master')
@section('title','افزودن رنگ محصول')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="container">
            <h6 class="card-title">ایجاد رنگ محصول</h6>
            <form action="{{ route('admin.market.product.color.store',$product->id) }}" method="POST" id="form" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">نام رنگ فارسی</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-left" placeholder="نام رنگ فارسی" dir="rtl" name="color_name_fa" value="{{ old('color_name_fa') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">نام رنگ انگلیسی</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-left" placeholder="نام رنگ انگلیسی" dir="ltr" name="color_name_en" value="{{ old('color_name_en') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">نام رنگ عربی</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-left" placeholder="نام رنگ عربی" dir="rtl" name="color_name_ar" value="{{ old('color_name_ar') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label" for="color">رنگ</label>
                    <div class="col-sm-10">
                        <input type="color" class="form-control" id="color" dir="rtl" name="color">
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
