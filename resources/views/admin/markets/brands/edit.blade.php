@extends('admin.layouts.master')
@section('title','ویرایش برند')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="container">
            <h6 class="card-title">ویرایش برند </h6>
            <form action="{{ route('admin.market.brand.update', $brand->id) }}" method="POST" id="form" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">نام فارسی</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-left" placeholder="نام فارسی" dir="rtl" name="persian_name" value="{{ old('persian_name',$brand->persian_name) }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">نام اصلی</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-right" placeholder="نام اصلی" dir="ltr" name="original_name" value="{{ old('original_name',$brand->original_name) }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label" for="logo">لوگو</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control-file" id="logo" dir="rtl" name="logo">
                    </div>
                </div>
                <div class="form-group row">
                    <figure class="avatar avatar">
                        <img src="{{ asset($brand->logo) }}" class="rounded-circle" alt="logo">
                    </figure>
                </div>
                
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="status">وضعیت</label>
                    <div class="col-sm-10">
                        <select name="status" id="status" class="form-control">
                            <option value="1" @if($brand->status) selected @endif>فعال</option>
                            <option value="0" @if(!$brand->status) selected @endif>غیر فعال</option>
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
