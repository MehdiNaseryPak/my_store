<?php

namespace App\Http\Controllers\Admin\Market;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Market\ProductVariant;
use App\Models\Market\CategoryAttribute;
use App\Models\Market\ProductVariantAttribute;
use App\Http\Requests\ProductVariantAttribute\CreateProductVariantAttributeRequest;
use App\Http\Requests\ProductVariantAttribute\UpdateProductVariantAttributeRequest;

class ProductVariantAttributeController extends Controller
{
    public function index(ProductVariant $productVariant)
    {
        return view('admin.markets.products.variants.attributes.index',compact('productVariant'));
    }

    public function create(ProductVariant $productVariant)
    {
        $categoriesIds = $productVariant->product->categories()->pluck('id');
        $categoryAttributes = CategoryAttribute::whereIn('category_id',$categoriesIds)->get();
        return view('admin.markets.products.variants.attributes.create',compact('productVariant','categoryAttributes'));
    }

    public function store(CreateProductVariantAttributeRequest $request,ProductVariant $productVariant)
    {
        $inputs = $request->all();
        $productVariant->attributes()->create($inputs);
        return redirect()->route('admin.market.product.variant.attribute.index',$productVariant)->with('swal-success', 'ویژگی جدید مدل شما با موفقیت ثبت شد');
    }
    public function edit(ProductVariant $productVariant,ProductVariantAttribute $productVariantAttribute)
    {
        $categoriesIds = $productVariant->product->categories()->pluck('id');
        $categoryAttributes = CategoryAttribute::whereIn('category_id',$categoriesIds)->get();
        return view('admin.markets.products.variants.attributes.edit',compact('productVariant','productVariantAttribute','categoryAttributes'));
    }
    public function update(UpdateProductVariantAttributeRequest $request,ProductVariant $productVariant,ProductVariantAttribute $productVariantAttribute)
    {
        $inputs = $request->all();
        $productVariantAttribute->update($inputs);
        return redirect()->route('admin.market.product.variant.attribute.index',$productVariant)->with('swal-success', 'ویژگی جدید مدل شما با موفقیت ویرایش شد');
    }
}
