@extends('admin.layouts.master')
@section('title','')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="container">
            <h6 class="card-title">ویرایش بنر</h6>
            <form action="{{ route('admin.content.banner.update', $banner->id) }}" method="POST" id="form" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">عنوان</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-left" placeholder="عنوان" dir="rtl" name="title" value="{{ old('title',$banner->title) }}">
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
                        <img src="{{ asset($banner->image ) }}" class="rounded-circle" alt="image">
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
