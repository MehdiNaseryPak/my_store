<?php

namespace App\Http\Controllers\Admin\Market;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Market\ProductCategory;
use App\Http\Requests\ProductCategory\CreateProductCategoryRequest;
use App\Http\Requests\ProductCategory\UpdateProductCategoryRequest;
use App\Http\Services\Image\ImageService;

class ProductCategoryController extends Controller
{
    public function index()
    {
        return view('admin.markets.categories.index');
    }

    public function create()
    {
        $categories = ProductCategory::all();
        return view('admin.markets.categories.create',compact('categories'));
    }

    public function store(CreateProductCategoryRequest $request,ImageService $imageService)
    {
        $inputs = $request->all();
        if ($request->hasFile('image')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'product-category');
            $result = $imageService->save($request->file('image'));
            if ($result === false) {
                return redirect()->route('admin.market.product_category.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        }
        $category = ProductCategory::create($inputs);
        return redirect()->route('admin.market.product_category.index')->with('swal-success', 'دسته بندی  جدید شما با موفقیت ثبت شد');
    }
    public function edit(ProductCategory $productCategory)
    {
        $categories  = ProductCategory::query()->except($productCategory)->get();
        return view('admin.markets.categories.edit',compact('productCategory','categories'));
    }
    public function update(UpdateProductCategoryRequest $request, ProductCategory $productCategory ,ImageService $imageService)
    {
        $inputs = $request->all();
        if ($request->hasFile('image')) {
            if (!empty($productCategory->image)) {
                $imageService->deleteImage($productCategory->image);
            }
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'product-category');
            $result = $imageService->save($request->file('image'));
            if ($result === false) {
                return redirect()->route('admin.market.product_category.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        } else {
            if (!empty($productCategory->image)) {
                $image = $productCategory->image;
                $inputs['image'] = $image;
            }
        }
        $productCategory->update($inputs);
        return redirect()->route('admin.market.product_category.index')->with('swal-success', 'دسته بندی شما با موفقیت ویرایش شد');
    }
}
