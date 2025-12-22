@extends('admin.layouts.master')
@section('title','ایجاد صفحه')
@section('style')
    <link rel="stylesheet" href="{{ asset('admin-assets/plugins/datepicker/kamadatepicker.min.css') }}">
    <style>
        .ck-editor__editable {
            min-height: 500px;
        }
    </style>
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <div class="container">
            <h6 class="card-title">ایجاد صفحه</h6>
            <form action="{{ route('admin.content.page.store') }}" method="POST" id="form" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">عنوان </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-left" placeholder="عنوان " dir="rtl" name="title" value="{{ old('title') }}">
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
    <script src="{{ asset('admin-assets/plugins/ckeditor/ckeditor.js') }}"></script>
    <script>
        $(document).ready(function() {

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
