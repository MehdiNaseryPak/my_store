@extends('admin.layouts.master')
@section('title','ایجاد پرسش')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="container">
            <h6 class="card-title">ایجاد پرسش</h6>
            <form action="{{ route('admin.content.faq.store') }}" method="POST" id="form">
                @csrf
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">پرسش فارسی</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-left" placeholder="پرسش فارسی" dir="rtl" name="question_fa" value="{{ old('question_fa') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">پرسش انگلیسی</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-left" placeholder="پرسش انگلیسی" dir="rtl" name="question_en" value="{{ old('question_en') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">پرسش عربی</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-left" placeholder="پرسش عربی" dir="rtl" name="question_ar" value="{{ old('question_ar') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">پاسخ فارسی</label>
                    <div class="col-sm-10">
                        <textarea name="answer_fa" id="answer_fa" class="form-control" rows="3">{{ old('answer_fa') }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">پاسخ انگلیسی</label>
                    <div class="col-sm-10">
                        <textarea name="answer_en" id="answer_en" class="form-control" rows="3">{{ old('answer_en') }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">پاسخ عربی</label>
                    <div class="col-sm-10">
                        <textarea name="answer_ar" id="answer_ar" class="form-control" rows="3">{{ old('answer_ar') }}</textarea>
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

