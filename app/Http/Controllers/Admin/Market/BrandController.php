<?php

namespace App\Http\Controllers\Admin\Market;

use App\Models\Market\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\Image\ImageService;
use App\Http\Requests\Brand\CreateBrandRequest;
use App\Http\Requests\Brand\UpdateBrandRequest;

class BrandController extends Controller
{
    public function index()
    {
        return view('admin.markets.brands.index');
    }

    public function create()
    {
        return view('admin.markets.brands.create');
    }

    public function store(CreateBrandRequest $request, ImageService $imageService)
    {
        $inputs = $request->all();

        
        if ($request->hasFile('logo')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'brand');
            $result = $imageService->save($request->file('logo'));
            if ($result === false) {
                return redirect()->route('admin.market.brand.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['logo'] = $result;
        }
        $brand = Brand::create($inputs);
        return redirect()->route('admin.market.brand.index')->with('swal-success', 'برند  جدید شما با موفقیت ثبت شد');
    }
    public function edit(Brand $brand)
    {
        return view('admin.markets.brands.edit',compact('brand'));
    }
    public function update(UpdateBrandRequest $request, Brand $brand,ImageService $imageService)
    {
        $inputs = $request->all();

        if ($request->hasFile('logo')) {
            if (!empty($brand->logo)) {
                $imageService->deleteImage($brand->logo);
            }
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'brand');
            $result = $imageService->save($request->file('logo'));
            if ($result === false) {
                return redirect()->route('admin.market.brand.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['logo'] = $result;
        } else {
            if (!empty($brand->logo)) {
                $logo = $brand->logo;
                $inputs['logo'] = $logo;
            }
        }
        $brand->update($inputs);
        return redirect()->route('admin.market.brand.index')->with('swal-success', 'برند شما با موفقیت ویرایش شد');
    }
}
