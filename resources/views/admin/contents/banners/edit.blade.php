@extends('admin.layouts.master')
@section('title','')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="container">
            <h6 class="card-title">ویرایش بنر</h6>
            <form action="{{ route('admin.content.banner.update', $banner->id) }}" method="POST" id="form">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">عنوان فارسی</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-left" placeholder="عنوان فارسی" dir="rtl" name="title_fa" value="{{ old('title_fa',$banner->title_fa) }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">عنوان انگلیسی</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-left" placeholder="عنوان انگلیسی" dir="ltr" name="title_en" value="{{ old('title_en',$banner->title_en) }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">عنوان عربی</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-left" placeholder="عنوان عربی" dir="rtl" name="title_ar" value="{{ old('title_ar',$banner->title_ar) }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label" for="image_fa">عکس فارسی</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control-file" id="image_fa" dir="rtl" name="image_fa">
                    </div>
                </div>
                <div class="form-group row">
                    <figure class="avatar avatar">
                        <img src="{{ asset($banner->image_fa ) }}" class="rounded-circle" alt="image_fa">
                    </figure>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label" for="image_en">عکس انگلیسی</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control-file" id="image_en" dir="rtl" name="image_en">
                    </div>
                </div>
                <div class="form-group row">
                    <figure class="avatar avatar">
                        <img src="{{ asset($banner->image_en ) }}" class="rounded-circle" alt="image_en">
                    </figure>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label" for="image_ar">عکس عربی</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control-file" id="image_ar" dir="rtl" name="image_ar">
                    </div>
                </div>
                <div class="form-group row">
                    <figure class="avatar avatar">
                        <img src="{{ asset($banner->image_ar ) }}" class="rounded-circle" alt="image_ar">
                    </figure>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">لینک</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-right" placeholder="لینک" dir="ltr" name="url" value="{{ old('url',$banner->url) }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">موقعیت</label>
                    <div class="col-sm-10">
                        <select name="position" class="form-control">
                            @foreach ($positions as $key => $value)
                            <option value="{{ $key }}" @if(old('position') == $key || $banner->position == $key) selected @endif>{{ $value }}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="status">وضعیت</label>
                    <div class="col-sm-10">
                        <select name="status" id="status" class="form-control">
                            <option value="1" @if($banner->status) selected @endif>فعال</option>
                            <option value="0" @if(!$banner->status) selected @endif>غیر فعال</option>
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
