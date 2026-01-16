<?php

namespace App\Http\Controllers\Admin\Market;

use Illuminate\Http\Request;
use App\Models\Market\Product;
use App\Http\Controllers\Controller;
use App\Models\Market\ProductCategory;
use App\Http\Services\Image\ImageService;
use App\Http\Requests\Product\CreateProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Models\Market\Brand;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.markets.products.index');
    }

    public function create()
    {
        $categories = ProductCategory::all();
        $brands = Brand::all();
        return view('admin.markets.products.create',compact('categories','brands'));
    }

    public function store(CreateProductRequest $request,ImageService $imageService)
    {
        $inputs = $request->all();
        if ($request->hasFile('image')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'product');
            $result = $imageService->createIndexAndSave($request->file('image'));
            if ($result === false) {
                return redirect()->route('admin.market.product.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        }

        $product = Product::create($inputs);
        if(!empty($inputs['meta_key'][0]))
        {
            $metas = array_combine($inputs['meta_key'] , $inputs['meta_value']);
            foreach($metas as $key => $value)
            {
                $product->metas()->create([
                    'meta_key' => $key,
                    'meta_value' => $value
                ]);
            }
        }
        return redirect()->route('admin.market.product.index')->with('swal-success', 'محصول  جدید شما با موفقیت ثبت شد');
    }
    public function edit(Product $product)
    {
        $categories  = ProductCategory::all();
        $brands = Brand::all();
        return view('admin.markets.products.edit',compact('product','categories','brands'));
    }
    public function update(UpdateProductRequest $request, Product $product ,ImageService $imageService)
    {
        $inputs = $request->all();
        if ($request->hasFile('image')) {
            if (!empty($product->image)) {
                $imageService->deleteImage($product->image);
            }
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'product');
            $result = $imageService->createIndexAndSave($request->file('image'));
            if ($result === false) {
                return redirect()->route('admin.market.product.index')->with('swal-error','آپلود تصویر با خطا مواجه شد');
            }
            
            $inputs['image'] = $result;
        } else {
            if (!empty($product->image)) {
                $image = $product->image;
                $inputs['image'] = $image;
            }
        }
        $product->update($inputs);
        return redirect()->route('admin.market.product.index')->with('swal-success', 'محصول شما با موفقیت ویرایش شد');
    }
}
