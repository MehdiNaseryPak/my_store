@extends('admin.layouts.master')
@section('title','ویرایش پروفایل')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="container">
            <h6 class="card-title">ویرایش پروفایل </h6>
            <form action="{{ route('admin.profile.update', $profile->id) }}" method="POST" id="form" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">عنوان فارسی</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-left" placeholder="عنوان فارسی" dir="rtl" name="title_fa" value="{{ old('title_fa',$profile->title_fa) }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">عنوان انگلیسی</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-right" placeholder="عنوان انگلیسی" dir="ltr" name="title_en" value="{{ old('title_en',$profile->title_en) }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">خلاصه فارسی</label>
                    <div class="col-sm-10">
                        <textarea name="summary_fa" id="summary_fa" class="form-control" rows="3">{{ old('summary_fa',$profile->summary_fa) }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">خلاصه انگلیسی</label>
                    <div class="col-sm-10">
                        <textarea name="summary_en" id="summary_en" class="form-control" rows="3">{{ old('summary_en',$profile->summary_en) }}</textarea>
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
                        <img src="{{ asset($profile->image) }}" class="rounded-circle" alt="image">
                    </figure>
                </div>
                

                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">توضیحات فارسی</label>
                    <div class="col-sm-10">
                        <textarea name="introduction_fa" id="introduction_fa" class="form-control" rows="3">{{ old('introduction_fa',$profile->introduction_fa) }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">توضیحات انگلیسی</label>
                    <div class="col-sm-10">
                        <textarea name="introduction_en" id="introduction_en" class="form-control" rows="3">{{ old('introduction_en',$profile->introduction_en) }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">لینک اینستگرام</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-right" placeholder="لینک اینستگرام" dir="ltr" name="link_instagram" value="{{ old('link_instagram',$profile->link_instagram) }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">لینک لینکدین</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-right" placeholder="لینک لینکدین" dir="ltr" name="link_linkdin" value="{{ old('link_linkdin',$profile->link_linkdin) }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">لینک تلگرام</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-right" placeholder="لینک تلگرام" dir="ltr" name="link_telegram" value="{{ old('link_telegram',$profile->link_telegram) }}">
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
