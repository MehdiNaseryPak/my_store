@extends('admin.layouts.master')
@section('title','ویرایش دسته بندی')
@section('style')
    <link rel="stylesheet" href="{{ asset('admin-assets/vendors/select2/css/select2.min.css') }}">
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <div class="container">
            <h6 class="card-title">ویرایش دسته بندی </h6>
            <form action="{{ route('admin.market.product_category.update', $productCategory->id) }}" method="POST" id="form" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">نام فارسی</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-left" placeholder="نام فارسی" dir="rtl" name="name_fa" value="{{ old('name_fa',$productCategory->name_fa) }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">نام انگلیسی</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-left" placeholder="نام انگلیسی" dir="ltr" name="name_en" value="{{ old('name_en',$productCategory->name_en) }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">نام عربی</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-left" placeholder="نام عربی" dir="rtl" name="name_ar" value="{{ old('name_ar',$productCategory->name_ar) }}">
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
                    <label  class="col-sm-2 col-form-label">توضیحات فارسی</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="description_fa" id="description_fa" rows="3">{{ old('description_fa',$productCategory->description_fa) }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">توضیحات انگلیسی</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="description_en" id="description_en" rows="3">{{ old('description_en',$productCategory->description_en) }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">توضیحات عربی</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="description_ar" id="description_ar" rows="3">{{ old('description_ar',$productCategory->description_ar) }}</textarea>
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
                        <img src="{{ asset($productCategory->image['indexArray'][$productCategory->image['currentImage']] ) }}" class="rounded-circle" alt="image">
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
@section('script')
    <script src="{{ asset('admin-assets/vendors/select2/js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            var tags_input = $('#tags');
            var select_tags = $('#select_tags');
            var default_tags = tags_input.val();
            var default_data = null;

            if (tags_input.val() !== null && tags_input.val().length > 0) {
                default_data = default_tags.split(',');
            }
            select_tags.select2({
                placeholder: 'لطفا تگ های خود را وارد نمایید',
                tags : true,
                data: default_data

            });
            select_tags.children('option').attr('selected', true).trigger('change');
            $('#form').submit(function(e){
                if(select_tags.val() !== null && select_tags.val().length > 0) {
                    var selected_source = select_tags.val().join(',');
                    tags_input.val(selected_source)
                }
            })
        });
    </script>
@endsection
