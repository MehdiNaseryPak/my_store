@extends('admin.layouts.master')
@section('title','افزودن دسته بندی')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="container">
            <h6 class="card-title">ایجاد دسته بندی</h6>
            <form action="{{ route('admin.market.product_category.store') }}" method="POST" id="form" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">نام فارسی</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-left" placeholder="نام فارسی" dir="rtl" name="name_fa" value="{{ old('name_fa') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">نام انگلیسی</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-left" placeholder="نام انگلیسی" dir="ltr" name="name_en" value="{{ old('name_en') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">نام عربی</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-left" placeholder="نام عربی" dir="rtl" name="name_ar" value="{{ old('name_ar') }}">
                    </div>
                </div>
                
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">زیر منو</label>
                    <div class="col-sm-10">
                        <select name="parent_id" class="form-control">
                            <option value="">منو اصلی</option>
                            @foreach ($categories as $category )
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">توضیحات فارسی</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="description_fa" id="description_fa" rows="3">{{ old('description_fa') }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">توضیحات انگلیسی</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="description_en" id="description_en" rows="3">{{ old('description_en') }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">توضیحات عربی</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="description_ar" id="description_ar" rows="3">{{ old('description_ar') }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label" for="image">عکس</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control-file" id="image" dir="rtl" name="image">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="show_in_menu">نمایش در منو</label>
                    <div class="col-sm-10">
                        <select name="show_in_menu" id="show_in_menu" class="form-control">
                            <option value="1">فعال</option>
                            <option value="0">غیر فعال</option>
                        </select>
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
