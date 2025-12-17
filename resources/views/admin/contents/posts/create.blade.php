@extends('admin.layouts.master')
@section('title','')
@section('style')
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
                    <label  class="col-sm-2 col-form-label">عنوان </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-left" placeholder="عنوان " dir="rtl" name="title" value="{{ old('title') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="category_id">دسته بندی</label>
                    <div class="col-sm-10">
                        <select name="category_id" id="category_id" class="form-control">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">خلاصه</label>
                    <div class="col-sm-10">
                        <textarea name="summary" id="summary" class="form-control" rows="3">{{ old('summary') }}</textarea>
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
                    <label class="col-sm-2 col-form-label" for="status">وضعیت</label>
                    <div class="col-sm-10">
                        <select name="status" id="status" class="form-control">
                            <option value="1">فعال</option>
                            <option value="0">غیر فعال</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="commentable">کامنت گذاری</label>
                    <div class="col-sm-10">
                        <select name="commentable" id="commentable" class="form-control">
                            <option value="1">فعال</option>
                            <option value="0">غیر فعال</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="body">بدنه</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="body" rows="6" id="editor">{{ old('body') }}</textarea>
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

            // ckeditor
            ClassicEditor
            .create(document.querySelector('#editor'), {
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
            
        });
    </script>
@endsection
