@extends('admin.layouts.master')
@section('title','ایجاد بنر')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="container">
            <h6 class="card-title">ایجاد بنر</h6>
            <form action="{{ route('admin.content.banner.store') }}" method="POST" id="form" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">عنوان</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-left" placeholder="عنوان" dir="rtl" name="title" value="{{ old('title') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label" for="image">عکس</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control-file" id="image" dir="rtl" name="image">
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">لینک</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-right" placeholder="لینک" dir="ltr" name="url" value="{{ old('url') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">موقعیت</label>
                    <div class="col-sm-10">
                        <select name="position" class="form-control">
                            @foreach ($positions as $key => $value)
                            <option value="{{ $key }}" @if(old('position') == $key) selected @endif>{{ $value }}</option>
                        @endforeach
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
