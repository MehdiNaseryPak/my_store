@extends('admin.layouts.master')
@section('title','ویرایش دسته بندی پست')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="container">
            <h6 class="card-title">ویرایش دسته بندی پست</h6>
            <form action="{{ route('admin.content.post_category.update', $postCategory->id) }}" method="POST" id="form" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">نام</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-left" placeholder="نام" dir="rtl" name="name" value="{{ old('name',$postCategory->name) }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label" for="image">عکس</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control-file" id="image" dir="rtl" name="image">
                    </div>
                </div>
                @if($postCategory->image)
                <div class="form-group row">
                    <figure class="avatar avatar">
                        <img src="{{ asset($postCategory->image['indexArray'][$postCategory->image['currentImage']] ) }}" class="rounded-circle" alt="image">
                    </figure>
                </div>
                @endif
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="status">وضعیت</label>
                    <div class="col-sm-10">
                        <select name="status" id="status" class="form-control">
                            <option value="1" @if($postCategory->status) selected @endif>فعال</option>
                            <option value="0" @if(!$postCategory->status) selected @endif>غیر فعال</option>
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