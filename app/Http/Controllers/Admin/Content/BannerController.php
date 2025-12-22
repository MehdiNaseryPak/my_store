<?php

namespace App\Http\Controllers\Admin\Content;

use Illuminate\Http\Request;
use App\Models\Content\Banner;
use App\Http\Controllers\Controller;
use App\Http\Services\Image\ImageService;
use App\Http\Requests\Banner\CreateBannerRequest;
use App\Http\Requests\Banner\UpdateBannerRequest;

class BannerController extends Controller
{
    public function index()
    {
        return view('admin.contents.banners.index');
    }

    public function create()
    {
        $positions = Banner::$positions;
        return view('admin.contents.banners.create',compact('positions'));
    }

    public function store(CreateBannerRequest $request, ImageService $imageService)
    {
        $inputs = $request->all();

        
        if ($request->hasFile('image')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'banner');
            $result = $imageService->save($request->file('image'));
            
            if ($result === false) {
                return redirect()->route('admin.content.banner.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        }
        $banner = Banner::create($inputs);
        return redirect()->route('admin.content.banner.index')->with('swal-success', 'بنر  جدید شما با موفقیت ثبت شد');
    }
    public function edit(Banner $banner)
    {
        $positions = Banner::$positions;
        return view('admin.contents.banners.edit',compact('banner','positions'));
    }
    public function update(UpdateBannerRequest $request, Banner $banner,ImageService $imageService)
    {
        $inputs = $request->all();

        if ($request->hasFile('image')) {
            if (!empty($banner->image)) {
                $imageService->deleteImage($banner->image);
            }
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'banner');
            $result = $imageService->save($request->file('image'));
            if ($result === false) {
                return redirect()->route('admin.content.banner.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        } else {
            if (!empty($banner->image)) {
                $image = $banner->image;
                $inputs['image'] = $image;
            }
        }
        $banner->update($inputs);
        return redirect()->route('admin.content.banner.index')->with('swal-success', 'بنر شما با موفقیت ویرایش شد');
    }
}
