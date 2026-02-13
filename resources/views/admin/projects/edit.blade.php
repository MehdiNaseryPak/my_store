@extends('admin.layouts.master')
@section('title','ویرایش پروژه')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="container">
            <h6 class="card-title">ویرایش پروژه </h6>
            <form action="{{ route('admin.project.update', $project->id) }}" method="POST" id="form" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">عنوان فارسی</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-left" placeholder="عنوان فارسی" dir="rtl" name="title_fa" value="{{ old('title_fa',$project->title_fa) }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">عنوان انگلیسی</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-right" placeholder="عنوان انگلیسی" dir="ltr" name="title_en" value="{{ old('title_en',$project->title_en) }}">
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
                        <img src="{{ asset($project->image) }}" class="rounded-circle" alt="image">
                    </figure>
                </div>
                
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="status">وضعیت</label>
                    <div class="col-sm-10">
                        <select name="status" id="status" class="form-control">
                            <option value="1" @if($project->status) selected @endif>فعال</option>
                            <option value="0" @if(!$project->status) selected @endif>غیر فعال</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">توضیحات فارسی</label>
                    <div class="col-sm-10">
                        <textarea name="introduction_fa" id="introduction_fa" class="form-control" rows="3">{{ old('introduction_fa',$project->introduction_fa) }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">توضیحات انگلیسی</label>
                    <div class="col-sm-10">
                        <textarea name="introduction_en" id="introduction_en" class="form-control" rows="3">{{ old('introduction_en',$project->introduction_en) }}</textarea>
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
