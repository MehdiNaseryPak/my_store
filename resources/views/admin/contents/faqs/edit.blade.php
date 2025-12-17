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
                    <label  class="col-sm-2 col-form-label">پرسش</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-left" placeholder="پرسش" dir="rtl" name="question" value="{{ old('question',$faq->question) }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">پاسخ</label>
                    <div class="col-sm-10">
                        <textarea name="answer" id="answer" class="form-control" rows="3">{{ old('answer',$faq->answer) }}</textarea>
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

