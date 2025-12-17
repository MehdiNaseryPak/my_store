@extends('admin.layouts.master')
@section('title','ویرایش محصول')
@section('style')
    <link rel="stylesheet" href="{{ asset('admin-assets/vendors/select2/css/select2.min.css') }}">
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <div class="container">
            <h6 class="card-title">ویرایش محصول </h6>
            <form action="{{ route('admin.market.product.update', $product->id) }}" method="POST" id="form" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">نام فارسی</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-left" placeholder="نام فارسی" dir="rtl" name="name_fa" value="{{ old('name_fa',$product->name_fa) }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">نام انگلیسی</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-left" placeholder="نام انگلیسی" dir="ltr" name="name_en" value="{{ old('name_en',$product->name_fa) }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">نام عربی</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-left" placeholder="نام عربی" dir="rtl" name="name_ar" value="{{ old('name_ar',$product->name_fa) }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">دسته بندی</label>
                    <div class="col-sm-10">
                        <select class="form-control select2" multiple="multiple" id="categories" name="categories[]">
                            @foreach($productCategories as $category)
                                <option value="{{$category->id}}">{{$category->name_fa}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">توضیحات فارسی</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="introduction_fa" id="introduction_fa" rows="3">{{ old('introduction_fa',$product->introduction_fa) }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">توضیحات انگلیسی</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="introduction_en" id="introduction_en" rows="3">{{ old('introduction_en',$product->introduction_en) }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">توضیحات عربی</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="introduction_ar" id="introduction_ar" rows="3">{{ old('introduction_ar',$product->introduction_ar) }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label" for="image">عکس</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control-file" id="image" dir="rtl" name="image">
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label" for="tags_fa">تگ فارسی</label>
                    <div class="col-sm-10">
                        <input type="hidden" name="tags_fa" id="tags_fa" value="{{ old('tags_fa',$product->tags_fa) }}">
                        <select id="select_tags_fa" class="select2 form-control" multiple="multiple">
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label" for="tags_en">تگ انگلیسی</label>
                    <div class="col-sm-10">
                        <input type="hidden" name="tags_en" id="tags_en" value="{{ old('tags_en',$product->tags_en) }}">
                        <select id="select_tags_en" class="select2 form-control" multiple="multiple">
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label" for="tags_ar">تگ عربی</label>
                    <div class="col-sm-10">
                        <input type="hidden" name="tags_ar" id="tags_ar" value="{{ old('tags_ar',$product->tags_ar) }}">
                        <select id="select_tags_ar" class="select2 form-control" multiple="multiple">
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="status">وضعیت</label>
                    <div class="col-sm-10">
                        <select name="status" id="status" class="form-control">
                            <option value="1" @if($product->status) selected @endif>فعال</option>
                            <option value="0" @if(!$product->status) selected @endif>غیر فعال</option>
                        </select>
                    </div>
                </div>
                
                <section class="col-12 border-top border-bottom py-3 mb-3">
                    <label class="col-sm-2 col-form-label" for="meta_product">ویژگی ها</label>
                    <section class="row meta-product">

                        <section class="col-5 col-md-3">
                            <div class="form-group">
                                <input type="text" name="meta_key_fa[]" class="form-control form-control-sm" placeholder="ویژگی فارسی ...">
                            </div>
                        </section>

                        <section class="col-5 col-md-3">
                            <div class="form-group">
                                <input type="text" name="meta_value_fa[]" class="form-control form-control-sm" placeholder="مقدار فارسی ...">
                            </div>
                        </section>
                        <section class="col-5 col-md-3">
                            <div class="form-group">
                                <input type="text" name="meta_key_en[]" class="form-control form-control-sm" placeholder="ویژگی انگلیسی ...">
                            </div>
                        </section>

                        <section class="col-5 col-md-3">
                            <div class="form-group">
                                <input type="text" name="meta_value_en[]" class="form-control form-control-sm" placeholder="مقدار انگلیسی ...">
                            </div>
                        </section>
                        <section class="col-5 col-md-3">
                            <div class="form-group">
                                <input type="text" name="meta_key_ar[]" class="form-control form-control-sm" placeholder="ویژگی عربی ...">
                            </div>
                        </section>

                        <section class="col-5 col-md-3">
                            <div class="form-group">
                                <input type="text" name="meta_value_ar[]" class="form-control form-control-sm" placeholder="مقدار عربی ...">
                            </div>
                        </section>

                    </section>

                    <section>
                        <button type="button" id="btn-copy" class="btn btn-success btn-sm">افزودن</button>
                    </section>


                </section>
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
