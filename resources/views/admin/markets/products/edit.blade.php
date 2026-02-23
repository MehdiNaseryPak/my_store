@extends('admin.layouts.master')
@section('title','ویرایش محصول')
@section('style')
    <link rel="stylesheet" href="{{ asset('admin-assets/vendors/select2/css/select2.min.css') }}">
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <div class="container">
            <h6 class="card-title">ویرایش محصول </h6>
            <form action="{{ route('admin.market.product.update', $product->id) }}" method="POST" id="form" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">نام</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-left" placeholder="نام" dir="rtl" name="name" value="{{ old('name',$product->name) }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">دسته بندی</label>
                    <div class="col-sm-10">
                        <select class="form-control select2" multiple="multiple" id="categories" name="categories[]">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" {{ $product->categories->contains($category->id) ? 'selected' : '' }}>{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">برند</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="brand_id" name="brand_id">
                            @foreach($brands as $brand)
                                <option value="{{$brand->id}}" @if($brand->id == $product->brand_id) selected @endif>{{$brand->persian_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">توضیحات</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="introduction" id="introduction" rows="3">{{ old('introduction',$product->introduction) }}</textarea>
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
                        <img src="{{ asset($product->image['indexArray'][$product->image['currentImage']] ) }}" class="rounded-circle" alt="image">
                    </figure>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="status">وضعیت</label>
                    <div class="col-sm-10">
                        <select name="status" id="status" class="form-control">
                            <option value="1" @if($product->status) selected @endif>فعال</option>
                            <option value="0" @if(!$product->status) selected @endif>غیر فعال</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="marketable">قابل فروش</label>
                    <div class="col-sm-10">
                        <select name="marketable" id="marketable" class="form-control">
                            <option value="1" @if($product->marketable) selected @endif>فعال</option>
                            <option value="0" @if(!$product->marketable) selected @endif>غیر فعال</option>
                        </select>
                    </div>
                </div>
                
                <section class="col-12 border-top border-bottom py-3 mb-3">
                    <label class="col-sm-2 col-form-label" for="meta_product">ویژگی ها</label>
                    @foreach($product->metas as $meta)
                    <section class="row meta-product">

                        <section class="col-5 col-md-3">
                            <div class="form-group">
                                <input type="text" name="meta_key[]" class="form-control form-control-sm" value="{{ $meta->meta_key }}">
                            </div>
                        </section>

                        <section class="col-5 col-md-3">
                            <div class="form-group">
                                <input type="text" name="meta_value[]" class="form-control form-control-sm" value="{{ $meta->meta_value }}">
                            </div>
                        </section>
                        

                    </section>
                    @endforeach
                    <section class="row meta-product">

                        <section class="col-5 col-md-3">
                            <div class="form-group">
                                <input type="text" name="meta_key[]" class="form-control form-control-sm" placeholder="ویژگی ...">
                            </div>
                        </section>

                        <section class="col-5 col-md-3">
                            <div class="form-group">
                                <input type="text" name="meta_value[]" class="form-control form-control-sm" placeholder="مقدار ...">
                            </div>
                        </section>
                        

                    </section>

                    <section>
                        <button type="button" id="btn-copy" class="btn btn-success btn-sm">افزودن</button>
                    </section>


                </section>
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
    <script src="{{ asset('admin-assets/vendors/select2/js/select2.min.js') }}"></script>
    <script>
        $(function(){
            $('#categories').select2({
                placeholder: "دسته بندی های محصول",
                allowClear: true
            });
            $("#btn-copy").on('click', function(){
            var ele = $(this).parent().prev().clone(true);
            $(this).before(ele);
            })
        })
    </script>
@endsection
