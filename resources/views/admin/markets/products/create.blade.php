@extends('admin.layouts.master')
@section('title','افزودن محصول')
@section('style')
<link rel="stylesheet" href="{{ asset('admin-assets/vendors/select2/css/select2.min.css') }}">

@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <div class="container">
            <h6 class="card-title">ایجاد محصول</h6>
            <form action="{{ route('admin.market.product.store') }}" method="POST" id="form" enctype="multipart/form-data">
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
                        <textarea class="form-control" name="introduction_fa" id="introduction_fa" rows="3">{{ old('introduction_fa') }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">توضیحات انگلیسی</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="introduction_en" id="introduction_en" rows="3">{{ old('introduction_en') }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">توضیحات عربی</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="introduction_ar" id="introduction_ar" rows="3">{{ old('introduction_ar') }}</textarea>
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
                        <input type="hidden" name="tags_fa" id="tags_fa" value="{{ old('tags_fa') }}">
                        <select id="select_tags_fa" class="select2 form-control" multiple="multiple">
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label" for="tags_en">تگ انگلیسی</label>
                    <div class="col-sm-10">
                        <input type="hidden" name="tags_en" id="tags_en" value="{{ old('tags_en') }}">
                        <select id="select_tags_en" class="select2 form-control" multiple="multiple">
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label" for="tags_ar">تگ عربی</label>
                    <div class="col-sm-10">
                        <input type="hidden" name="tags_ar" id="tags_ar" value="{{ old('tags_ar') }}">
                        <select id="select_tags_ar" class="select2 form-control" multiple="multiple">
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
    $('#categories').select2({
      placeholder: "دسته بندی های محصول",
      allowClear: true
    });
    // select2
    var tags_input_fa = $('#tags_fa');
    var select_tags_fa = $('#select_tags_fa');
    select_tags_fa.select2({
        placeholder: 'لطفا تگ های خود را وارد نمایید',
        tags : true,

    });
    var tags_input_en = $('#tags_en');
    var select_tags_en = $('#select_tags_en');
    select_tags_en.select2({
        placeholder: 'Please enter your tags',
        tags : true,

    });
    var tags_input_ar = $('#tags_ar');
    var select_tags_ar = $('#select_tags_ar');
    select_tags_ar.select2({
        placeholder: 'الرجاء إدخال علاماتك',
        tags : true,

    });

    $('#form').submit(function(e){
        if(select_tags_fa.val() !== null && select_tags_fa.val().length > 0) {
            var selected_source_fa = select_tags_fa.val().join(',');
            tags_input_fa.val(selected_source_fa)
        }
        if(select_tags_en.val() !== null && select_tags_en.val().length > 0) {
            var selected_source_en = select_tags_en.val().join(',');
            tags_input_en.val(selected_source_en)
        }
        if(select_tags_ar.val() !== null && select_tags_ar.val().length > 0) {
            var selected_source_ar = select_tags_ar.val().join(',');
            tags_input_ar.val(selected_source_ar)
        }
    })
  });
</script>
<script>
    $(function(){
        $("#btn-copy").on('click', function(){
          var ele = $(this).parent().prev().clone(true);
          $(this).before(ele);
        })
      })
</script>
@endsection