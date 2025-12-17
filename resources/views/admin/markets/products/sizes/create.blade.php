@extends('admin.layouts.master')
@section('title','افزودن سایز محصول')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="container">
            <h6 class="card-title">ایجاد سایز محصول</h6>
            <form action="{{ route('admin.market.product.size.store',$product->id) }}" method="POST" id="form" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">سایز</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-left" placeholder="سایز" dir="ltr" name="size" value="{{ old('size') }}">
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
