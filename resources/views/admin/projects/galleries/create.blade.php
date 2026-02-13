@extends('admin.layouts.master')
@section('title','ایجاد عکس پروژه')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="container">
            <h6 class="card-title">ایجاد عکس پروژه</h6>
            <form action="{{ route('admin.project.gallery.store',$project->id) }}" method="POST" id="form" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label" for="image">عکس</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control-file" id="image" dir="rtl" name="image">
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

