@extends('admin.layouts.master')
@section('title','افزودن منو')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="container">
            <h6 class="card-title">ایجاد منو</h6>
            <form action="{{ route('admin.content.menu.store') }}" method="POST" id="form">
                @csrf
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">نام</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-left" placeholder="نام" dir="rtl" name="name" value="{{ old('name') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">لینک</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-right" placeholder="لینک" dir="ltr" name="url" value="{{ old('url') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">زیر منو</label>
                    <div class="col-sm-10">
                        <select name="parent_id" class="form-control">
                            <option value="">منو اصلی</option>
                            @foreach ($menus as $menu )
                            <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                            @endforeach
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
                    <button class="btn btn-success btn-uppercase">
                        <i class="ti-check-box m-r-5"></i> ذخیره
                    </button>

                </div>
            </form>
        </div>
    </div>
</div>
@endsection
