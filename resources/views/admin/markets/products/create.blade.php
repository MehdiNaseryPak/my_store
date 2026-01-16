@extends('admin.layouts.master')
@section('title','افزودن محصول')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="container">
            <h6 class="card-title">ایجاد محصول</h6>
            <form action="{{ route('admin.market.product.store') }}" method="POST" id="form" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">نام</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-left" placeholder="نام" dir="rtl" name="name" value="{{ old('name') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">دسته بندی</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="category_id" name="category_id">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">برند</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="brand_id" name="brand_id">
                            @foreach($brands as $brand)
                                <option value="{{$brand->id}}">{{$brand->persian_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">قیمت</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-right" placeholder="قیمت" dir="ltr" name="price" value="{{ old('price') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">وزن</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-right" placeholder="وزن" dir="ltr" name="weight" value="{{ old('weight') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">طول</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-right" placeholder="طول" dir="ltr" name="length" value="{{ old('length') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">عرض</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-right" placeholder="عرض" dir="ltr" name="width" value="{{ old('width') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">ارتفاع</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-right" placeholder="ارتفاع" dir="ltr" name="height" value="{{ old('height') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">توضیحات</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="introduction" id="introduction" rows="3">{{ old('introduction') }}</textarea>
                    </div>
                </div>
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
                    <label class="col-sm-2 col-form-label" for="marketable">قابل فروش</label>
                    <div class="col-sm-10">
                        <select name="marketable" id="marketable" class="form-control">
                            <option value="1">فعال</option>
                            <option value="0">غیر فعال</option>
                        </select>
                    </div>
                </div>
                
                <section class="col-12 border-top border-bottom py-3 mb-3">
                    <label class="col-sm-2 col-form-label" for="meta_product">ویژگی ها</label>
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

<script>
    $(function(){
        $("#btn-copy").on('click', function(){
          var ele = $(this).parent().prev().clone(true);
          $(this).before(ele);
        })
      })
</script>
@endsection