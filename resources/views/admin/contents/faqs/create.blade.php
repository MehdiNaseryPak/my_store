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
                    <label  class="col-sm-2 col-form-label">پرسش</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-left" placeholder="پرسش" dir="rtl" name="question" value="{{ old('question') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">پاسخ</label>
                    <div class="col-sm-10">
                        <textarea name="answer" id="answer" class="form-control" rows="3">{{ old('answer') }}</textarea>
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

