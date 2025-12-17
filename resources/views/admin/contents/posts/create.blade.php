@extends('admin.layouts.master')
@section('title','')
@section('style')
    <link rel="stylesheet" href="{{ asset('admin-assets/vendors/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/plugins/datepicker/kamadatepicker.min.css') }}">
    <style>
        .ck-editor__editable {
            min-height: 300px;
        }
    </style>
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <div class="container">
            <h6 class="card-title">ایجاد پست</h6>
            <form action="{{ route('admin.content.post.store') }}" method="POST" id="form" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">عنوان فارسی</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-left" placeholder="عنوان فارسی" dir="rtl" name="title_fa" value="{{ old('title_fa') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">عنوان انگلیسی</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-left" placeholder="عنوان انگلیسی" dir="ltr" name="title_en" value="{{ old('title_en') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">عنوان عربی</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-left" placeholder="عنوان عربی" dir="rtl" name="title_ar" value="{{ old('title_ar') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="category_id">دسته بندی</label>
                    <div class="col-sm-10">
                        <select name="category_id" id="category_id" class="form-control">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name_fa }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">خلاصه فارسی</label>
                    <div class="col-sm-10">
                        <textarea name="summary_fa" id="summary_fa" class="form-control" rows="3">{{ old('summary_fa') }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">خلاصه انگلیسی</label>
                    <div class="col-sm-10">
                        <textarea name="summary_en" id="summary_en" class="form-control" rows="3">{{ old('summary_en') }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">خلاصه عربی</label>
                    <div class="col-sm-10">
                        <textarea name="summary_ar" id="summary_ar" class="form-control" rows="3">{{ old('summary_ar') }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label" for="image">عکس</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control-file" id="image" dir="rtl" name="image">
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label" for="published_at">تاریخ انتشار</label>
                    <div class="col-sm-10">
                        <input type="text" dir="ltr" name="published_at" id="published_at" class="form-control" value="{{ old('published_at') }}">
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
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="body_fa">بدنه فارسی</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="body_fa" rows="6" id="editor_fa">{{ old('body_fa') }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="body_en">بدنه انگلیسی</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="body_en" rows="6" id="editor_en">{{ old('body_en') }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="body_ar">بدنه عربی</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="body_ar" rows="6" id="editor_ar">{{ old('body_ar') }}</textarea>
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
    <script src="{{ asset('admin-assets/vendors/select2/js/select2.min.js') }}"></script>\
    <script src="{{ asset('admin-assets/plugins/datepicker/kamadatepicker.holidays.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/datepicker/kamadatepicker.min.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/ckeditor/ckeditor.js') }}"></script>
    <script>
        $(document).ready(function() {
            // date
            kamaDatepicker('published_at', {
                nextButtonIcon: "fa fa-arrow-circle-right"
                , previousButtonIcon: "fa fa-arrow-circle-left"
                , forceFarsiDigits: true
                , markToday: true
                , markHolidays: true
                , highlightSelectedDay: true
                , sync: true
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

            // ckeditor fa
            ClassicEditor
            .create(document.querySelector('#editor_fa'), {
                language: "fa",
                toolbar: [
                'heading', '|',
                'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|',
                'blockQuote', 'insertTable', 'undo', 'redo'
                ]
            }).then(editor => {
                editor.ui.view.editable.element.style.minHeight = '300px';
            }).catch(error => {
                console.error(error);
            });
            // ckeditor en
            ClassicEditor
            .create(document.querySelector('#editor_en'), {
                language: "en",
                toolbar: [
                'heading', '|',
                'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|',
                'blockQuote', 'insertTable', 'undo', 'redo'
                ]
            }).then(editor => {
                editor.ui.view.editable.element.style.minHeight = '300px';
            }).catch(error => {
                console.error(error);
            });
            // ckeditor
            ClassicEditor
            .create(document.querySelector('#editor_ar'), {
                language: "ar",
                toolbar: [
                'heading', '|',
                'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|',
                'blockQuote', 'insertTable', 'undo', 'redo'
                ]
            }).then(editor => {
                editor.ui.view.editable.element.style.minHeight = '300px';
            }).catch(error => {
                console.error(error);
            });
        });
    </script>
@endsection
