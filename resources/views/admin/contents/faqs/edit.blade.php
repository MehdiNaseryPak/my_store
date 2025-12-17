@extends('admin.layouts.master')
@section('title','ویرایش پرسش')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="container">
            <h6 class="card-title">ویرایش پرسش</h6>
            <form action="{{ route('admin.content.faq.update', $faq->id) }}" method="POST" id="form" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">پرسش فارسی</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-left" placeholder="پرسش فارسی" dir="rtl" name="question_fa" value="{{ old('question_fa',$faq->question_fa) }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">پرسش انگلیسی</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-left" placeholder="پرسش انگلیسی" dir="rtl" name="question_en" value="{{ old('question_en',$faq->question_en) }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">پرسش عربی</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-left" placeholder="پرسش عربی" dir="rtl" name="question_ar" value="{{ old('question_ar',$faq->question_ar) }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">پاسخ فارسی</label>
                    <div class="col-sm-10">
                        <textarea name="answer_fa" id="answer_fa" class="form-control" rows="3">{{ old('answer_fa',$faq->answer_fa) }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">پاسخ انگلیسی</label>
                    <div class="col-sm-10">
                        <textarea name="answer_en" id="answer_en" class="form-control" rows="3">{{ old('answer_en',$faq->answer_en) }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">پاسخ عربی</label>
                    <div class="col-sm-10">
                        <textarea name="answer_ar" id="answer_ar" class="form-control" rows="3">{{ old('answer_ar',$faq->answer_ar) }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="status">وضعیت</label>
                    <div class="col-sm-10">
                        <select name="status" id="status" class="form-control">
                            <option value="1" @if($faq->status) selected @endif>فعال</option>
                            <option value="0" @if(!$faq->status) selected @endif>غیر فعال</option>
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

