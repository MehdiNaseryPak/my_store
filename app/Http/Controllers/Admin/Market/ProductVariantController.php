<?php

namespace App\Http\Controllers\Admin\Market;

use Illuminate\Http\Request;
use App\Models\Market\Product;
use App\Http\Controllers\Controller;
use App\Models\Market\ProductVariant;
use App\Http\Requests\ProductVariant\CreateProductVariantRequest;
use App\Http\Requests\ProductVariant\UpdateProductVariantRequest;

class ProductVariantController extends Controller
{
    public function index(Product $product)
    {
        return view('admin.markets.products.variants.index',compact('product'));
    }

    public function create(Product $product)
    {

        return view('admin.markets.products.variants.create',compact('product'));
    }

    public function store(CreateProductVariantRequest $request,Product $product)
    {
        $inputs = $request->all();
        $product->variants()->create($inputs);
        return redirect()->route('admin.market.product.variant.index',$product)->with('swal-success', ' مدل جدید محصول شما با موفقیت ثبت شد');
    }
    public function edit(Product $product,ProductVariant $productVariant)
    {
        return view('admin.markets.products.variants.edit',compact('product','productVariant'));
    }
    public function update(UpdateProductVariantRequest $request,Product $product,ProductVariant $productVariant)
    {
        $inputs = $request->all();
        $productVariant->update($inputs);
        return redirect()->route('admin.market.product.variant.index',$product)->with('swal-success', 'مدل محصول شما با موفقیت ویرایش شد');
    }
}
