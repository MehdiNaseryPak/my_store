<?php

namespace App\Http\Controllers\Admin\Market;

use Illuminate\Http\Request;
use App\Models\Market\Product;
use App\Models\Market\ProductImage;
use App\Http\Controllers\Controller;
use App\Http\Services\Image\ImageService;

class ProductGalleryController extends Controller
{
    public function index(Product $product)
    {
        return view('admin.markets.products.galleries.index', compact('product'));
    }

    public function create(Product $product)
    {
        return view('admin.markets.products.galleries.create', compact('product'));
    }

    public function store(Request $request, Product $product, ImageService $imageService)
    {
        $validated = $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg,webp,gif',
        ]);
        $inputs = $request->all();
        if ($request->hasFile('image')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'product-gallery');
            $result = $imageService->createIndexAndSave($request->file('image'));
            if ($result === false) {
                return redirect()->route('admin.market.product.gallery.index', $product->id)->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
            $inputs['product_id'] = $product->id;
            $gallery = ProductImage::create($inputs);
            return redirect()->route('admin.market.product.gallery.index', $product->id)->with('swal-success', 'عکس شما با موفقیت ثبت شد');
        }
    }
}
