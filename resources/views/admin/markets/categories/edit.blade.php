@extends('admin.layouts.master')
@section('title','ویرایش دسته بندی')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="container">
            <h6 class="card-title">ویرایش دسته بندی </h6>
            <form action="{{ route('admin.market.product_category.update', $productCategory->id) }}" method="POST" id="form" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">نام</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-left" placeholder="نام" dir="rtl" name="name" value="{{ old('name',$productCategory->name) }}">
                    </div>
                </div>
                
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">زیر منو</label>
                    <div class="col-sm-10">
                        <select name="parent_id" class="form-control">
                            <option value="">منو اصلی</option>
                            @foreach ($categories as $single_category )
                            <option value="{{ $single_category->id }}" @if($single_category->id == $productCategory->parent_id) selected @endif>{{ $single_category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label" for="image">عکس</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control-file" id="image" dir="rtl" name="image">
                    </div>
                </div>
                <div class="form-group row">
                    <figure class="avatar avatar">
                        <img src="{{ asset($productCategory->image ) }}" class="rounded-circle" alt="image">
                    </figure>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="show_in_menu">نمایش در منو</label>
                    <div class="col-sm-10">
                        <select name="show_in_menu" id="show_in_menu" class="form-control">
                            <option value="1" @if($productCategory->show_in_menu) selected @endif>فعال</option>
                            <option value="0" @if(!$productCategory->show_in_menu) selected @endif>غیر فعال</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="status">وضعیت</label>
                    <div class="col-sm-10">
                        <select name="status" id="status" class="form-control">
                            <option value="1" @if($productCategory->status) selected @endif>فعال</option>
                            <option value="0" @if(!$productCategory->status) selected @endif>غیر فعال</option>
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
